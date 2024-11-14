<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function engineers()
    {
        return $this->hasMany(Engineer::class);
    }
    //
}
