<?php

namespace Mozika;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['CAT_DESCRICAO'];
    protected $primaryKey = 'CAT_ID';
    protected $table='categorias';
    public $timestamps = false;
}
