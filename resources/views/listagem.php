<html>
<head>
    <link href="/css/app.css" rel="stylesheet">
    <title>Listagem de Produtos</title>
</head>
<body>
<div class="container">
<h1>Listagem de Produtos</h1>
<table class="table table-bordered table-striped table-hover">
    <?php foreach($produtos as $p): ?>
    <tr>
        <td><?= $p->nome ?></td>
        <td><?= $p->valor ?></td>
        <td><?= $p->descricao ?></td>
        <td><?= $p->quantidade ?></td>
        <td><a href="/produtos/mostra"><span class="glyphicon glyphicon-search"></span></a></td>
    </tr>
    <?php endforeach ?>
</table>
</div>
</body>
</html>