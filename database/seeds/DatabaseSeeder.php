<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CupomTableSeeder::class);
        $this->call(OrderTableSeeder::class);

        \DB::insert('INSERT INTO oauth_clients (id, secret, name, created_at, updated_at) VALUES(?,?,?,?,?)',['app001', 'secret', 'mobile', '2015-10-17 03:00:00', '2015-10-17 03:00:00']);

        Model::reguard();
    }
}
