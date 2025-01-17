<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    
    use HasFactory;

    protected $fillable = ['name', 'province_id'];

    // Define the inverse relationship
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function sector()
    {
        return $this->hasMany(Sector::class);
    }
    public function engineers()
    {
        return $this->hasMany(Engineer::class);
    }
}
