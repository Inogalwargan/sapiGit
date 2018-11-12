<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class m_sapi extends Model
{
	protected $table = 'sapi';
	protected $primaryKey = 'id_sapi';
	protected $fillable = ['berat_awal', 'berat_saat_ini', 'id_pengajuan', 'jenis_kelamin', 'jenis_sapi'];

	protected $keyType = 'string';

	public $timestamps = false;

}