<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models as Database;

class Cource extends Model
{
    use SoftDeletes;

    protected $table = 'cources';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The get list name cource.
     *
     * @author hangnt
     */
    public static function getNameCource()
    {
        $cources = Database\Cource::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        return $cources;
    }
}
