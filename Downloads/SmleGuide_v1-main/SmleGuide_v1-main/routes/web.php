<?php

use App\Http\Controllers\BannersController;
use App\Http\Controllers\CourseVideosController;
use App\Http\Controllers\UserCoursePurchasesController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DataflowController;
use App\Http\Controllers\CourseFileController;
use App\Http\Controllers\BusinessSettingController;
use App\Http\Controllers\McqsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSubscriptionController;
use App\Http\Controllers\VideoController;

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



Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('services', [ServiceController::class, 'showData'])->name('service');

    //Service Routes
    Route::get('addService', [ServiceController::class, 'addService'])->name('service.add');
    Route::post('/services', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/edit/{id}', [ServiceController::class, 'editService'])->name('service.edit');
    Route::put('service/update/{id}', [ServiceController::class, 'updateService'])->name('service.update');
    Route::delete('service/delete/{id}', [ServiceController::class, 'deleteService'])->name('service.delete');

    //DataFlow Routes
    Route::get('dataflow', [DataflowController::class, 'dataflow'])->name('dataflow');
    Route::get('dataflow_add', [DataflowController::class, 'dataflow_add'])->name('dataflow.add');
    Route::get('dataflow/edit/{id}', [DataflowController::class, 'dataflow_edit'])->name('dataflow.edit');
    Route::put('dataflow/edit/{id}', [DataflowController::class, 'dataflow_update'])->name('dataflow.updatet');
    Route::post('dataflow_add', [DataflowController::class, 'store'])->name('dataflow.store');


    // course controller
    Route::resource('categories', CategoryController::class)->names('categories');
    Route::resource('courses', CourseController::class)->names('courses');
    Route::resource('course-files', CourseFileController::class)->names('courseFiles');
    Route::resource('course-videos',CourseVideosController::class)->names('course.videos');
    Route::get('course-videos/{video}/edit', [CourseVideoController::class, 'edit'])->name('course.videos.edit');
    

    Route::post('/course-file/privacy/{id}', [CourseFileController::class, 'changeFilePrivacy'])->name('courseFiles.privacy')->middleware('Admin');
    Route::get('/course-files/download/{file}', [CourseFileController::class, 'download'])
    ->name('course-files.download')->middleware('Admin');



    Route::prefix('course-purchases')->name('course.purchase.')->group(function () {
            Route::get('/', [UserCoursePurchasesController::class, 'index'])->name('index');
            Route::post('/status/{id}', [UserCoursePurchasesController::class, 'changeStatus'])->name('status')->middleware('Admin');
        });
   
    // mcqs controller
    // Route::resource('mcqs', McqsController::class)->names('mcqs');
    Route::get('questions', [QuestionController::class,'index'])->name('questions');
    Route::get('questions/show/{id}', [QuestionController::class,'show'])->name('questions.show');
    Route::get('questions/create', [QuestionController::class,'create'])->name('questions.create');
    Route::post('questions/store', [QuestionController::class,'store'])->name('questions.store');
    Route::get('questions/{id}', [QuestionController::class,'edit'])->name('questions.edit');
    Route::put('questions/update/{id}', [QuestionController::class,'update'])->name('questions.update');
    Route::delete('questions/destroy/{id}', [QuestionController::class,'destroy'])->name('questions.destroy');
    // tests controller
    Route::resource('testss',TestController::class)->names('tests');
    

    // subscription controller 
    Route::get('subscriptions', [UserSubscriptionController::class, 'index'])->name('userSubscription.index');
    Route::get('subscriptions/show/{id}', [UserSubscriptionController::class, 'show'])->name('userSubscription.show');
    Route::post('subscriptions/changeStatus/{id}', [UserSubscriptionController::class, 'changeStatus'])->name('userSubscription.changeStatus');
    Route::get('generate-{type}/{id}', [UserSubscriptionController::class, 'generatePDF'])->name('userSubscription.generatePDF');
    Route::get('suggestions', [UserSubscriptionController::class, 'suggestions'])->name('userSubscription.suggestions');

    // business settings
    Route::get('/business-settings', [BusinessSettingController::class, 'edit'])->name('business_settings.edit');
    Route::post('/business-settings', [BusinessSettingController::class, 'update'])->name('business_settings.update');
    Route::get('business-settings/delete-logo', [BusinessSettingController::class, 'deleteLogo'])->name('business_settings.delete_logo');

    // user controller 
    Route::get('users',[UserController::class,'index'])->name('users.index');
    Route::get('user/subscriptions/{id}',[UserController::class,'show'])->name('users.show');
    // Route::get('user/subscriptions/suggestions/{id}', [UserController::class, 'suggestions'])->name('userSubscription.suggestions.single');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('profile-update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('change-password', [ProfileController::class, 'password'])->name('profile.password');
    Route::post('change-password', [ProfileController::class, 'updatePassword'])->name('profile.passowrd.change');



    Route::resource('banners', BannersController::class)->names('banners');


});

Route::prefix('auth')->group(function () {
    //Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

    //Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    //logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});




Route::get('/run-migrations', function () {
    // Optional: restrict by IP or auth
    if (!app()->isLocal()) {
        abort(403, 'Unauthorized.');
    }

    Artisan::call('migrate', [
        '--force' => true // Force to run without confirmation
    ]);

    return response()->json([
        'success' => true,
        'output' => Artisan::output()
    ]);
});


Route::get('/link-storage', function () {
    try {
        Artisan::call('storage:link');
        return 'Storage link created successfully!';
    } catch (\Exception $e) {
        return 'Failed to create storage link: ' . $e->getMessage();
    }
});

Route::get('/key-generate', function () {
    try {
        Artisan::call('key:generate');
        return 'New Key created successfully!';
    } catch (\Exception $e) {
        return 'Failed to generate key: ' . $e->getMessage();
    }
});


/*Route::get('', [RoutingController::class, 'index'])->name('root');
Route::get('/home', fn() => view('index'))->name('home');
Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
Route::get('{any}', [RoutingController::class, 'root'])->name('any');*/
