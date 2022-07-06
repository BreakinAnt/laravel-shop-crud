<?php

namespace App\Repositories;

use App\Models\Loja;

class LojaRepository
{
    private $model;

    public function __construct(Loja $model)
    {
        $this->model = $model;
    }

    public function withProdutos()
    {
        return $this->model->with('produtos');
    }
}