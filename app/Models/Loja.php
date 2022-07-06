<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loja extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'email'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function produtos()
    {
        return $this->hasMany(LojaProduto::class, 'loja_id');
    }
}
