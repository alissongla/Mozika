<?php

namespace Mozika;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = ['FOR_NOME','FOR_TELEFONE','FOR_EMAIL', 'FOR_DOCUMENTO', 'FOR_ENDERECO'];
    protected $primaryKey = 'FOR_ID';
    protected $table='fornecedores';
}
