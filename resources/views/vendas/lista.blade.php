@extends('layouts.app')

@section('content')
<div class="header bg-black pb-8 pt-5 pt-md-8">
</div>  
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-secondary shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <h3>Listagem de Vendas</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Instrumento</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Vendedor</th>
                                    <th scope="col">Data</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach($vendas as $venda)
                                    <tr>
                                    <?php
                                        $produto = DB::Table('produtos')
                                            ->select("PRO_NOME","PRO_ID")
                                            ->where("PRO_ID",$venda->PRO_ID)
                                            ->get();
                                        foreach($produto as $ln){
                                            echo "<td>$ln->PRO_NOME</td>";
                                        }
                                    ?>
                                    <td>{{$venda->VEN_VALOR}}</td>
                                    <td>{{$venda->VEN_QTDE_VENDIDA}}</td>
                                    <?php
                                        $cliente = DB::Table('clientes')
                                            ->select("CLI_NOME","CLI_ID")
                                            ->where("CLI_ID",$venda->CLI_ID)
                                            ->get();
                                        foreach($cliente as $ln){
                                            echo "<td>$ln->CLI_NOME</td>";
                                        }
                                    ?>
                                    <?php
                                        $usuario = DB::Table('users')
                                            ->select("name","id")
                                            ->where("id",$venda->USU_ID)
                                            ->get();
                                        foreach($usuario as $ln){
                                            echo "<td>$ln->name</td>";
                                        }
                                    ?>
                                    <?php
                                        $dtVenda = explode('-',$venda->VEN_DATA_VENDA);
                                        echo "<td>$dtVenda[2]/$dtVenda[1]/$dtVenda[0]</td>"
                                    ?>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @include('pagination.default', ['paginator' => $vendas])
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ secure_asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ secure_asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ secure_asset('argon') }}/js/jquery.mask.js"></script>
    <script src="{{ secure_asset('argon') }}/js/funcoes.js"></script>
@endpush