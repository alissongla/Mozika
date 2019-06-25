<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Estoque</title>
        <style>
            body{font-family: Arial, Helvetica, sans-serif;}
            table {
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
}
        </style>
    </head>
    <body>
        <h1>Relatório de estoque</h1>
        <table width="500">
        <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th>Cod. Instrumento</th>
                    <th>Nome Instrumento</th>
                    <th>Nome Fornecedor</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                <tr>
                <td>{{$produto->PRO_ID}}</td>
                <td>{{$produto->PRO_NOME}}</td>
                <td>{{$produto->FOR_NOME}}</td>
                <td>{{$produto->PRO_QTDE_ESTOQUE}}</td>
                
                @endforeach
            </tbody>
        </table>
    </body>
</html>