<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\EmployeeLoginController;
use App\Http\Controllers\Auth\EmployeeRegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ManageusersController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect('/reimbursement');
});
Route::prefix('reimbursement')->group(function () {

    Route::get('php-info', function () {
        return phpinfo();
    });
    Route::get('clear-cache', function () {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return redirect('/');
    });
    Route::get('db-migrate', function () {
        return Artisan::call('migrate');
    });
    Route::get('db-migrate-fresh', function () {
        return Artisan::call('migrate:fresh');
    });
    Route::get('db-migrate-fresh-with-seed', function () {
        return Artisan::call('migrate:fresh --seed');
    });


    Route::get('/', 'App\Http\Controllers\HomeController@Index');
    Route::get('test', 'App\Http\Controllers\TestController@Index');

    Route::get('/page-blank', [PageController::class, 'blankPage'])->name('page.blank');
    Route::get('/page-collapse', [PageController::class, 'collapsePage']);
    Route::get('lang/{locale}', [LanguageController::class, 'swap']);


    Route::get('check-email-unique', [EmployeeRegisterController::class, 'checkEmailUnique'])->name('checkEmailUnique');
    Route::group(['prefix' => 'employee'], function () {
        Route::name('employee.')->group(function () {
            Route::get('/', [EmployeeController::class, 'index'])->middleware(['checkemployee'])->name('dashboard');
            Route::get('login', [EmployeeLoginController::class, 'showLoginForm'])->name('login.show');
            Route::post('login', [EmployeeLoginController::class, 'authenticate'])->name('login');
            Route::get('register', [EmployeeRegisterController::class, 'showRegistrationForm'])->name('register.show');
            Route::post('register', [EmployeeRegisterController::class, 'register'])->name('register');
            Route::post('logout', [EmployeeLoginController::class, 'logout'])->name('logout');
            Route::post('profile', [ProfileController::class, 'postUpdateProfile'])->name('profile');
        });
    });


    //Employee Routes

    Route::middleware(['role:employee'])->group(function () {
        Route::resource('employees', EmployeeController::class);
        Route::match(['GET', 'PUT'], 'employee-update-funding-source/{employee}', [EmployeeController::class, 'UpdateFundingSource'])->name('employees.updateFunding');
    });

//Admin Routes

    Route::group(['prefix' => 'admin'], function () {
        Route::name('admin.')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->middleware(['admin_role'])->name('dashboard');
            Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
            Route::post('login', [LoginController::class, 'login'])->name('login.submit');
            Route::post('logout', [LoginController::class, 'logout'])->name('logout');
            Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
            Route::post('register', [RegisterController::class, 'register'])->name('register.submit');
            Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
            Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
            Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
            Route::post('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');
            Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
            Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm'])->name('password.confirm.submit');
            Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
            Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
            Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
            Route::middleware(['role:admin'])->group(function () {
                Route::resource('users', UserController::class);
                Route::get('do-ach-payment', [AdminController::class, 'create']);
            });
        });


    });
    Route::get('/manage-users', [ManageusersController::class, 'Index']);
    Route::get('/add-user', [ManageusersController::class, 'Adduser']);
    Route::post('/postSaveUser', [ManageusersController::class, 'postSaveUser']);
});









