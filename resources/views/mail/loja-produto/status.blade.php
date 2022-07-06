<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Sua loja: {{ $loja->nome }}</p>
    <p>Produto:</p>
    <ul>
        <li>Nome: {{ $produto->nome }}</li>
        <li>Preço: {{ $produto->valor }}</li>
        <li>Ativo: {{ $produto->ativo }}</li>
    </ul>
</body>
</html>