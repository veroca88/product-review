<?php

use Illuminate\Support\Facades\Route;
use App\Models\Review;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Yaml\Yaml;

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
    $files = File::files(resource_path('reviews'));

    $reviews = [];

    foreach($files as $file) {
        $document = YamlFrontMatter::parseFile($file);

        $reviews[] = new Review(
            $document->title, 
            $document->excerpt, 
            $document->date, 
            $document->body(),
        );
    }

    return view('reviews', [
      'reviews' => $reviews
      ]); 
});

Route::get('reviews/{review}', function ($slug) { 
    return view('review', [
        'review' => Review::find($slug)
    ]);

})->where('review', '[A-z\-]+');
