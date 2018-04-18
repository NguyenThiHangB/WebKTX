<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('students')->truncate();

        $students = [
        	['1321050528', 'Nguyễn Thị Hằng', '1995-10-08', '0', 'Công nghệ phần B', '2', '168 535 270', '0981 836 098', 'Kim Bảng - Hà Nam', '1', '6', '0'],
        	['1321050400', 'Bùi Thị An', '1995-10-08', '0', 'Công nghệ phần B', '2', '178 345 678', '0982 564 675', 'Vũ Thư - Thái Bình', '2', '9', '0'],
            ['1421050772', 'Nguyễn Tuấn Anh', '1997-01-15', '1', 'Trắc Địa', '4', '168 535 270', '0917 254 786', 'Thanh Miện - Hải Dương', '1', '2', '0'],
            ['1321050723', 'Trần Công Tú', '1995-05-02', '1', 'Xây dựng A', '2', '168 535 270', '0981 836 098', 'Đông Hưng - Thái Bình', '1', '2', '1'],
            ['1421050768', 'Dương Minh Tuấn', '1997-09-20', '1', 'Địa Chất', '4', '168 535 270', '0917 254 786', 'Ninh Giang - Hải Dương', '1', '2', '2'],
            ['1421050528', 'Nguyễn Mạnh Hùng', '1998-11-28', '1', 'Tin kinh tế', '3', '168 535 270', '0981 836 098', 'Hậu Lộc - Thanh Hóa', '1', '2', '0'],
            ['1421050802', 'Trần Văn Minh', '1997-02-12', '1', 'Xây Dựng', '5', '168 535 270', '0917 254 786', 'Thanh Miện - Hải Dương', '1', '2', '1'],
            ['1421050456', 'Trần Thị Yến', '1995-06-16', '0', 'Kế toán A', '3', '168 535 270', '0981 836 098', 'Lý Nhân - Hà Nam', '1', '1', '2'],
        ];

        foreach ($students as $student) {
            Database\Student::create([
                'code_student' => $student[0],
                'name' => $student[1],
                'birth' => $student[2],
                'gender' => $student[3],
                'class' => $student[4],
                'cource_id' => $student[5],
                'identity_card' => $student[6],
                'phone' => $student[7],
                'address' => $student[8],
                'region_id' => $student[9],
                'room_id' => $student[10],
                'status' => $student[11],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
