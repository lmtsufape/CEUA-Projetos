<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'extracao',
        'relaxante',
        'estresse',
        'jejum',
        'analgesico',
        'anestesico',
        'imobilizacao',
        'inoculacao_substancia',
        'restricao_hidrica',
        'planejamento_id'
    ];

    public function planejamento()
    {
        return $this->belongsTo('App\Models\Planejamento');
    }

    public function avaliacao_individual(){
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }

}
