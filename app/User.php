<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = [
         'nama', 'no_telp', 'jabatan'
    ];
    public $timestamps = false;
}
