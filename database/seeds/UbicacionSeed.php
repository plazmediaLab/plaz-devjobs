<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubicacions')->insert([
            'name' => 'Remoto',
            'iata' => 'RM',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ubicacions')->insert([
            'name' => 'Estados Unidos',
            'iata' => 'USA',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ubicacions')->insert([
            'name' => 'Canada',
            'iata' => 'CA',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ubicacions')->insert([
            'name' => 'México',
            'iata' => 'MX',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ubicacions')->insert([
            'name' => 'Nueva Zelanda',
            'iata' => 'NZ',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('ubicacions')->insert([
            'name' => 'España',
            'iata' => 'ES',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
