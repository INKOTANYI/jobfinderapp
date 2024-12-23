<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Engineer extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'departement_id',
        'cv_path',
        'degree_path',
        'nida_path',
        'province_id',
        'district_id',
        'sector_id',
    ];

    /**
     * Relationship with the Departement model
     */
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    /**
     * Relationship with the Province model
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Relationship with the District model
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Relationship with the Sector model
     */
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
