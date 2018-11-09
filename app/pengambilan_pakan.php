<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengambilan_pakan extends Model
{
    public $table = "pengambilan_pakan";
    public $primaryKey = "id_history";
    public $fillable = ['id_pengajuan', 'id_pakan', 'jumlah_pakan_diambil', 'harga_pengambilan'];
    public $timestamps = false;
    protected $keyType = 'string';

    public function join_pengajuan(){
        return $this->belongsTo(bahan_baku::class, 'id_pengajuan', 'id_pengajuan');
    }

    public function join_pakan(){
        return $this->belongsTo(bahan_baku::class, 'id_pakan', 'id_pakan');
    }
}
