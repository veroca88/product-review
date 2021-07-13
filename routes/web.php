<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('reviews');
});

Route::get('reviews/{review}', function ($slug) {
    $path = __DIR__ . "/../resources/reviews/{$slug}.html";

    if (! file_exists($path)) {
        return redirect("/");
    }

    $review = file_get_contents($path);

    return view('review', [
        // 'review' => file_get_contents($filename)
        'review' => $review
    ]);
});
