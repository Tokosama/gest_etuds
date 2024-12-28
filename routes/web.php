<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UEController;
use App\Http\Controllers\EcController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\HomeController;


// Route pour la page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/bulletins', [HomeController::class, 'bulletins'])->name('bulletins.index');

// Route pour afficher le bulletin d'un étudiant
Route::get('/etudiants/{etudiant}/bulletin', [EtudiantController::class, 'showBulletin'])->name('etudiants.showBulletin');


// Routes pour les UEs
Route::get('/ues', [UEController::class, 'index'])->name('ues.index');
Route::get('/ues/create', [UEController::class, 'create'])->name('ues.create');
Route::get('/ues/{ue}/etudiants/{etudiant}/moyenne', [UEController::class, 'showMoyenne'])->name('ues.moyenne');
Route::post('/ues', [UEController::class, 'store'])->name('ues.store');
Route::get('/ues/{ue}/edit', [UEController::class, 'edit'])->name('ues.edit');
Route::put('/ues/{ue}', [UEController::class, 'update'])->name('ues.update');
Route::delete('/ues/{ue}', [UEController::class, 'destroy'])->name('ues.destroy');

// Routes pour les ECs
Route::get('/ecs', [EcController::class, 'index'])->name('ecs.index');
Route::get('/ecs/create', [EcController::class, 'create'])->name('ecs.create');
Route::post('/ecs', [EcController::class, 'store'])->name('ecs.store');
Route::get('/ecs/{ec}/edit', [EcController::class, 'edit'])->name('ecs.edit');
Route::put('/ecs/{ec}', [EcController::class, 'update'])->name('ecs.update');
Route::delete('/ecs/{ec}', [EcController::class, 'destroy'])->name('ecs.destroy');

// Routes pour les Notes

Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
Route::get('/etudiants/create', [EtudiantController::class, 'create'])->name('etudiants.create');
Route::post('/etudiants', [EtudiantController::class, 'store'])->name('etudiants.store');
Route::get('/etudiants/{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit');

Route::put('/etudiants/{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.update');
Route::delete('/etudiants/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');
Route::get('/etudiants/{etudiant}/bulletin', [EtudiantController::class, 'showBulletin'])->name('etudiants.showBulletin');



