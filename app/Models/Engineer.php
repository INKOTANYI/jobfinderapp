<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Engineer extends Model
{
  
   
    use HasFactory;  

    protected $fillable = ['fname','lname','email','phone','departement_id','cv_path','degree_path','nida_path','province_id', 'district_id','sector_id'];
}
