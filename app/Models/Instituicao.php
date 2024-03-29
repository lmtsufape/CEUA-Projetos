<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function unidades(){
        return $this->hasMany('App\Models\Unidade');
    }

    public function colaboradores(){
        return $this->hasMany('App\Models\Colaborador');
    }

    public static $rules = [
        'nome' => 'required',
    ];

    public static $messages = [
        '*.required'  => 'O :attribute é obrigatório',
    ];

}
