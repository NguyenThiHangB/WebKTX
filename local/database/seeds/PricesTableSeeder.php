<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('prices')->truncate();

        $prices = [
        	['Điện', '2.000', 'Số'],
        	['Nước', '7.200', 'Khối'],
        	['Bóng điện', '40.000', 'Chiếc'],
        	['Giường', '2.000.000', 'Chiếc'],
        ];

        foreach ($prices as $key => $price) {
        	Database\Price::create([
        		'name' => $price[0],
        		'price' => $price[1],
        		'unit' => $price[2],
        	]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
