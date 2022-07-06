<?php

namespace App\Mail\LojaProduto;

use App\Models\Loja;
use App\Models\LojaProduto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LojaProdutoStatusMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $produto, $loja;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(LojaProduto $produto, Loja $loja)
    {
        $this->produto = $produto;
        $this->loja = $loja;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Foi realizado uma mudança na sua loja!')
        ->view('mail.loja-produto.status');
    }
}
