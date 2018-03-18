<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usermodel extends Model
{
    //
    public $timestamps = false;
    protected $table = "users";
    protected $fillable = ['name', 'email', 'id', 'password'];
    protected $guarded = [];
}
