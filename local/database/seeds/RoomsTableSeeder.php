<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('rooms')->truncate();

        $rooms = [
        	['Phòng 101A', '1', '1', '9', '7'],
        	['Phòng 201B', '2', '1', '8', '5'],
        	['Phòng 102A', '1', '1', '9', '6'],
        	['Phòng 302B', '1', '2', '8', '7'],
        	['Phòng 403A', '1', '1', '8', '6'],
        	['Phòng 503B', '1', '1', '9', '5'],
        	['Phòng 104A', '1', '1', '9', '3'],
        	['Phòng 204B', '2', '2', '6', '5'],
        	['Phòng 605A', '3', '2', '6', '3'],
        	['Phòng 805B', '3', '1', '9', '9'],
        	['Phòng 206A', '2', '1', '8', '5'],
        	['Phòng 106B', '1', '1', '9', '9'],
        	['Phòng 202A', '1', '1', '8', '7'],
        	['Phòng 202B', '2', '2', '6', '6'],
        	['Phòng 303A', '1', '1', '9', '5'],
        	['Phòng 303B', '1', '1', '8', '7'],
        	['Phòng 804A', '3', '2', '8', '8'],
        	['Phòng 404B', '2', '1', '9', '6'],
        	['Phòng 505A', '1', '1', '8', '7'],
        	['Phòng 905B', '3', '1', '9', '7'],
        	['Phòng 506A', '1', '2', '6', '4'],
        	['Phòng 306B', '2', '1', '8', '8'],
        ];

        foreach ($rooms as $room) {
        	Database\Room::create([
        		'name' => $room[0],
        		'row_id' => $room[1],
        		'type_room_id' => $room[2],
        		'numnber_student_max' => $room[3],
        		'numnber_student_present' => $room[4],
        	]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
