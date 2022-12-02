<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{

    use HasFactory;

    public $fillable = ['id','description' , 'base64Image'];

    protected $table = 'calendar';

}
