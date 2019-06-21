<?php

namespace Mozika;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['VEN_VALOR','VEN_DATA_VENDA','VEN_QTDE_VENDIDA','PRO_ID','CLI_ID','USU_ID'];
    protected $primaryKey = 'VEN_ID';
    protected $table='vendas';
    public $timestamps = false;
}
