<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class praodutos_trabalho extends Model
{
    use HasFactory;
    protected $table= 'produtos';
    protected $guarded = ['id'];
    protected $fillable = [
        	'nome',	'descricao', 'preco', 'user_id',
    ];
}
