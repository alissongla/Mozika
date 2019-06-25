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
                            <h3>Listagem de Estoque</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
                                <?php
                                    $fornecedor = DB::Table('fornecedores')
                                        ->select("FOR_NOME")
                                        ->where("FOR_ID",$produto->FOR_ID)
                                        ->get();
                                    foreach($fornecedor as $ln){
                                        echo "<td>$ln->FOR_NOME</td>";
                                    }
                                ?>
                                <td>{{ $produto->PRO_QTDE_ESTOQUE }}</td>
                                
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        @include('pagination.default', ['paginator' => $produtos])
                    </div>
                    <div class="text-center">
                        <a class="btn btn-primary mt-4" href="{{ route('RelatorioEstoque') }}">{{ __('Gerar Relatório') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('argon') }}/js/jquery.mask.js"></script>
    <script src="{{ asset('argon') }}/js/funcoes.js"></script>
@endpush