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
                            <h3>Novo Pedido de Venda</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('pedidoVenda') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Quantidade de Produtos') }}" type="text" name="VEN_QTDE_VENDIDA">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
                                    </div>
                                    <input class="dinheiro form-control" placeholder="{{ __('Valor') }}" type="text" name="VEN_VALOR">
                                </div>
                            </div>
                            <div class="form-group">
                                    <select class="input-group input-group-alternative mb-3 select-nossa" name="PRO_ID">
                                        <option value="Null">Selecione o produto...</option>
                                        <?php
                                            $produtos = DB::Table('produtos')
                                                ->select("PRO_ID", "PRO_NOME")
                                                ->orderBy("PRO_NOME", "asc")
                                                ->get();
                                            
                                            foreach($produtos as $produto){
                                                echo "<option value=\"$produto->PRO_ID\">$produto->PRO_NOME</option>";
                                            }
                                        ?>
                                    </select>   
                            </div>
                            <div class="form-group">
                                    <select class="input-group input-group-alternative mb-3 select-nossa" name="CLI_ID">
                                        <option value="Null">Selecione o cliente...</option>
                                        <?php
                                            $clientes = DB::Table('clientes')
                                                ->select("CLI_ID", "CLI_NOME")
                                                ->orderBy("CLI_NOME", "asc")
                                                ->get();
                                            
                                            foreach($clientes as $cliente){
                                                echo "<option value=\"$cliente->CLI_ID\">$cliente->CLI_NOME</option>";
                                            }
                                        ?>
                                    </select>   
                            </div>
                            <div class="form-group">
                                    <select class="input-group input-group-alternative mb-3 select-nossa" name="id">
                                        <option value="Null">Selecione o vendedor...</option>
                                        <?php
                                            $usuarios = DB::Table('users')
                                                ->select("id", "name")
                                                ->orderBy("name", "asc")
                                                ->get();
                                            
                                            foreach($usuarios as $usuario){
                                                echo "<option value=\"$usuario->id\">$usuario->name</option>";
                                            }
                                        ?>
                                    </select>   
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark mt-4" style="background-color:#db5502" action="{{ route('pedidoVenda') }}">{{ __('Realizar Venda') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush