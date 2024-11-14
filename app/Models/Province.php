<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    
    use HasFactory;

    protected $fillable = ['name'];

    public function district()
    {
        return $this->hasMany(District::class);
    }

    public function engineers()
    {
        return $this->hasMany(Engineer::class);
    }

}
