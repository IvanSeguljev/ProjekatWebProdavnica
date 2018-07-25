<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            'name' => 'Ivan',
            'email' => 'ivan.seguljev@yahoo.com',
            'password' => bcrypt('123123'),
            'role'=>'Korisnik',
            'stanjeNaRacunu' =>'0',
        ]);
          DB::table('users')->insert([
            'name' => 'Pera',
            'email' => 'pera@mail.com',
            'password' => bcrypt('123123'),
            'role'=>'Korisnik',
            'stanjeNaRacunu' =>'0',
        ]);
          DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123123'),
            'role'=>'Administrator',
            'stanjeNaRacunu' =>'0',
        ]);
          DB::table('kategorijas')->insert([
            'naziv'=>'Otpornici'
        ]);
          DB::table('kategorijas')->insert([
            'naziv'=>'Diode'
        ]);
          DB::table('kategorijas')->insert([
            'naziv'=>'Transformatori'
        ]);
          DB::table('kategorijas')->insert([
            'naziv'=>'Knjige'
        ]);
          
    }
}
