<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models as Database;

class Student extends Model
{
    use SoftDeletes;

    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'code_student',
        'name',
        'birth',
        'gender',
        'class',
        'cource_id',
        'identity_card',
        'phone',
        'address',
        'region_id',
        'room_id',
        'note',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birth',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the number of models to return per page.
     *
     * @return int
     */
    protected $perPage = 10;

    /**
     * Get the cource that owns the student.
     */
    public function cource()
    {
        return $this->belongsTo('App\Models\Cource');
    }

    /**
     * Get the region that owns the student.
     */
    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    /**
     * Get the room that owns the student.
     */
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }


    //decrare const gender
    // const STATUS_CONFIRM = 0;
    // const STATUS_CONFIRMED = 1;
    // const STATUS_NOTCONFIRM = 2;

    /**
     * The attributes that are decrare $gender
     *
     * @var array
     */
    // public static $gender = [
    //     self::STATUS_CONFIRM => '',
    //     self::STATUS_CONFIRMED => 'Đã phê duyệt',
    //     self::STATUS_NOTCONFIRM => 'Chưa phê duyệt',
    // ];

    //decrare const status
    const GENDER_FEMALE = 0;
    const GENDER_MALE = 1;

    /**
     * The attributes that are decrare $gender
     *
     * @var array
     */
    public static $gender = [
        self::GENDER_FEMALE => 'Nữ',
        self::GENDER_MALE => 'Nam',
    ];

    /**
     * The get list Student.
     *
     * @param  \Illuminate\Http\Request $request
     * @return App\Models\Student $builder
     * @author hangnt
     */
    public static function getListStudent($request)
    {
        $builder = Student::orderBy('code_student', 'asc')->with('cource', 'region', 'room');
        
        if (!empty($request['code_student'])) {
            $builder = $builder->where('code_student', '=' , $request['code_student']);
        }
        if (!empty($request['name'])) {
            $builder = $builder->where('name', 'like', '%' . $request['name']. '%');
        }
        if (!empty($request['phone'])) {
            $builder = $builder->where('phone', '=' , $request['phone']);
        }
        if (!empty($request['address'])) {
            $builder = $builder->where('address', '=' , $request['address']);
        }
        if (!empty($request['cource_id'])) {
            $builder = $builder->where('cource_id', '=' , $request['cource_id']);
        }
        if (!empty($request['region_id'])) {
            $builder = $builder->where('region_id', '=' , $request['region_id']);
        }
        if (!empty($request['room_id'])) {
            $builder = $builder->where('room_id', '=' , $request['room_id']);
        }
        return $builder->paginate();
    }

    /**
     * Find student.
     *
     * @param int $id
     * @return boolean
     * @author hangnt
     */
    public static function findStudent(int $id)
    {
        $student = Student::find($id);
        return $student;
    }

    /**
     * Show detail student.
     *
     * @param int $id
     * @return boolean
     * @author hangnt
     */
    public static function showStudent(int $id)
    {
        $student = Student::find($id);
        
        return $student;
    }

    /**
     * Create student.
     *
     * @param array $request
     * @return App\Models\Student $request
     * @author hangnt
     */
    public static function createStudent($request)
    {
        return Student::create($request);
    }

    /**
     * Update student.
     *
     * @param array $request
     * @param id int
     * @return boolean
     * @author hangnt
     */
    public static function updateStudent($request, int $id)
    {
        return Student::find($id)->update($request);
    }

    /**
     * Delete student.
     *
     * @param int $student
     * @return boolean
     * @author hangnt
     */
    public static function deleteStudent(Database\Student $student)
    {
        return $student->delete();
    }
}
