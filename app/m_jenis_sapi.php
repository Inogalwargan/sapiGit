<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class m_jenis_sapi extends Model
{
    protected $table = 'jenis_sapi';
    protected $primaryKey = 'id_jenis_sapi';
    protected $fillable = ['nama_jenis_sapi'];
    protected $keyType = 'string';

    public $timestamps = false;

}