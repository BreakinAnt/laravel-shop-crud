<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Loja\LojaDeleteRequest;
use App\Http\Requests\Loja\LojaStoreRequest;
use App\Http\Requests\Loja\LojaUpdateRequest;
use App\Mail\Loja\LojaStatusMail;
use App\Models\Loja;
use App\Repositories\LojaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LojaApiController extends Controller
{
    public function index(LojaRepository $loja)
    {
        return $loja->withProdutos()->get();
    }

    public function show(Loja $loja)
    {
        $loja = Loja::with('produtos')->find($loja->id);
        return $loja;
    }

    public function store(LojaStoreRequest $req)
    {
        $loja = Loja::create($req->all());

        return $loja;
    }

    public function update(LojaUpdateRequest $req)
    {
        $loja = Loja::find($req->id);
        $loja->update($req->all());

        return $loja;
    }

    public function delete(LojaDeleteRequest $req)
    {
        $loja = Loja::find($req->id)->delete();

        return $loja;
    }
}
