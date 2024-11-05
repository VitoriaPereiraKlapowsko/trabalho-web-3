<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cliente;

Route::get('/', function () {
    return redirect('/cadastrarCliente'); 
});

Route::get("cadastrarCliente", [Cliente::class,"create"]);
Route::post("cadastrarCliente", [Cliente::class,"store"]);
Route::get('listarCliente', [Cliente::class, 'index']);
Route::delete('deletarCliente/{id}', [Cliente::class, 'destroy']);
Route::get("editarCliente/{id}", [Cliente::class,"edit"]);
Route::put('atualizarCliente/{id}', [Cliente::class, 'update'])->name('atualizarCliente');
