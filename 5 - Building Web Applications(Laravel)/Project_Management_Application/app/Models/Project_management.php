<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_management extends Model
{
    
    use HasFactory;

    protected $table = 'project_management';


    protected $fillable = [
        'name',
        'description',
        'status',
        'person',
        'begin',
        'end',
    ];



}
