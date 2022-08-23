<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Guest\ContactController;
use App\Http\Controllers\Guest\EventController;
use App\Http\Controllers\Student\ProfileController;
use App\Models\Personal;
use App\Models\User;
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

Route::view('/', 'guest.welcome')->name('welcome');
Route::view('/about', 'guest.about')->name('about');
Route::view('/service', 'guest.service')->name('service');
Route::view('/information', 'guest.information')->name('information');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/sendmail', [ContactController::class, 'sendmail'])->name('contact.sendmail');

Route::get('/news', [EventController::class, 'news'])->name('news.index');
Route::get('/news/{id}', [EventController::class, 'showNews'])->name('news.show');
Route::get('/galleries', [EventController::class, 'galleries'])->name('galleries');
Route::get('/announcement', [EventController::class, 'announcement'])->name('announcement.index');
Route::get('/announcement/{id}', [EventController::class, 'showAnnouncement'])->name('announcement.show');

Route::middleware('guest')->group(function() {
  Route::prefix('auth')->group(function() {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
  });
});

Route::middleware('auth')->group(function() {
  Route::prefix('student')->group(function() {
    Route::get('/profile', [ProfileController::class, 'index'])
      ->name('student.profile.index')
      ->can('viewAnyForStudent', Personal::class);
    Route::patch('/profile/{personal}', [ProfileController::class, 'update'])
      ->name('student.profile.update')
      ->can('updateForStudent', 'personal');
    Route::patch('/profile/avatar/{personal}', [ProfileController::class, 'avatar'])
      ->name('student.profile.avatar')
      ->can('updateForStudent', 'personal');
  });

  Route::prefix('admin')->group(function() {
    Route::get('/profile', [AdminProfileController::class, 'index'])
      ->name('admin.profile.index')
      ->can('viewAny', User::class);
    Route::patch('/profile/{user}', [AdminProfileController::class, 'update'])
      ->name('admin.profile.update')
      ->can('update', 'user');
    Route::patch('/profile/avatar/{user}', [AdminProfileController::class, 'avatar'])
      ->name('admin.profile.avatar')
      ->can('update', 'user');
    Route::get('/dashboard', DashboardController::class)
      ->name('admin.dashboard')
      ->can('viewAnyOnDashboard', User::class);
    Route::resource('news', NewsController::class, ['as' => 'admin'])
      ->except('show');
    Route::resource('gallery', GalleryController::class, ['as' => 'admin'])
      ->except('show');
    Route::resource('announcement', AnnouncementController::class, ['as' => 'admin'])
      ->except('show');
    Route::resource('student', StudentController::class, ['as' => 'admin'])
      ->except(['create', 'store', 'show'])
      ->parameters(['student' => 'personal']);
    Route::get('/export/pdf/{personal}', [ExportController::class, 'exportToPDF'])
      ->name('admin.export.pdf')
      ->can('download', 'personal');
  }); 

  Route::prefix('auth')->group(function() {
    Route::post('/logout', LogoutController::class)->name('logout');
  });
});
