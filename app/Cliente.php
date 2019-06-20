<?php

namespace Mozika;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['CLI_NOME','CLI_TELEFONE','CLI_EMAIL', 'CLI_DOCUMENTO'];
    protected $primaryKey = 'CLI_ID';
    protected $table='clientes';
    public $timestamps = false;
}
