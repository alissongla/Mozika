<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Comprovante de venda</title>
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
        <h1>Comprovante de venda</h1>
        <table width="500">
            <thead>
                <tr>
                    <th>Cod.</th>
                    <th>Nome Instrumento</th>
                    <th>Valor</th>
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
            @foreach($vendas as $venda)
                <tr>
                    <td>{{ $venda->PRO_ID }}</td>
                    <td>{{ $venda->PRO_NOME }}</td>
                    <?php
                        $valor = number_format($venda->VEN_VALOR, 2, ',', '.');
                        echo "<td>$valor</td>";
                    ?>
                    <td>{{ $venda->CLI_NOME }}</td>
                    <td>{{ $venda->name }}</td>
                    <?php
                        $dtVenda = explode('-',$venda->VEN_DATA_VENDA);
                        echo "<td>$dtVenda[2]/$dtVenda[1]/$dtVenda[0]</td>";
                    ?>
                </tr>
            @endforeach    
            </tbody>
        </table>
    </body>
</html>