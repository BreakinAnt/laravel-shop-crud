<?php

namespace App\Repositories;

use App\Models\LojaProduto;

class LojaProdutoRepository
{
    private $model;

    public function __construct(LojaProduto $model)
    {
        $this->model = $model;
    }

    public function whereAtivo()
    {
        return $this->model->where('ativo', 1);
    }

    public function all()
    {
        return $this->model->get();
    }
}