<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailJob;
use App\Models\SendMail;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Pusher\Pusher;
use Symfony\Component\Console\Input\Input;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) return response()->json(['message' => 'Incorrect email or password'], 404);

        if ($user['status'] === 'inactive') {
            return response()->json(['message' => 'This account is blocked'], 403);
        }

        $validator = Validator::make($request->all(), ['email' => 'required|email', 'password' => 'required']);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $credentials = $request->only('email', 'password');

        if ($token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'status' => 200,
                'token' => $token,
                'message' => 'Login successfully',
                'data' => $user
            ]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function register(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|min:8',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->status = 'active';
        $user->save();

        $token = JWTAuth::fromUser($user);

        if ($token) {
            return response()->json([
                'status' => 201,
                'token' => $token,
                'message' => 'Registration successful',
                'data' => ['name' => $user->name, 'phone' => $user->phone, 'email' => $user->email,]
            ], 201);
        }

        return response()->json(['message' => 'An error occurred, please try again later.'], 401);
    }

    // public function pusherAuth()
    // {
    //     $user = JWTAuth::parseToken()->authenticate();

    //     if ($user) {
    //         $pusher = new Pusher(ENV('PUSHER_APP_KEY'), ENV('PUSHER_APP_SECRET'), ENV('PUSHER_APP_ID'));
    //         $auth = $pusher->socket_auth(Input::get('channel_name'), Input::get('socket_id'));
    //         $callback = str_replace('\\', '', $_GET['callback']);
    //         header('Content-Type: application/javascript');
    //         echo ($callback . '(' . $auth . ');');
    //         return;
    //     } else {
    //         header('', true, 403);
    //         echo "Forbidden";
    //         return;
    //     }
    // }

    public function user()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            return response()->json(['status' => 200, 'data' => $user]);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['status' => 401, 'message' => 'Token has expired'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['status' => 401, 'message' => 'Token is invalid'], 401);
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['status' => 401, 'message' => 'Token is missing'], 401);
        }
    }

    public function sendMail(Request $request)
    {
        if (!$request->input('email')) {
            return response()->json(['status' => 500, 'result' => 'the email is require'], 500);
        }

        if (!$request->input('message')) {
            return response()->json(['status' => 500, 'result' => 'the message is require'], 500);
        }

        $mail = SendMail::create($request->all());

        SendMailJob::dispatch($mail);

        if ($mail) {
            return response()->json(['status' => 200, 'result' => 'success send email'], 200);
        } else {
            return response()->json(['status' => 500, 'result' => 'wrong send email'], 500);
        }
    }
}