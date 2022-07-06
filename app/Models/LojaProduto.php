<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use NumberFormatter;

class LojaProduto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'valor', 'loja_id', 'ativo'];
    protected $hidden = ['ativo', 'created_at', 'updated_at', 'deleted_at'];

    public function getValorAttribute()
    {
        $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($this->attributes['valor']/100, 'BRL');
    }

    public function loja()
    {
        return $this->belongsTo(Loja::class, 'loja_id');
    }
}
