<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return 'Login';
})->name('login');

// Route::middleware([])->group(function () {
//     Route::prefix('admin')->group(function() {
//         Route::namespace('App\Http\Controllers\Admin')->group(function() {
//             Route::name('admin.')->group(function() {
//                 Route::get('/dashboard', 'TestController@test')->name('dashboard');
//                 Route::get('/financeiro', 'TestController@test')->name('financeiro');
//                 Route::get('/produtos', 'TestController@test')->name('produtos');
//                 Route::get('/', function() {
//                     return redirect()->route('admin.dashboard');
//                 })->name('home');
//             });
//         });
//     });
// });

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
    'name' => 'admin.'
], function() {
    Route::get('/dashboard', 'TestController@test')->name('admin.dashboard');
    Route::get('/financeiro', 'TestController@test')->name('financeiro');
    Route::get('/produtos', 'TestController@test')->name('produtos');
    Route::get('/', function() {
        return redirect()->route('admin.dashboard');
    })->name('home');
});


Route::get('redirect3', function() {
    return redirect()->route('url.redirect');
});

Route::get('redirected', function () {
    return 'Você foi redirecionado';
})->name('url.redirect');

//Usada somente se for uma view realmente simples
Route::view('/view', 'welcome');

Route::redirect('/redirect1', '/redirect2');

// Route::get('/redirect1', function () {
//     return redirect('/redirect2');
// });

Route::get('/redirect2', function () {
    return 'Redirect 2';
});

Route::get('/product/{id?}', function ($id = 'nenhum selecionado') {
    return "Produto: {$id}";
});

Route::get('/name/{name}/other', function ($name) {
    return "Seu nome é {$name}";
});

Route::get('/name/{name}', function ($name) {
    return "Seu nome é {$name}";
});

Route::match(['get', 'post'], 'match', function () {
    return 'match';
});

Route::any('/any', function () {
    return 'any';
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', function () {
    return view('welcome');
});
