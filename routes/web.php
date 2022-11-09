<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Console\Application;
use PHPUnit\Runner\Hook;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Nette\Utils\Json;
use Whoops\Handler\PlainTextHandler;

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



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/san-pham', [HomeController::class, 'products'])->name('product');

Route::get('/them-san-pham', [HomeController::class, 'getAdd']);

Route::post('/them-san-pham', [HomeController::class, 'postAdd'])->name('post-add');

Route::put('/them-san-pham', [HomeController::class, 'putAdd']);


Route::get('lay-thong-tin', [HomeController::class, 'getArr']);

Route::get('demo-response', function(){   
    
    // $response = response()
    // ->view('clients.demo-test', [
    //     'title' => 'Học http reponse'
    // ], 201)
    // ->header('Content-Type', 'application/json');
    // return $response;

    // $contentArr = ['name' => 'unicode',
    // 'version' => 'laraver 8.x', 
    // 'lesson'=> 'HTTP Reponse laraver'];

    // return response()->json($contentArr, 404)->header("Api-key", '1234');

    // echo old('username');

    return view('clients.demo-test');
})->name('demo-response');

Route::post('demo-response', function(Request $request){
    if (!empty($request->username)){
        return back()->withInput()->with('mess', 'validate thành công');

        
    }
    return redirect()->route('demo-response')->with('mess', 'validate không thành công');
            
});


Route::get('dowloand-image', [HomeController::class, 'downloadImage'])->name('download-image');

Route::get('dowloand-doc', [HomeController::class, 'downloadDoc'])->name('download-doc');