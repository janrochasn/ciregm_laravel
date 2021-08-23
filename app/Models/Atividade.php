<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use HasFactory;

    protected $table = 'ciregm_atividades';
    protected $fillable = ['id_usuario', 'tipo_carimbo', 'data_hora', 'nm_ocorrencia', 'carimbo'];
    public $timestamps = false;
}
