<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//home routes
Route::get('/', 'HomeController@Pocetna');
Route::get('/ONama','HomeController@ONama');
Route::get('/home', 'HomeController@Pocetna')->name('home');

//auth routes
Auth::routes();

//administracija routes
Route::get('/Administracija/Korisnici', 'AdministracijaController@ListaKorisnika');
Route::post('/Administracija/BrisanjeKorisnika', ['uses'=>'AdministracijaController@BrisanjeKorisnika']);
Route::get('/Administracija/NalogKorisnika', ['uses'=>'AdministracijaController@NalogKorisnika','as'=>'NalogKorisnika']);

//Korisnik routes
Route::get('/Korisnik/NalogKorisnika', ['uses'=>'KorisnikController@NalogKorisnika','as'=>'NalogKorisnika']);
Route::post('/Korisnik/ObrisiNalog', ['uses'=>'KorisnikController@ObrisiNalog','as'=>'ObrisiNalog']);
Route::post('/Korisnik/DoplatiNovac', ['uses'=>'KorisnikController@DoplatiNovac','as'=>'DoplatiNovac']);
Route::get('/Korisnik/PromeniSifru', ['uses'=>'KorisnikController@PromeniSifru','as'=>'PromeniSifru']);
Route::post('/Korisnik/PromenaSifre', ['uses'=>'KorisnikController@PromenaSifre','as'=>'PromenaSifre']);
