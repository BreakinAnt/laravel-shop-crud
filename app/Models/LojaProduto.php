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

    public function getValorAttribute()
    {
        $formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
        return 'R$ ' . $formatter->formatCurrency($this->valor/100, 'BRL');
    }

    public function loja()
    {
        return $this->belongsTo(Loja::class, 'loja_id');
    }
}
