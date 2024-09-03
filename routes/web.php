<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpensesController;
use App\Models\Expenses;

Route::group(['prefix' => 'expenses'], function() {
    Route::get('/list-all', [ExpensesController::class, 'listAll']);
    Route::get('/list-by-market', [ExpensesController::class, 'listByMarket']);
    Route::get('/create-expense', [ExpensesController::class, 'create']);
    Route::get('/delete/{id}', [ExpensesController::class, 'delete']);
});
