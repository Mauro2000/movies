<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminSerieController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\FollowSeriesController;
use App\Http\Controllers\UserController;
use App\Models\episodes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

Route::get('/r',function (){
    $episodes = episodes::where('airdate','=',Carbon::today()->subDay(2))->get();
    $episodestoday = episodes::where('airdate','=','2022-01-16')->get();

    $result = $episodes->merge($episodestoday);
    $result = $result->all();

    foreach($result as $episode){
        echo $episode->airdate."</br>";
    }

});


Route::get('/t', function () {
    event(new \App\Events\AdminUserMessage());
    dd('Event Run Successfully.');
});


Route::get('/p', function () {
    event(new \App\Events\UserPrivate(auth()->user()));
    dd('Event Run Successfully.');
});

Route::get('/', [PageController::class, 'index'])->name('homepage');

Route::get('/movie/{IMDB}/assistir-{title}',[PageController::class,'show_movie_details'])->name('movieShow');

Route::get('/serie/{IMDB}/assistir-{title}',[PageController::class,'show_serie_details'])->name('serieShow');
Route::post('/serie/{IMDB}/assistir-{title}',[PageController::class,'show_serie_details'])->name('serieShow');

Route::post('/serie',[PageController::class,'getEpisodes'])->name('getEpisodes');

Route::get('/Séries',[PageController::class,'listSeries'])->name('listSeries');

Route::get('/Filmes',[PageController::class,'listMovies'])->name('listMovies');

//Route::post('/listar-series-filter',[PageController::class,'listSeries'])->name('listSeriesFilter');

Route::get('/register',[PageController::class,'pageRegister'])->name('pageRegister');

Route::get('/login',[PageController::class,'pageLogin'])->name('pageLogin');

Route::post('/verify-login',[PageController::class,'verifyLogin'])->name('verify-Login');


Route::post('/verify-register',[PageController::class,'verifyRegister'])->name('verify-Register');

Route::post('/search', [PageController::class, 'search'])->name('search');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::get('/youtube',[PageController::class,'youtube'])->name('youtube');



Route::post('/teste',function(){
    return view('frontend.Teste');
})->name('teste');

//ustilizadores autenticados
Route::group(['middleware' => 'auth'],function(){
    Route::get('/add-order',[UserController::class,'AddOrder'])->name('addOrder');
    Route::post('/addrequestid',[UserController::class,'addrequestid'])->name('addrequestid');
    Route::resource('roles', RoleController::class);
    Route::get('/my-account',[UserController::class,'AccountPage'])->name('myAccount');
    Route::post('/addWishlist',[WishlistController::class,'add'])->name('addWishlist');
    Route::post('/addFollow',[FollowSeriesController::class,'follow'])->name('addFollow');
    Route::get('/logout',[PageController::class,'Logout'])->name('logout');
});



//Adminisração website
Route::group(['prefix' => 'administracao','middleware'=>'guest'], function () {

    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

    Route::post('/login-verify',[AdminAuthController::class,'verifyLogin'])->name('Admin.Login.Verify');

});



Route::group(['prefix' => 'authorized','middleware' => 'adminauth'], function () {
	// Admin Dashboard
    Route::get('/dashboard',[AdminsController::class,'dashboard'])->name('dashboard');

    Route::get('/logout',[AdminAuthController::class,'logout'])->name('adminLogout');

    //Movies

    Route::get('/list-movies-categories',[AdminMovieController::class,'ListCategs'])->name('adminListCategs');

    Route::get('/list-movies',[AdminMovieController::class,'ListMovies'])->name('adminListMovies');

    Route::get('/list-sliders',[AdminMovieController::class,'ListSliders'])->name('adminListSliders');

    Route::post('/sliders-add',[AdminMovieController::class,'AddSlider'])->name('adminAddSlider');

    Route::post('/sliders-delete',[AdminMovieController::class,'DeleteSlider'])->name('adminDeleteSlider');

    Route::post('/movie-add',[AdminMovieController::class,'AddMovie'])->name('adminAddMovie');

    Route::post('/movie-categ-add',[AdminMovieController::class,'AddCategs'])->name('adminAddCategs');

    Route::post('/movie-categ-delete',[AdminMovieController::class,'DeleteCategs'])->name('adminDeleteCategs');

    //series

        Route::get('/list-series',[AdminSerieController::class,'ListSeries'])->name('adminListSeries');

        Route::post('/serie-add',[AdminSerieController::class,'AddSerie'])->name('adminAddSerie');

        Route::post('/serie-generate-Episode',[AdminSerieController::class,'GenerateEpisode'])->name('adminGenEpisode');
       // Route::get('/serie-generate-Episode/{imdbid}/{idmovie}/{seasons}',[AdminSerieController::class,'GenerateEpisode'])->name('adminGenEpisode');



    //Notificações

    Route::get('/notification-delete/{id}',[NotificationController::class,'delete'])->name('Admin.notification.delete');

	Route::get('/notification-deleteAll',[NotificationController::class,'deleteAll'])->name('Admin.notification.deleteAll');

    //settings

    Route::get('/settings',[AdminsController::class,'settings'])->name('settings');

    Route::post('/uploadSettings',[AdminsController::class,'uploadSettings'])->name('uploadSettings');


});
