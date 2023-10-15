<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignatureController as SignatureControllerAlias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/test', [SignatureControllerAlias::class, 'index']);

//    $plan = \App\Models\Plan::create([
//        'name' => 'First plan',
//        'short_description' => 'A terrible plan',
//        'price' => 2999
//    ]);
//
//    $client = Auth::user()->client()->create([
//        'document' => '19216808211',
//        'birthdate' => '1994-01-19'
//    ]);
//
//    $client->signatures()->create([
//        'plan_id' => $plan->id,
//        'status' => \App\Enums\SignatureStatus::ACTIVATED
//    ]);
