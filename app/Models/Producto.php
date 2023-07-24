<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'nombre_producto',
        'descripcion_producto',
        'cantidad_producto',
        'precio_unitario',
        'iva',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }
    
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

}
