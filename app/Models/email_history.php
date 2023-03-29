<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class email_history extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "email_history";
    protected $guarded = []; 
}
