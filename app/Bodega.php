<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bodegas';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cod_articulo', 'desc_articulo', 'cantidad', 'cod_proveedor'];

}
