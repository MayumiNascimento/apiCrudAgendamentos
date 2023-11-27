<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();    
});

Route::get('/agendamento/', [App\Http\Controllers\Api\ControllerAgendamento::class, 'get']);
Route::get('/agendamento/id={id}', [App\Http\Controllers\Api\ControllerAgendamento::class, 'getId']);
Route::get('/agendamento/{dias?}', [App\Http\Controllers\Api\ControllerAgendamento::class, 'getDia']);
Route::post('/agendamento/novo', [\App\Http\Controllers\Api\ControllerAgendamento::class, 'post']);
Route::put('/agendamento/{id}', [\App\Http\Controllers\Api\ControllerAgendamento::class, 'update']);
Route::delete('/agendamento/{id}', [App\Http\Controllers\Api\ControllerAgendamento::class, 'deletar']);