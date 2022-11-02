<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// test routess
Route::post('/test-opt-wa', [\App\Http\Controllers\AuthOtpController::class, 'testWA']);

// OTP routes
Route::post('/otp-register', [\App\Http\Controllers\AuthOtpController::class, 'register'])->name('otp.register');
Route::post('/otp-generate', [\App\Http\Controllers\AuthOtpController::class, 'generateOtp'])->name('otp.generate');
Route::post('/otp-verify', [\App\Http\Controllers\AuthOtpController::class, 'loginWithOtp'])->name('otp.verify');
Route::post('/otp-logout', [\App\Http\Controllers\AuthOtpController::class, 'otpLogout'])->name('otp.logout');

// Sanctum routes
Route::post('/register', [\App\Http\Controllers\AuthOtpController::class, 'register'])->name('register');
Route::post('/login', [\App\Http\Controllers\AuthOtpController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->post('/logout', [\App\Http\Controllers\AuthOtpController::class, 'logout'])->name('logout');

Route::resource('dossiers', \App\Http\Controllers\DossierController::class);
Route::resource('patients', \App\Http\Controllers\PatientController::class);
Route::resource('tests', \App\Http\Controllers\TestController::class);
//Route::resource('admins', AdminController::class);
Route::resource('kits', \App\Http\Controllers\KitController::class);

Route::get('/patient/profiles', [\App\Http\Controllers\Mobile\MobilePatientController::class, 'patients'])->middleware('auth:sanctum');
Route::get('/patient/dossiers/{patient}', [\App\Http\Controllers\Mobile\MobilePatientController::class, 'dossiers'])->middleware('auth:sanctum');
Route::get('/patients/{patient}', [\App\Http\Controllers\Mobile\MobilePatientController::class, 'patient'])->middleware('auth:sanctum');
Route::get('/dossiers/{dossier}', [\App\Http\Controllers\Mobile\MobilePatientController::class, 'dossier'])->middleware('auth:sanctum');
Route::get('/dossiers/inprogress/{patient}', [\App\Http\Controllers\Mobile\MobilePatientController::class, 'dossierInProgress'])->middleware('auth:sanctum');
Route::post('/patient/new/dossier', [\App\Http\Controllers\Mobile\MobilePatientController::class, 'newDossier'])->middleware('auth:sanctum');
Route::post('/patient/new/profile', [\App\Http\Controllers\Mobile\MobilePatientController::class, 'newProfile'])->middleware('auth:sanctum');

Route::patch('/fcm-token', [\App\Http\Controllers\Mobile\MobilePatientController::class, 'update_token'])->middleware('auth:sanctum');
Route::post('/send-notification',[\App\Http\Controllers\FcmController::class,'notification']);//->middleware('auth:sanctum');
