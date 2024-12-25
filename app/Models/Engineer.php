<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Engineer extends Model
{
    use HasFactory;

    // Define the fillable fields for mass assignment
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
     * Relationship with the Departement model.
     */
    public function department()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }

    /**
     * Relationship with the Province model.
     */
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    /**
     * Relationship with the District model.
     */
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    /**
     * Relationship with the Sector model.
     */
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
