<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker\Factory::create();
        $orders = Order::get();

        foreach($orders as $order){
            User::firstOrCreate([
                'id' => $order->purchaser_id,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'username' => $faker->word,
                'referred_by'   => $orders->random()->purchaser_id,
                'enrolled_date' => $faker->date
            ]);
        }
    }
}
