<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailJob;
use App\Models\SendMail;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Pusher\Pusher;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $dbStatus = $this->checkServer();

        if ($dbStatus['status'] == "failed") {
            return response()->json(['message' => $dbStatus['message']], 500);
        }

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) return response()->json(['message' => 'account not found'], 404);

        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'incorrect email or password'], 403);
        }

        if ($user['status'] == '0') {
            return response()->json(['message' => 'This account is blocked'], 403);
        }

        $validator = Validator::make($request->all(), ['email' => 'required|email', 'password' => 'required']);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $credentials = $request->only('email', 'password');

        if ($token = JWTAuth::attempt($credentials)) {
            return response()->json(['status' => 200, 'token' => $token, 'message' => 'Login successfully', 'data' => $user]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function register(Request $request)
    {
        $dbStatus = $this->checkServer();

        if ($dbStatus['status'] == "failed") {
            return response()->json(['message' => $dbStatus['message']], 500);
        }

        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|min:8',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $validator['name'],
            'phone' => $validator['phone'],
            'email' => $validator['email'],
            'password' => bcrypt($validator['password']),
        ]);

        $token = JWTAuth::fromUser($user);

        if ($token) {
            return response()->json(['status' => 201, 'token' => $token, 'message' => 'Registration successfully', 'data' => $user], 201);
        }

        return response()->json(['message' => 'An error occurred, please try again later.'], 401);
    }

    public function pusher(Request $request)
    {
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;

        $pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            [
                'cluster' => config('broadcasting.connections.pusher.options.cluster'),
                'encrypted' => true,
            ]
        );

        $user = JWTAuth::parseToken()->authenticate();

        $presence_data = ['name' => $user->name];
        $auth = $pusher->presence_auth($channelName, $socketId, auth()->id(), $presence_data);

        return response($auth);
    }

    public function client(Request $request)
    {
        $dbStatus = $this->checkServer();

        if ($dbStatus['status'] == "failed") {
            return response()->json(['message' => $dbStatus['message']], 500);
        }

        try {
            $client = JWTAuth::parseToken()->authenticate();
            return response()->json(['status' => 200, 'data' => $client]);
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
        $dbStatus = $this->checkServer();

        if ($dbStatus['status'] == "failed") {
            return response()->json(['message' => $dbStatus['message']], 500);
        }

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

    public static function checkServer()
    {
        try {
            DB::connection()->getPdo();
            return ['status' => 'success', 'message' => 'Database connection successfully completed!'];
        } catch (\Exception $e) {
            return ['status' => 'failed', 'message' => 'Database connection failed'];
        }
    }
}
