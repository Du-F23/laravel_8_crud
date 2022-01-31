<?php
//
//use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//
//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
//
//
Auth::routes(['verify' => true]);
//
//Route::group(['middleware' => 'auth'], function () {
//
//
//	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
//	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
//	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
//	 Route::get('map', function () {return view('pages.maps');})->name('map');
//	 Route::get('icons', function () {return view('pages.icons');})->name('icons');
//	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
//	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
//
//
//
////Routes for crud
//	Route::resource('category', 'App\Http\Controllers\CategoryController', ['except' => ['show']])->middleware('verified');
//	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']])->middleware('verified');
//	Route::resource('tag', 'App\Http\Controllers\TagController', ['except' => ['show']])->middleware('verified');
//	Route::resource('article', 'App\Http\Controllers\ArticleController', )->middleware('verified');
//
//
//
////store article and its image
//
//    Route::get('image-upload', [ 'App\Http\Controllers\ArticleController', 'imageUpload' ])->name('image.upload')->middleware('verified');
//    Route::post('image-upload', [  'App\Http\Controllers\ArticleController', 'imagePost' ])->name('image.upload.post')->middleware('verified');
//});


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


/* USUARIOS */
/* index lista */

/* Usuarios*/
/* get obtenemos los  datos en BD del usuario con la funcion index*/
Route::get('/users', 'App\Http\Controllers\UserController@index');
/* store guarda datos en BD */

Route::post('/users', 'App\Http\Controllers\UserController@store')->name('user.store');
/* Delete elima datos */
Route::delete('/users/{user}', 'App\Http\Controllers\UserController@delete')->name('user.destroy');
Route::get('/users/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
Route::put('/users/{id}/update', 'App\Http\Controllers\UserController@update')->name('user.update');;

/* Categorias */

Route::get('/category', 'App\Http\Controllers\CategoryController@index');
Route::post('/category', 'App\Http\Controllers\CategoryController@store')->name('category.store');
Route::put('/category/{id}/update', 'App\Http\Controllers\CategoryController@update')->name('category.update');;
Route::get('/category/{id}/edit', 'App\Http\Controllers\CategoryController@edit');
Route::delete('/category/{category}', 'App\Http\Controllers\CategoryController@delete')->name('category.destroy');

///* Articulos */
//
//Route::get('/articles', 'App\Http\Controllers\ArticleController@index');
//Route::get('/article/add', 'App\Http\Controllers\ControllerArticle@create');
//Route::post('/articles', 'App\Http\Controllers\ControllerArticle@store')->name('article.store');
//Route::get('/article/{id}/edit', 'App\Http\Controllers\ControllerArticle@edit');
/* Articulos */

Route::get('/articles','App\Http\Controllers\ArticleController@index')->name('articles.index');
Route::get('/article/add','App\Http\Controllers\ArticleController@create')->name('articles.add');
Route::post('/articles','App\Http\Controllers\ArticleController@store')->name('article.store');
Route::get('/articles/{id}/show','App\Http\Controllers\ArticleController@show')->name('articles.show');

/*  Images */

Route::post('/images', 'App\Http\Controllers\ImagesController@store')->name('images.store');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Route::resource('articles', 'ArticleController');
Route::get('/articles/create', 'App\Http\Controllers\ArticleController@create');

/* Email MailTrap */
Route::get('enviar', ['as' => 'enviar', function () {

    $data = ['link' => 'http://'];

    \Mail::send('email.notificacion', $data, function ($message) {

        $message->from('email@styde.net', 'Styde.Net');

        $message->to('fernandoduarte1v@gmail.com')->subject('Notificación');

    });

    return "Se envío el email";
}]);

//Route::get('/articles/add', 'App\Http\Controllers\ArticleController@index');

Route::get('image-upload', [ 'App\Http\Controllers\ArticleController', 'imageUpload' ])->name('image.upload')->middleware('verified');
Route::post('image-upload', [  'App\Http\Controllers\ArticleController', 'imagePost' ])->name('image.upload.post')->middleware('verified');

