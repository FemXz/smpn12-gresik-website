<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ExtracurricularController as AdminExtracurricularController;
use App\Http\Controllers\Admin\TeacherNewsController as AdminTeacherNewsController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\EbookController as AdminEbookController;
use App\Http\Controllers\Admin\AlumniController as AdminAlumniController;
use App\Http\Controllers\Admin\PpdbSettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StatController;





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

// Home Page
Route::get("/",[HomeController::class, "index"])->name("home");


// Authentikasi
Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
});



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// About Pages
Route::prefix("about")->group(function () {
    Route::get("/",[AboutController::class, "index"])->name("about");
    Route::get("/history",[AboutController::class, "history"])->name("about.history");
    Route::get("/vision-mission",[AboutController::class, "visionMission"])->name("about.vision-mission");
    Route::get("/organization",[AboutController::class, "organization"])->name("about.organization");
});

// News & PPDB
Route::prefix('information')->group(function () {

    Route::get('/news', [NewsController::class, 'index'])->name('information.news');
    Route::get('/news/{slug}', [NewsController::class, 'show'])->name('information.news.show');

   Route::get('/information/ppdb', [PpdbController::class, 'index'])
    ->name('information.ppdb');

});

// ekstraa
Route::get("/extracurricular",[StudentController::class, "extracurricular"])->name("academic.extracurricular");


//gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');



// Academic
Route::prefix("academic")->group(function () {
    Route::get("/curriculum",[StudentController::class, "curriculum"])->name("academic.curriculum");
    Route::get("/subjects",[StudentController::class, "subjects"])->name("academic.subjects");
    Route::get("/schedule",[StudentController::class, "schedule"])->name("academic.schedule");
    Route::get("/extracurricular",[StudentController::class, "extracurricular"])->name("academic.extracurricular");
});

// Teachers & Staff
Route::prefix("teachers")->group(function () {
    Route::get("/", [TeacherController::class, "index"])->name("teachers");
    Route::get("/{teacher:slug}", [TeacherController::class, "show"])->name("teachers.show");
});


// Facilities
Route::prefix("facilities")->group(function () {
    Route::get("/",[FacilityController::class, "index"])->name("facilities");
    Route::get("/{slug}",[FacilityController::class, "show"])->name("facilities.show");
});

// Student Portal
Route::prefix("student")->group(function () {
    Route::get("/portal",[StudentController::class, "portal"])->name("student.portal");
    Route::get("/grades",[StudentController::class, "grades"])->name("student.grades");
    Route::get("/attendance",[StudentController::class, "attendance"])->name("student.attendance");
});

// Contact
Route::prefix("contact")->group(function () {
    Route::get("/",[ContactController::class, "index"])->name("contact");
    Route::post("/send",[ContactController::class, "send"])->name("contact.send");
});

// API Routes for AJAX requests
Route::prefix("api")->group(function () {
    Route::get("/latest-news",[NewsController::class, "latestNews"]);
    Route::get("/upcoming-events",[HomeController::class, "upcomingEvents"]);
    Route::get("/quick-stats",[HomeController::class, "quickStats"]);
});

// Teacher News
Route::prefix("teacher-news")->group(function () {
    Route::get("/", [App\Http\Controllers\TeacherNewsController::class, "index"])->name("teacher-news");
    Route::get("/{slug}", [App\Http\Controllers\TeacherNewsController::class, "show"])->name("teacher-news.show");
});

// Programs
Route::prefix("programs")->group(function () {
    Route::get("/", [ProgramController::class, "index"])->name("programs");
    Route::get("/{program}", [ProgramController::class, "show"])->name("programs.show");
});

// E-books
Route::prefix("ebooks")->group(function () {
    Route::get("/", [EbookController::class, "index"])->name("ebooks");
    Route::get("/{ebook}", [EbookController::class, "show"])->name("ebooks.show");
    Route::get("/{ebook}/download", [EbookController::class, "download"])->name("ebooks.download");
});

// Alumni
Route::prefix("alumni")->group(function () {
    Route::get("/", [AlumniController::class, "index"])->name("alumni");
    Route::get("/register", [AlumniController::class, "register"])->name("alumni.register");
    Route::post("/register", [AlumniController::class, "store"])->name("alumni.store");
});

// PPDB
Route::prefix("ppdb")->group(function () {
    Route::get("/", [PpdbController::class, "index"])->name("ppdb");
    Route::get("/{ppdb}", [PpdbController::class, "show"])->name("ppdb.show");
});



Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});



Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Admin Routes (protected by auth middleware)
Route::middleware('auth')->prefix("admin")->group(function () {
    Route::redirect('/', '/admin/dashboard');



    Route::get("/dashboard", [DashboardController::class, "index"])->name("admin.dashboard");



     Route::prefix('ppdb')->name('admin.ppdb.')->group(function () {
        Route::get('/settings', [PpdbSettingController::class, 'edit'])->name('settings.edit');
        Route::put('/settings', [PpdbSettingController::class, 'update'])->name('settings.update');
    });



    // Gallery
    Route::resource('gallery', AdminGalleryController::class)
        ->except(['show'])
        ->names('admin.gallery');



    // admin profile
  Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});



