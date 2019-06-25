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
                            <h3>Cadastro de Fornecedores</h3>
                        </div>
                    </div>
                    <div class="card-body">
                    <form role="form" method="POST" action="{{ route('AtualizarFornecedor', $fornecedor->FOR_ID) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" type="text" name="FOR_NOME" value="{{ $fornecedor->FOR_NOME }}" required autofocus>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="FOR_EMAIL" value="{{ $fornecedor->FOR_EMAIL }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                    </div>
                                    <input class="form-control tel_ddd" placeholder="{{ __('Telefone') }}" type="text" name="FOR_TELEFONE" value="{{ $fornecedor->FOR_TELEFONE}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                    </div>
                                    <input class="form-control cpfCnpjMask" placeholder="{{ __('Documento') }}" type="text" name="FOR_DOCUMENTO" value="{{ $fornecedor->FOR_DOCUMENTO }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Endereço') }}" type="text" name="FOR_ENDERECO" value="{{ $fornecedor->FOR_ENDERECO }}">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark mt-4" style="background-color:#db5502" action="{{ route('AtualizarFornecedor', $fornecedor->FOR_ID) }}">{{ __('Salvar Alterações') }}</button>
                                <a class="btn btn-dark mt-4" style="background-color:#db5502" href="{{ route('fornecedores') }}">{{ __('Limpar Campos') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Lista de fornecedores -->
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card bg-gradient-secondary shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <h3>Lista de fornecedores cadastrados</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <tbody>
                                    @foreach($fornecedores as $fornecedor)
                                    <tr>
                                        <td>{{ $fornecedor->FOR_NOME }}</td>
                                        <td>{{ $fornecedor->FOR_EMAIL }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        

        @include('layouts.footers.auth')
    </div>

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush