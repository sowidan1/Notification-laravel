<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
//    $user = \App\Models\User::get();

//    $post = new \App\Models\Post();
//    Notification::send($user, new \App\Notifications\PostNewNotification($post));
//    Notification::send($user, new \App\Notifications\PostNewNotification());

    $user = Auth::user();
    //unreadNotifications - readNotifications - notifications
//    foreach($user->unreadNotifications as $notification){
//        echo $notification;
////        $notification->markAsRead();
//
//    }
//    $user->unreadNotifications->markAsRead();

    $user->notifications()->delete();

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
