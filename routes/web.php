<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageusersController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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
// Page Route

Route::get('php-info', function () {
    return phpinfo();
});
Route::get('clear_cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    dd("Cache is cleared");
});

Route::get('db-migrate', function () {
    return Artisan::call('migrate');
});
Route::get('test', 'App\Http\Controllers\TestController@Index');
Route::get('/', 'App\Http\Controllers\HomeController@Index');

// Route::get('/', [PageController::class, 'blankPage'])->middleware('verified');
// Route::get('/', [PageController::class, 'blankPage']);

// Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('test', 'App\Http\Controllers\TestController@Index');
Route::get('/page-blank', [PageController::class, 'blankPage']);
Route::post('/user-profile', 'App\Http\Controllers\ProfileController@postUpdateProfile');
Route::get('/page-collapse', [PageController::class, 'collapsePage']);

// locale route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
Route::group(['prefix' => 'admin'], function () {
    Auth::routes(['verify' => true]);
});

Route::post('login', 'App\Http\Controllers\Auth\LoginController@authenticate')->name('login');

//Employee Login
Route::get('ach/login', 'App\Http\Controllers\Auth\EmployeeLoginController@showLoginForm')->name('employeeLoginForm');
Route::get('ach/register', 'App\Http\Controllers\Auth\EmployeeRegisterController@showRegistrationForm')->name('employeeRegistrationForm');
Route::post('employeelogin', 'App\Http\Controllers\Auth\EmployeeLoginController@authenticate')->name('employeelogin');
Route::post('employeelogout', 'App\Http\Controllers\Auth\EmployeeLoginController@logout')->name('employeelogout');
Route::post('employeeregister', 'App\Http\Controllers\Auth\EmployeeRegisterController@register')->name('employeeregister');
Route::get('check-email-unique', 'App\Http\Controllers\Auth\EmployeeRegisterController@checkEmailUnique')->name('checkEmailUnique');

//Admin Login
// Route::get('admin','App\Http\Controllers\Auth\AdminLoginController@showLoginForm');
// Route::post('adminlogin','App\Http\Controllers\Auth\AdminLoginController@authenticate')->name('adminlogin');

//Employee Routes
Route::get('ach', [EmployeeController::class, 'index'])->middleware(['checkemployee'])->name('employeedashboard');
Route::middleware(['role:employee'])->group(function () {
    Route::resource('employees', EmployeeController::class);
    Route::match(['GET', 'PUT'], 'employee-update-funding-source/{employee}', [EmployeeController::class, 'UpdateFundingSource'])->name('employees.updateFunding');
});

//Admin Routes
Route::get('admin', [AdminController::class, 'index'])->middleware(['admin_role']);
Route::middleware(['role:admin'])->group(function () {
    Route::get('admin/manage-users', [UserController::class, 'index']);
    Route::resource('users', UserController::class);

    Route::get('admin/do-ach-payment', [AdminController::class, 'create']);
});

Route::get('/manage-users', [ManageusersController::class, 'Index']);
Route::get('/add-user', [ManageusersController::class, 'Adduser']);
Route::post('/postSaveUser', [ManageusersController::class, 'postSaveUser']);
