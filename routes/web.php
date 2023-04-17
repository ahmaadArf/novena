<?php
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\site\SiteController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\QualificationController;

// Dashoard Routes
                //
Route::prefix('admin')->name('admin.')->middleware('auth','check_user')->group(function () {
    //Admin Route
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('/user',[AdminController::class,'user'])->name('user');
    Route::delete('/user/{id}',[AdminController::class,'destroy'])->name('user.destroy');


     //About Route
    Route::get('about/trash', [AboutController::class, 'trash'])->name('about.trash');
    Route::get('about/{id}/restore', [AboutController::class, 'restore'])->name('about.restore');
    Route::delete('about/{id}/forcedelete', [AboutController::class, 'forcedelete'])->name('about.forcedelete');
    Route::resource('about',AboutController::class);

     //Award Route
    Route::get('awards/trash', [AwardController::class, 'trash'])->name('awards.trash');
    Route::get('awards/{id}/restore', [AwardController::class, 'restore'])->name('awards.restore');
    Route::delete('awards/{id}/forcedelete', [AwardController::class, 'forcedelete'])->name('awards.forcedelete');
    Route::resource('awards',AwardController::class);

    //Department Route
    Route::get('departments/trash', [DepartmentController::class, 'trash'])->name('departments.trash');
    Route::get('departments/{id}/restore', [DepartmentController::class, 'restore'])->name('departments.restore');
    Route::delete('departments/{id}/forcedelete', [DepartmentController::class, 'forcedelete'])->name('departments.forcedelete');
    Route::resource('departments',DepartmentController::class);

    //Doctor Route
    Route::get('doctors/trash', [DoctorController::class, 'trash'])->name('doctors.trash');
    Route::get('doctors/{id}/restore', [DoctorController::class, 'restore'])->name('doctors.restore');
    Route::delete('doctors/{id}/forcedelete', [DoctorController::class, 'forcedelete'])->name('doctors.forcedelete');
    Route::resource('doctors',DoctorController::class);

    //Feature Route
    Route::get('features/trash', [FeatureController::class, 'trash'])->name('features.trash');
    Route::get('features/{id}/restore', [FeatureController::class, 'restore'])->name('features.restore');
    Route::delete('features/{id}/forcedelete', [FeatureController::class, 'forcedelete'])->name('features.forcedelete');
    Route::resource('features',FeatureController::class);


    //Qualification Route
    Route::get('qualifications/trash', [QualificationController::class, 'trash'])->name('qualifications.trash');
    Route::get('qualifications/{id}/restore', [QualificationController::class, 'restore'])->name('qualifications.restore');
    Route::delete('qualifications/{id}/forcedelete', [QualificationController::class, 'forcedelete'])->name('qualifications.forcedelete');
    Route::resource('qualifications',QualificationController::class);


    //Testimonial Route
    Route::get('testimonials/trash', [TestimonialController::class, 'trash'])->name('testimonials.trash');
    Route::get('testimonials/{id}/restore', [TestimonialController::class, 'restore'])->name('testimonials.restore');
    Route::delete('testimonials/{id}/forcedelete', [TestimonialController::class, 'forcedelete'])->name('testimonials.forcedelete');
    Route::resource('testimonials',TestimonialController::class);

        //Schedule Route
    Route::get('schedules/trash', [ScheduleController::class, 'trash'])->name('schedules.trash');
    Route::get('schedules/{id}/restore', [ScheduleController::class, 'restore'])->name('schedules.restore');
    Route::delete('schedules/{id}/forcedelete', [ScheduleController::class, 'forcedelete'])->name('schedules.forcedelete');
    Route::resource('schedules',ScheduleController::class);

    //Partner Route
    Route::resource('partners',PartnerController::class);

    Route::resource('roles',RoleController::class);

    Route::resource('users',UserController::class);




});

Auth::routes();
Route::view('not','not_allawd');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Site Route
Route::get('/',[SiteController::class,'index'])->name('site.index');
Route::get('/appoinment',[SiteController::class,'appoinment'])->name('site.appoinment');
Route::post('/appoi',[SiteController::class,'appoinment_data'])->name('site.appoinment_data');
Route::post('/appoinment',[SiteController::class,'appoinment_data_form'])->name('site.appoinment_data_form');
Route::get('/service',[SiteController::class,'service'])->name('site.service');
Route::get('/about',[SiteController::class,'about'])->name('site.about');
Route::get('/doctor',[SiteController::class,'doctor'])->name('site.doctor');
Route::get('/doctor-single/{id}',[SiteController::class,'doctor_single'])->name('site.doctor_single');
Route::get('/department',[SiteController::class,'department'])->name('site.department');
Route::get('/department-single/{id}',[SiteController::class,'department_single'])->name('site.department_single');
Route::get('/contact',[SiteController::class,'contact'])->name('site.contact');

Route::post('/contact',[SiteController::class,'contact_data'])->name('site.contact_data');
Route::get('/confirmation',[SiteController::class,'confirmation'])->name('site.confirmation');
