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
Route::get('/Administracija/Roba', ['uses'=>'AdministracijaController@AdministracijaRobe','as'=>'AdministracijaRobe']);
//administracija/kategorija routes
Route::get('/Administracija/DodajKategoriju', ['uses'=>'AdministracijaController@DodajKategoriju','as'=>'DodajKategoriju']);
Route::post('/Administracija/BrisanjeKategorije', ['uses'=>'AdministracijaController@BrisanjeKategorije','as' => 'BrisanjeKategorije']);
Route::post('/Administracija/DodavanjeKategorije', ['uses'=>'AdministracijaController@DodavanjeKategorije','as' => 'DodavanjeKategorije']);
Route::get('/Administracija/IzmeniKategoriju', ['uses'=>'AdministracijaController@IzmeniKategoriju','as'=>'IzmeniKategoriju']);
Route::post('/Administracija/IzmenaKategorije', ['uses'=>'AdministracijaController@IzmenaKategorije','as' => 'IzmenaKategorije']);
//administracija/proizvod routes
Route::get('/Administracija/DodajProizvod', 'AdministracijaController@DodajProizvod');
Route::post('/Administracija/DodajProizvod', 'AdministracijaController@DodavanjeProizvoda');
Route::post('/Administracija/ObrisiProizvod', 'AdministracijaController@ObrisiProizvod');
Route::get('/Administracija/IzmeniProizvod', 'AdministracijaController@IzmenaProizvoda');
Route::post('/Administracija/IzmeniProizvod', 'AdministracijaController@IzmeniProizvod');
Route::get('/Administracija/DodajNaStanje', 'AdministracijaController@DodajNaStanje');
Route::post('/Administracija/DodajNaStanje', 'AdministracijaController@DodavanjeNaStanje');
Route::get('/Administracija/PrikaziProizvod', 'AdministracijaController@PrikaziProizvod');


//Korisnik routes
Route::get('/Korisnik/NalogKorisnika', ['uses'=>'KorisnikController@NalogKorisnika','as'=>'NalogKorisnika']);
Route::post('/Korisnik/ObrisiNalog', ['uses'=>'KorisnikController@ObrisiNalog','as'=>'ObrisiNalog']);
Route::post('/Korisnik/DoplatiNovac', ['uses'=>'KorisnikController@DoplatiNovac','as'=>'DoplatiNovac']);
Route::get('/Korisnik/PromeniSifru', ['uses'=>'KorisnikController@PromeniSifru','as'=>'PromeniSifru']);
Route::post('/Korisnik/PromenaSifre', ['uses'=>'KorisnikController@PromenaSifre','as'=>'PromenaSifre']);
Route::get('/Korisnik/KorpaKorisnika','KorisnikController@KorpaKorisnika');
//Proizvodi routes
Route::get('/Proizvodi/prikazi', 'ProizvodiController@Prikazi');
Route::post('/Proizvodi/DodajUKorpu', 'ProizvodiController@DodajUKorpu');
Route::post('/Proizvodi/ObriziIzKorpe', 'ProizvodiController@ObrisiIzKorpe');