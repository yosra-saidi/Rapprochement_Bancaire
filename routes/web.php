<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\RapprochementBancaireController;
use app\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TransactionBancaireController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/factures', [FactureController::class, 'index'])->name('factures.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/about-us', function () {
    return view('about-us');

});
Route::get('/factures', function () {
    return view('show');

});
// //storage
// Route::resource('factures', FactureController::class);

Route::post('/factures', 'FactureController@store')->name('factures.store');

Route::get('/factures', [FactureController::class, 'index']);
Route::put('/factures/{id}', 'FactureController@update')->name('factures.update');

Route::get('/factures/create', [FactureController::class, 'create'])->name('factures.create');
Route::get('/factures/{facture}', [FactureController::class, 'show'])->name('factures.show');
Route::get('/factures/{facture}/edit', [FactureController::class, 'edit'])->name('factures.edit');
Route::delete('/factures/{facture}', [FactureController::class, 'destroy'])->name('factures.destroy');
Route::get('/show', function () {
    return view('show');
})->name('show');


Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/profile', function () {
    return view('profile');
})->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
// Routes pour les factures
Route::get('/factures', [FactureController::class, 'index'])->name('factures.index');
Route::get('/factures/create', [FactureController::class, 'create'])->name('factures.create');
Route::post('/factures', [FactureController::class, 'store'])->name('factures.store');
Route::get('/factures/{id}/edit', [FactureController::class, 'edit'])->name('factures.edit');
Route::put('/factures/{id}', [FactureController::class, 'update'])->name('factures.update');
Route::delete('/factures/{id}', [FactureController::class, 'destroy'])->name('factures.destroy');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
// routes/web.php

Route::get('/rapprochement-bancaire', [RapprochementBancaireController::class, 'index'])->name('rapprochement-bancaire.index');

// web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/clients', 'ClientController@index');
});

Route::get('/clients', [ClientController::class, 'index']);
Route::resource('clients', ClientController::class);
Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});
// Exemple de déclaration des routes pour TransactionBancaireController
Route::get('/transactions', [TransactionBancaireController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [TransactionBancaireController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionBancaireController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{id}', [TransactionBancaireController::class, 'show'])->name('transactions.show');
Route::get('/transactions/{id}/edit', [TransactionBancaireController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{id}', [TransactionBancaireController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{id}', [TransactionBancaireController::class, 'destroy'])->name('transactions.destroy');
Route::get('/rapprochement', [RapprochementBancaireController::class, 'index'])->name('rapprochement.index');
Route::post('/rapprochement/run', [RapprochementBancaireController::class, 'run'])->name('rapprochement.run');

require __DIR__.'/auth.php';