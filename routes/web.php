<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

use App\Mail\MessageFromSite;

Route::get('/', function () {
    $json = file_get_contents(public_path('assets/data/profile.json'));
    $jsonData = json_decode($json, true);
    return view('welcome', ['data' => $jsonData]);
})->name('home');

Route::post('/send_message', function (Request $request) {

    $details = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
       'message' => $request->input('message'),
    ];

    Mail::to('chalnicol@gmail.com')->send(new MessageFromSite($details));

    return redirect()->back();

})->name('send.message');

