<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sector extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'district_id'];
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function engineers()
    {
        return $this->hasMany(Engineer::class);
    }

}
