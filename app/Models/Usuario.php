<?php

namespace Mozika\Models;

use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{

    
    protected $fillable = [
        'USU_NOME','USU_LOGIN','USU_SENHA'
    ];

    protected $hidden = [
        'USU_SENHA'
    ];
}
