<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LojaProduto\LojaProdutoDeleteRequest;
use App\Http\Requests\LojaProduto\LojaProdutoStoreRequest;
use App\Http\Requests\LojaProduto\LojaProdutoUpdateRequest;
use App\Mail\LojaProduto\LojaProdutoStatusMail;
use App\Models\LojaProduto;
use App\Repositories\LojaProdutoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LojaProdutoApiController extends Controller
{
    public function index(LojaProdutoRepository $produto, Request $req)
    {
        if($req->ativo == 1){
            return $produto->whereAtivo()->get();
        }
        return $produto->all();
    }

    public function show(LojaProduto $produto)
    {
        return $produto;
    }

    public function store(LojaProdutoStoreRequest $req)
    {
        $produto = LojaProduto::create($req->all());
        $loja = $produto->loja;

        Mail::to($loja->email)
        ->send(new LojaProdutoStatusMail($produto, $loja));

        return $produto;
    }

    public function update(LojaProdutoUpdateRequest $req)
    {
        $produto = LojaProduto::find($req->id);
        $produto->update($req->all());
        $loja = $produto->loja;

        Mail::to($loja->email)
        ->send(new LojaProdutoStatusMail($produto, $loja));

        return $produto;
    }

    public function delete(LojaProdutoDeleteRequest $req)
    {
        $produto = LojaProduto::find($req->id)->delete();

        return $produto;
    }
}
