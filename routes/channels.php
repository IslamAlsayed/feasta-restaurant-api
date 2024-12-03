<?php

use App\Models\Client;
use App\Models\Order;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::channel('chat.message.{orderId}', function (Client $client, $orderId) {
//     $order = Order::find($orderId);
//     return $order && $client->id == $order->client_id;
// });

// Broadcast::channel('private-chat.message.{orderId}', function (Client $client, $orderId) {
//     return true;
//     // $order = Order::find($orderId);
//     // return $order && $client->id == $order->client_id;
// });