// admin user
 Route::prefix('admin')->name('admin.')->middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{id}/approve', [UserController::class, 'approve'])->name('users.approve');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});



    // School Stats
    Route::get('/stats/edit', [StatController::class, 'edit'])->name('admin.stats.edit');
    Route::put('/stats/update', [StatController::class, 'update'])->name('admin.stats.update');



    // News Routes
    Route::get("/news", [AdminNewsController::class, "index"])->name("admin.news.index");
    Route::get("/news/create", [AdminNewsController::class, "create"])->name("admin.news.create");
    Route::post("/news", [AdminNewsController::class, "store"])->name("admin.news.store");
    Route::get("/news/{news}/edit", [AdminNewsController::class, "edit"])->name("admin.news.edit");
    Route::put("/news/{news}", [AdminNewsController::class, "update"])->name("admin.news.update");
    Route::delete("/news/{news}", [AdminNewsController::class, "destroy"])->name("admin.news.destroy");

    // Extracurriculars Routes
    Route::get("/extracurriculars", [AdminExtracurricularController::class, "index"])->name("admin.extracurriculars.index");
    Route::get("/extracurriculars/create", [AdminExtracurricularController::class, "create"])->name("admin.extracurriculars.create");
    Route::post("/extracurriculars", [AdminExtracurricularController::class, "store"])->name("admin.extracurriculars.store");
    Route::get("/extracurriculars/{extracurricular}/edit", [AdminExtracurricularController::class, "edit"])->name("admin.extracurriculars.edit");
    Route::put("/extracurriculars/{extracurricular}", [AdminExtracurricularController::class, "update"])->name("admin.extracurriculars.update");
    Route::delete("/extracurriculars/{extracurricular}", [AdminExtracurricularController::class, "destroy"])->name("admin.extracurriculars.destroy");

    // Teacher News Routes
    Route::get("/teacher-news", [AdminTeacherNewsController::class, "index"])->name("admin.teacher-news.index");
    Route::get("/teacher-news/create", [AdminTeacherNewsController::class, "create"])->name("admin.teacher-news.create");
    Route::post("/teacher-news", [AdminTeacherNewsController::class, "store"])->name("admin.teacher-news.store");
    Route::get("/teacher-news/{teacher_news}/edit", [AdminTeacherNewsController::class, "edit"])->name("admin.teacher-news.edit");
    Route::put("/teacher-news/{teacher_news}", [AdminTeacherNewsController::class, "update"])->name("admin.teacher-news.update");
    Route::delete("/teacher-news/{teacher_news}", [AdminTeacherNewsController::class, "destroy"])->name("admin.teacher-news.destroy");

    // Teachers Routes
    Route::get("/teachers", [AdminTeacherController::class, "index"])->name("admin.teachers.index");
    Route::get("/teachers/create", [AdminTeacherController::class, "create"])->name("admin.teachers.create");
    Route::post("/teachers", [AdminTeacherController::class, "store"])->name("admin.teachers.store");
    Route::get("/teachers/{teacher}/edit", [AdminTeacherController::class, "edit"])->name("admin.teachers.edit");
    Route::put("/teachers/{teacher}", [AdminTeacherController::class, "update"])->name("admin.teachers.update");
    Route::delete("/teachers/{teacher}", [AdminTeacherController::class, "destroy"])->name("admin.teachers.destroy");

    // Programs
    Route::get("/programs", [AdminProgramController::class, "index"])->name("admin.programs.index");
    Route::get("/programs/create", [AdminProgramController::class, "create"])->name("admin.programs.create");
    Route::post("/programs", [AdminProgramController::class, "store"])->name("admin.programs.store");
    Route::get("/programs/{program}/edit", [AdminProgramController::class, "edit"])->name("admin.programs.edit");
    Route::put("/programs/{program}", [AdminProgramController::class, "update"])->name("admin.programs.update");
    Route::delete("/programs/{program}", [AdminProgramController::class, "destroy"])->name("admin.programs.destroy");

    // E-books
    Route::get("/ebooks", [AdminEbookController::class, "index"])->name("admin.ebooks.index");
    Route::get("/ebooks/create", [AdminEbookController::class, "create"])->name("admin.ebooks.create");
    Route::post("/ebooks", [AdminEbookController::class, "store"])->name("admin.ebooks.store");
    Route::get("/ebooks/{ebook}/edit", [AdminEbookController::class, "edit"])->name("admin.ebooks.edit");
    Route::put("/ebooks/{ebook}", [AdminEbookController::class, "update"])->name("admin.ebooks.update");
    Route::delete("/ebooks/{ebook}", [AdminEbookController::class, "destroy"])->name("admin.ebooks.destroy");

    // Alumni
    Route::get("/alumni", [AdminAlumniController::class, "index"])->name("admin.alumni.index");
    Route::get("/alumni/create", [AdminAlumniController::class, "create"])->name("admin.alumni.create");
    Route::post("/alumni", [AdminAlumniController::class, "store"])->name("admin.alumni.store");
    Route::get("/alumni/{alumni}/edit", [AdminAlumniController::class, "edit"])->name("admin.alumni.edit");
    Route::put("/alumni/{alumni}", [AdminAlumniController::class, "update"])->name("admin.alumni.update");
    Route::delete("/alumni/{alumni}", [AdminAlumniController::class, "destroy"])->name("admin.alumni.destroy");
    Route::patch("/alumni/{alumni}/approve", [AdminAlumniController::class, "approve"])->name("admin.alumni.approve");
    Route::patch("/alumni/{alumni}/feature", [AdminAlumniController::class, "feature"])->name("admin.alumni.feature");



});





