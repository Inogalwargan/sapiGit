<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class m_pengajuan extends Model
{
	protected $table = 'pengajuan';
	protected $primaryKey = 'id_pengajuan';
	protected $fillable = ['id_pengajuan', 'nama_peternak', 'alamat', 'no_kk', 'jumlah_sapi','no_hp','foto_ktp'];
	protected $keyType = 'string';

	public $timestamps = false;
}