<?php

use App\Http\Controllers\BiolimpiezaController;
use Illuminate\Support\Facades\Route;


//Biolimpieza API
Route::prefix('biolimpieza')->group(function () {
    Route::post('/budget', [BiolimpiezaController::class, 'sendBudget']);
    Route::post('/plan', [BiolimpiezaController::class, 'sendPlan']);
    Route::post('/contact', [BiolimpiezaController::class, 'sendContact']);
    Route::post('/question', [BiolimpiezaController::class, 'sendQuestion']);
});
