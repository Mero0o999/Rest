<?php
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*Route::get('getPrice/{id}', 'ProductController@getPrice');

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/findPrice','OrderController@findPrice');

Route::get('getprice/{id}', 'OrderController@getprice');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});
Route::post('contactus',[ContactController::class,'sendEmail'])->name('contact.us');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::group(['middleware' => 'auth'], function() {
    Route::resource('doctors', DoctorController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('carts', CartController::class);





});
