<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Pet extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'date_of_birth', 'date_of_death'];

    /*
    protected $casts = [
        'date_of_birth' => 'datetime:d/m/Y',
        'date_of_death' => 'datetime:d/m/Y',
    ];
    */

    protected $appends = ['age'];

    public function getAgeAttribute()
    {
        $to_date = $this->date_of_death == null ? Carbon::now() : $this->date_of_death;
        return $to_date->diffInYears($this->date_of_birth);
    }

    protected $fillable = [
        'species_id',
        'clinic_id',
        'owner_id',
        'name',
        'sex',
        'date_of_birth',
        'date_of_death',
        'description',
        'color',
        'microchip',
        'microchip_location',
        'tatuatge',
        'tatuatge_location',
    ];




    

    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }

    public function problems()
    {
        return $this->hasMany('App\Problem');
    }

    // Note: renamed
    public function species()
    {
        return $this->belongsTo('App\Species');
    }

    protected static function boot() {
        parent::boot();

        self::deleting(function (Pet $pet) {

            foreach ($pet->problems as $problem)
            {
                $problem->delete();
            }
        });
    }
}
