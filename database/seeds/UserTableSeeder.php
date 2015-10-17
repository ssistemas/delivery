<?php

use Illuminate\Database\Seeder;
use Delivery\Models\User;
use Delivery\Models\Client;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     factory(Delivery\Models\User::class)->create([
      'name' => 'admin',
      'email' => 'admin@gmail.com',
      'password' => bcrypt(123456),
      'role'=>'admin',
      'remember_token' => str_random(10),
      ])->client()->save( factory(Client::class)->make());

     factory(Delivery\Models\User::class)->create([
      'name' => 'Dannielly',
      'password' => bcrypt(123456),
      'email' => 'client@gmail.com',
      ])->client()->save( factory(Client::class)->make());

     factory(Delivery\Models\User::class,18)->create()
     ->each(function($u){
      $u->client()->save(factory(Client::class)->make());
    });

     factory(Delivery\Models\User::class)->create([
      'email' => 'deliveryman@gmail.com',
      'password' => bcrypt(123456),
      'role'=>'deliveryman',
      ]);

     factory(Delivery\Models\User::class,4)->create([
      'role'=>'deliveryman',
      ]);
   }
 }
