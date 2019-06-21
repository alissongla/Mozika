@extends('layouts.app')

@section('content')
<div class="header bg-black pb-8 pt-5 pt-md-8">
</div>  
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card bg-gradient-secondary shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <h3>Cadastro de Produtos</h3>
                        </div>
                    </div>
                    <div class="card-body">
                    <form role="form" method="POST" action="{{ route('AtualizarProduto', $produto->PRO_ID) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" type="text" name="PRO_NOME" value="{{ $produto->PRO_NOME }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Valor') }}" type="text" name="PRO_VALOR" value="{{ $produto->PRO_VALOR }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Quantidade de Produtos') }}" type="text" name="PRO_QTDE_ESTOQUE" value="{{ $produto->PRO_QTDE_ESTOQUE }}">
                                </div>
                            </div>
                            <div class="form-group">
                                    <select class="input-group input-group-alternative mb-3 select-nossa" name="CAT_ID" value="{{ $produto->CAT_ID }}">
                                        <option value="Null">Selecione a categoria...</option>
                                        <?php
                                            $categoria = DB::Table('categorias')
                                                ->select("CAT_ID", "CAT_DESCRICAO")
                                                ->orderBy("CAT_DESCRICAO", "asc")
                                                ->get();
                                            
                                            foreach($categoria as $c){
                                                if($c->CAT_ID == $produto->CAT_ID){
                                                    echo "<option value=\"$c->CAT_ID\" selected>$c->CAT_DESCRICAO</option>";
                                                }else{
                                                    echo "<option value=$c->CAT_ID>$c->CAT_DESCRICAO</option>";
                                                }
                                                
                                            }
                                        ?>
                                    </select>   
                            </div>
                            <div class="form-group">
                                    <select class="input-group input-group-alternative mb-3 select-nossa" name="FOR_ID" value="{{ $produto->FOR_ID }}">
                                        <option value="Null">Selecione o fornecedor...</option>
                                        <?php
                                            $fornecedor = DB::Table('fornecedores')
                                                ->select("FOR_ID", "FOR_NOME")
                                                ->orderBy("FOR_NOME", "asc")
                                                ->get();
                                            
                                            foreach($fornecedor as $f){
                                                if($f->FOR_ID == $produto->FOR_ID){
                                                    echo "<option value=\"$f->FOR_ID\" selected>$f->FOR_NOME</option>";
                                                }else{
                                                    echo "<option value=$f->FOR_ID>$f->FOR_NOME</option>";
                                                }
                                                
                                            }
                                        ?>
                                    </select>   
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4" action="{{ route('AtualizarProduto', $produto->PRO_ID) }}">{{ __('Salvar Alterações') }}</button>
                                <a class="btn btn-primary mt-4" href="{{ route('produtos') }}">{{ __('Limpar Campos') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card bg-gradient-secondary shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <h3>Lista de Produtos cadastrados</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($produtos as $produto)
                            <tr>
                                <td>{{ $produto->PRO_NOME }}</td>
                            </tr>
                        @endforeach
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