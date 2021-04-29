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
    return view('welcome');
});

//Auth::routes();

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users','App\Http\Controllers\UserController');
Route::post('/users/search', [App\Http\Controllers\UserController::class, 'search'])->name('users.search');

Route::resource('videos','App\Http\Controllers\VideoController');
Route::post('/videos/search', [App\Http\Controllers\VideoController::class, 'search'])->name('videos.search');

Route::get('/videos/poster/{id}', [App\Http\Controllers\VideoController::class, 'poster'])->name('videos.poster');
Route::post('/videos/store_poster/{id}', [App\Http\Controllers\VideoController::class, 'store_poster'])->name('videos.store_poster');

//Route::get('/videos/trailer/{id}', [App\Http\Controllers\VideoController::class, 'trailer'])->name('videos.trailer');


// trailer start
Route::get('/videos/trailer/{id}', [App\Http\Controllers\VideoController::class, 'trailer'])->name('videos.trailer');
Route::post('/videos/store_trailer_poster/{id}', [App\Http\Controllers\VideoController::class, 'store_trailer_poster'])->name('videos.store_trailer_poster');
Route::post('/videos/store_trailer_video/{id}', [App\Http\Controllers\VideoController::class, 'store_trailer_video'])->name('videos.store_trailer_video');

Route::get('/videos/trailer_success/{id}', function ($id) {
    return redirect()->route('videos.trailer', ['id' => $id])->with('success','Trailer video uploaded. Encoding in progress');
})->name('videos.trailer_success');
// trailer end


// video start
Route::get('/videos/video/{id}', [App\Http\Controllers\VideoController::class, 'video'])->name('videos.video');
Route::post('/videos/store_video_poster/{id}', [App\Http\Controllers\VideoController::class, 'store_video_poster'])->name('videos.store_video_poster');
Route::post('/videos/store_video/{id}', [App\Http\Controllers\VideoController::class, 'store_video'])->name('videos.store_video');
Route::get('/videos/video_success/{id}', function (App\Models\Video $video,$id) {
    $data['is_processing'] = 1;
    $video::where('id',$id)->update( $data);
    return redirect()->route('videos.video', ['id' => $id])->with('success','Main video uploaded. Encoding in progress');
})->name('videos.video_success');
// video end


Route::resource('categories','App\Http\Controllers\CategoryController');
Route::post('/categories/search', [App\Http\Controllers\CategoryController::class, 'search'])->name('categories.search');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('auth');
