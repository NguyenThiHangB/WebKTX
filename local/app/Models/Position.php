<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models as Database;

class Position extends Model
{
    use SoftDeletes;

    protected $table = 'positions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The get list name position.
     *
     * @author hangnt
     */
    public static function getPosition()
    {
        $positions = Database\Position::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        return $positions;
    }

    /**
     * The get list position.
     *
     * @author hangnt
     */
    public static function getListPosition()
    {
        $builder = Position::get();

        if (!empty($request['name'])) {
            $builder = $builder->where('name', 'like', '%' . $request['name']. '%');
        }
        return $builder;
    }

    /**
     * Find position.
     *
     * @param int $id
     * @return boolean
     * @author hangnt
     */
    public static function findPosition(int $id)
    {
        $position = Position::find($id);
        return $position;
    }

    /**
     * Create position.
     *
     * @param array $request
     * @return App\Models\Position $request
     * @author hangnt
     */
    public static function createPosition($request)
    {
        return Position::create($request);
    }

    /**
     * Update Position.
     *
     * @param array $request
     * @param id int
     * @return boolean
     * @author hangnt
     */
    public static function updatePosition($request, int $id)
    {
        return Position::find($id)->update($request);
    }

    /**
     * Delete Position.
     *
     * @param int $position
     * @return boolean
     * @author hangnt
     */
    public static function deletePosition(Database\Position $position)
    {
        return $position->delete();
    }
}
