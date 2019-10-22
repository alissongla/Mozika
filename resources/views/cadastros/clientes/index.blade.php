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
                            <h3>Cadastro de Clientes</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="{{ route('CadastroCliente') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" type="text" name="CLI_NOME" value="{{ old('name') }}" required autofocus>
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
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="CLI_EMAIL" required>
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
                                    <input class="form-control tel_ddd" placeholder="{{ __('Telefone') }}" type="text" name="CLI_TELEFONE">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                    </div>
                                    <input class="form-control cpfCnpjMask" placeholder="{{ __('Documento') }}" type="text" name="CLI_DOCUMENTO">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark mt-4" style="background-color:#db5502" action="{{ route('CadastroCliente') }}">{{ __('Cadastrar Clientes') }}</button>
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
                                    @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->CLI_NOME }}</td>
                                        <td class='text-right' style="width: 140px;">
                                            <a class='btn btn-warning btn-sm'
                                                href='{{ route("EditarCliente", $cliente->CLI_ID) }}' role='button' style="margin-right: -40px;">
                                                <i class='ni ni-settings'></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('ApagarCliente', $cliente->CLI_ID) }}"
                                                style="">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <span class="form-group">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class='fa fa-trash'></i>
                                                    </button>
                                                </span>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @include('pagination.default', ['paginator' => $clientes])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        

        @include('layouts.footers.auth')
    </div>

@endsection

@push('js')
    <script src="{{ secure_asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ secure_asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ secure_asset('argon') }}/js/jquery.mask.js"></script>
    <script src="{{ secure_asset('argon') }}/js/funcoes.js"></script>
@endpush