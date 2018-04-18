<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class TypeRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('type_rooms')->truncate();

        $type_rooms = [
        	['Tiêu chuẩn', '120 000', '9'],
        	['Yêu cầu', '150 000', '8'],
        ];

        foreach ($type_rooms as $type_room) {
            Database\TypeRoom::create([
                'name' => $type_room[0],
                'price' => $type_room[1],
                'student_max' => $type_room[2],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
