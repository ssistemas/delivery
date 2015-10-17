<?php

use Illuminate\Database\Seeder;
use Delivery\Models\Order;
use Delivery\Models\Cupom;

class CupomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cupom::class,50)->create();
    }
}