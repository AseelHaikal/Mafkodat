<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Announcement\AnnouncementController;
use App\Http\Controllers\Compliant\CompliantController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\SettingController;

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

Route::get('/notActive',function(){
    return view('notActive');
})->name('notActive');

Route::any('logout',function(){
    auth::logout();
    return view('auth.login');
})->name('logout');



Route::group(['middleware' => ['auth','isActive']], function() {

    Route::get('/', function () {
        return view('dashboard.index');
    });

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    /*Setting */
    Route::get('/settings',[SettingController::class,'index'])->name('settings');
    Route::get('/settings/update',[SettingController::class,'update'])->name('settings.update');


    /* Role */
    Route::resource('roles',RoleController::class);
    Route::get('/roles_delete/{id}',[RoleController::class,'destroy']);

    /* User */
    Route::resource('users',UserController::class);
    Route::get('/admins',[UserController::class,'showAdmins'])->name('admins');
    Route::get('/users_eye/{id}',[UserController::class,'eye']);
    Route::get('/users_delete/{id}',[UserController::class,'destroy']);

    /*user Profile */
    Route::get('/profile/{id}',[UserProfileController::class,'showUserProfile'])->name('user.profile');
    Route::post('user/profile/update',[UserProfileController::class,'updateUserProfile'])->name('user.profile.update');
    Route::post('user/changePassword',[UserProfileController::class,'changePassword'])->name('user.change.password');


    /*Announcement */
    Route::resource('announcements',AnnouncementController::class);
    Route::get('announcement/category/{category}',[AnnouncementController::class,'getAnnouncementsByCategory'])->name('annoucements.get');
    Route::get('announcement/create/{category}',[AnnouncementController::class,'createAnnouncement'])->name('announcement.create');
    Route::get('/announcements_delete/{id}',[AnnouncementController::class,'destroy']);
    Route::get('/announcements_eye/{id}',[AnnouncementController::class,'eye']);
    Route::get('/announcement/comments/{id}',[AnnouncementController::class,'getAnnouncementComments'])->name('announcement.comments');
    Route::get('announcement/expired/{category}',[AnnouncementController::class,'getExpiredAnnouncements'])->name('annoucements.expired.get');

    /*Comment */
    Route::get('/comments_delete/{id}',[CommentController::class,'destroy']);
    Route::get('/comments_eye/{id}',[CommentController::class,'eye']);

    /*Compliants */
    Route::resource('compliants',CompliantController::class);
    Route::get('/compliants_delete/{id}',[CompliantController::class,'destroy']);
    Route::get('/compliants_eye/{id}',[CompliantController::class,'eye']);

});
