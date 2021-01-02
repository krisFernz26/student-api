<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'middle_name', 
        'last_name', 
        'email', 
        'contact_no', 
        'birthdate', 
        'address', 
        'gender', 
        'civil_status', 
        'religion', 
        'nationality', 
        'place_of_birth' ];
}
