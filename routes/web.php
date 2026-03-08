<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminFileController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home.public');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', function () {
    Auth::logout(); // déconnecte l'utilisateur
    request()->session()->invalidate(); // invalide la session
    request()->session()->regenerateToken(); // régénère le token CSRF
    return redirect('/'); // redirige vers welcome
})->name('logout');

// ================= ADMIN =================

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // ===== DASHBOARD =====
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/notifications', [App\Http\Controllers\Admin\AdminNotificationController::class, 'index'])
        ->name('notifications.index');

    // ===== USERS =====
    Route::get('/users', [AdminUserController::class, 'index'])
        ->name('users.index');

    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])
        ->name('users.destroy');

    // ===== VIDEOS =====
    Route::get('/videos', [AdminVideoController::class, 'index'])
        ->name('videos.index');

    Route::get('/videos/create', [AdminVideoController::class, 'create'])
        ->name('videos.create');

    Route::post('/videos', [AdminVideoController::class, 'store'])
        ->name('videos.store');

     Route::post('/videos/{video}/toggle',
        [AdminVideoController::class, 'toggle']
    )->name('videos.toggle');

    // ===== CATEGORIES =====
    Route::get('/categories', [AdminCategoryController::class, 'index'])
        ->name('categories.index');

    Route::post('/categories', [AdminCategoryController::class, 'store'])
        ->name('categories.store');

    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])
        ->name('categories.destroy');


    Route::get('/comments', [AdminCommentController::class, 'index'])
        ->name('comments.index');

    Route::post('/comments/{comment}/approve', [AdminCommentController::class, 'approve'])
        ->name('comments.approve');

        Route::post('comments/{comment}/reject',  [AdminCommentController::class, 'reject']) ->name('comments.reject');  

    Route::delete('/comments/{comment}', [AdminCommentController::class, 'destroy'])
        ->name('comments.destroy');

  Route::get('/stats/reactions', function () {
        return response()->json([
            'like'    => \App\Models\Reaction::where('reaction', 'like')->count(),
            'love'    => \App\Models\Reaction::where('reaction', 'love')->count(),
            'sad'     => \App\Models\Reaction::where('reaction', 'sad')->count(),
            'angry'   => \App\Models\Reaction::where('reaction', 'angry')->count(),
            'support' => \App\Models\Reaction::where('reaction', 'support')->count(),
        ]);
    })->name('stats.reactions');

    Route::get('/admin/messages', [App\Http\Controllers\Admin\MessageAdminController::class, 'index'])->name('admin.messages.index');
    Route::get('/admin/messages/{message}', [App\Http\Controllers\Admin\MessageAdminController::class, 'show'])->name('admin.messages.show');

});

 Route::get('/categories/{category}', [CategoryController::class, 'show']
        )->name('categories.show');


// ================= USER =================
Route::middleware('auth')->group(function () {
 Route::get('/videos', [VideoController::class, 'index'])->name('user.videos');
    Route::post('/videos/{video}/react', [ReactionController::class, 'store']);
    Route::post('/radio/message', [MessageController::class, 'store']);
});
Route::post('/videos/{video}/comment', [CommentController::class, 'store']);
Route::get('/videos/{video}', [VideoController::class, 'show'])
    ->name('videos.show');

// Ajout d'une route pour envoyer un message de contact
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
