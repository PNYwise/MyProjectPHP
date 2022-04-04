<?php

namespace Database\Seeders;

use App\Models\FinalOrder;
use App\Models\FinalOrderDetail;
use App\Models\News;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'full_name' => 'admin',
            'email' => 'admin@junkbee.id',
            'address' => 'Jl.Raya Utara No  53',
            'phone' => '089112746532',
            'role' => 'admin',
            'active' => 1,
            'verified' => 1,
            'balance' => 0,
            'password' => bcrypt('password')
        ]);

        FinalOrder::create([
            'order_code' => 'N0001',
            'user_id' => '2',
            'driver_id' => '4',
            'waste_collector_id' => '3',
            'date' => now(),
            'total_weight' => 10,
            'total' => 30000,
            'fee_beever' => 7000,
            'status' => 'on going',
            'location1' => 'Jl1',
            'location2' => 'Jl2',
        ]);
        FinalOrderDetail::create([
            'order_code' => 'N0001',
            'waste_type' => 'plastic',
            'waste_weight' => 10,
            'subtotal' => 30000,
        ]);

        // FinalOrder::create([
        //     'order_code' => 'N0001',
        //     'user_id' => '2',
        //     'driver_id' => '2',
        //     'waste_collector_id' => '3',
        //     'date' => now(),
        //     'total_weight' => 10,
        //     'total' => 30000,
        //     'fee_beever' => 7000,
        //     'status' => 'on going',
        //     'location1' => 'Jl1',
        //     'location2' => 'Jl2',
        // ]);
        // FinalOrderDetail::create([
        //     'order_code' => 'N0001',
        //     'waste_type' => 'plastic',
        //     'waste_weight' => 10,
        //     'subtotal' => 30000,
        // ]);

        User::factory(10)->create();
        // News::factory(10)->create();
        // \App\Models\Order::factory(10)->create();
    }
}
