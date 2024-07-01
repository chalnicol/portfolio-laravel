<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use App\Mail\MessageFromSite;

Route::get('/', function () {
    $json = file_get_contents(public_path('assets/data/profile.json'));

    $jsonData = json_decode($json, true);
    return view('welcome', ['data' => $jsonData]);
})->name('home');

// Route::get('/', function () {
//     // Define the path to your JSON file
//     $filePath = base_path('../public_html/assets/data/profile.json');


//     // Check if the file exists
//     if (!File::exists($filePath)) {
//         return response()->json(['error' => 'File not found' . $filePath], 404);
//     }

//     // Read the file content
//     $json = File::get($filePath);
    
//     // Decode JSON data
//     $jsonData = json_decode($json, true);

//     // Check if JSON decoding was successful
//     if (json_last_error() !== JSON_ERROR_NONE) {
//         return response()->json(['error' => 'Invalid JSON data'], 500);
//     }

//     return view('welcome', ['data' => $jsonData]);
// })->name('home');

Route::post('/send_message', function (Request $request) {

    $details = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
       'message' => $request->input('message'),
    ];

    Mail::to('chalnicol@gmail.com')->send(new MessageFromSite($details));

    // return redirect()->back();
    return response()->json(['success' => true]);

})->name('send.message');

Route::get('/clear-config-cache', function() {
    Artisan::call('config:cache');
    return 'Configuration cache cleared';
});

Route::get('/clear-view-cache', function() {
    Artisan::call('view:cache');
    return 'Configuration cache cleared';
});

Route::get('/clear-route-cache', function() {
    Artisan::call('route:cache');
    return 'Configuration cache cleared';
});