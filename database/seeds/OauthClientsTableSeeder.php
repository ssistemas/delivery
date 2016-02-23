<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OauthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::insert('INSERT INTO oauth_clients (id, secret, name, created_at, updated_at) VALUES(?,?,?,?,?)',['app001', 'secret', 'mobile', Carbon::now('America/Fortaleza')->toDateTimeString(), Carbon::now('America/Fortaleza')->toDateTimeString()]);
    }
}