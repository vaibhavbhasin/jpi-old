<?php

use App\Http\Controllers\{DwollaWebhookEventsController, EmployeeController, ProfileController};
use App\Http\Controllers\Admin\{AdminController,
    AjaxController,
    CompanyController,
    PaymentController,
    PhoneReimbursementController,
    PreQualificationController,
    UserController};
use App\Http\Controllers\Auth\{ConfirmPasswordController,
    EmployeeLoginController,
    EmployeeRegisterController,
    ForgotPasswordController,
    LoginController,
    RegisterController,
    ResetPasswordController,
    VerificationController
};
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ManageusersController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/reimbursement');
});
Route::prefix('reimbursement')->group(function () {


//    Route::get('/', [HomeController::class, 'Index']);
    Route::get('test', [TestController::class, 'Index']);

    Route::get('/page-blank', [PageController::class, 'blankPage'])->name('page.blank');
    Route::get('/page-collapse', [PageController::class, 'collapsePage']);
    Route::get('lang/{locale}', [LanguageController::class, 'swap']);

    Route::name('employee.')->group(function () {
        Route::get('/', [EmployeeLoginController::class, 'showLoginForm'])->name('login.show');
        Route::post('login', [EmployeeLoginController::class, 'authenticate'])->name('login');
        Route::get('register', [EmployeeRegisterController::class, 'showRegistrationForm'])->name('register.show');
        Route::post('register', [EmployeeRegisterController::class, 'register'])->name('register');
        Route::post('logout', [EmployeeLoginController::class, 'logout'])->name('logout');
        Route::get('dashboard', [EmployeeController::class, 'index'])->middleware(['checkemployee'])->name('dashboard');
        Route::post('profile', [ProfileController::class, 'postUpdateProfile'])->name('profile');
    });
    //Employee Routes
    Route::middleware(['role:employee'])->group(function () {
        Route::resource('employees', EmployeeController::class);
        Route::match(['GET', 'PUT'], 'employee-update-funding-source/{employee}', [EmployeeController::class, 'UpdateFundingSource'])->name('employees.updateFunding');
    });

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm'])->name('password.confirm.submit');
    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    Route::get('/manage-users', [ManageusersController::class, 'Index']);
    Route::get('/add-user', [ManageusersController::class, 'Adduser']);
    Route::post('/postSaveUser', [ManageusersController::class, 'postSaveUser']);

});
Route::get('check-email-unique', [EmployeeRegisterController::class, 'checkEmailUnique'])->name('checkEmailUnique');

//Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Route::name('admin.')->group(function () {
        Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('login.submit');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register'])->name('register.submit');
        Route::middleware(['role:admin'])->group(function () {
            Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
            Route::resource('users', UserController::class);
            Route::resource('payments', PaymentController::class);
            Route::resource('phonereimbursement', PhoneReimbursementController::class);
        });
        Route::post('bulk-active-inactive', [AjaxController::class, 'bulkUpdateStatus'])->name('bulk_active_inactive');
        Route::put('update-status/{table}', [AjaxController::class, 'updateStatus'])->name('updateStatus');
    });
});



Route::group(['prefix' => 'tpportal'], function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

});


Route::group(['prefix' => 'trade-partner', 'middleware' => 'role:admin'], function () {
//    Route::resource('prequalifications', PreQualificationController::class)->name('preQualification');
    Route::get('pre-qualifications', [PreQualificationController::class,'index'])->name('preQualification.index');
    Route::get('pre-qualifications/application/view/{id?}', [PreQualificationController::class,'showviewapp'])->name('preQualification.showview');
    Route::get('pre-qualifications/application/{id?}', [PreQualificationController::class,'show'])->name('preQualification.show');



    Route::get('companies', [CompanyController::class,'index'])->name('companies.index');
    Route::get('companies/{id?}', [CompanyController::class,'show'])->name('companies.show');
});
Route::get('do-ach-payment', [AdminController::class, 'create']);
Route::match(['GET', 'POST'], 'dwolla-webhooks', [DwollaWebhookEventsController::class, 'index'])->name('dwolla.webhooks');
Route::group(['prefix' => 'dwolla-webhooks'], function () {
    Route::get('subscribe', [DwollaWebhookEventsController::class, 'subscribe']);
    Route::get('subscribe-retrieve/{id}', [DwollaWebhookEventsController::class, 'retrieveSubscribe']);
});

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
Route::get('db-seed', function () {
    return Artisan::call('db:seed');
});
Route::get('db-migrate-fresh', function () {
    return Artisan::call('migrate:fresh');
});
Route::get('db-migrate-fresh-with-seed', function () {
    return Artisan::call('migrate:fresh --seed');
});
Route::get('password', function () {
    return Hash::make('SecurePa5$');
});

Route::get('cron-test', function () {
    return Artisan::call('schedule:run');
});
Route::get('company-details', function () {
    return view('trade_partners.admin.companies.detail');
});

Route::get('cleartransactiondata', function () {
	 $userudArr = array(74,112,150,47,104,78,146,87);
    return DB::table('dwolla_transaction_histories')->whereNotIn('user_id',$userudArr)->delete();
});



Route::get('app-details', function () {
    return view('trade_partners.admin.pre_qualification.detail');
});




Route::get('view-app', function () {
    return view('trade_partners.admin.pre_qualification.view');
});
