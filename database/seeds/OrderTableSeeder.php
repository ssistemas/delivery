<?php

use Illuminate\Database\Seeder;
use Delivery\Models\Order;
use Delivery\Models\OrderItem;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    /*	factory(Order::class)->create([
            'client_id'=>12,
            //'user_delivery_man_id'=>null,
            'total'=>55.45,
            'status'=>0,
            ]);
        factory(Order::class)->create([
            'client_id'=>11,
           //'user_delivery_man_id'=>null,
            'total'=>55.40,
            'status'=>1,
            ]);
  */
        factory(Order::class,100)->create()->each(function($o){
            for ($i=0; $i<=5 ; $i++) { 
                $o->orderitems()->save(factory(OrderItem::class)->make([
                    'product_id'=>rand(1,100),
                    'qtd'=>rand(1,100),
                    'price'=>rand(10,100),
                    ]));
            }
        });
    }
}

//$o = Delivery\Models\Order::find(5)->orderitems