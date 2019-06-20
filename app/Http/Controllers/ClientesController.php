<?php

namespace Mozika\Http\Controllers;

use Mozika\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the CLIm CLI creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'CLI_NOME' => 'required|string|max:255',
            'CLI_EMAIL' => 'required|string|email|max:255|unique:clientes',
        ];
        
                // Primeiro, vamos validar os dados do formulário
                $request->validate($rules);

                // Cria um novo registro
                $clientes = new Cliente;
                $clientes->CLI_NOME           = $request->CLI_NOME;
                $clientes->CLI_TELEFONE       = $request->CLI_TELEFONE;
                $clientes->CLI_EMAIL          = $request->CLI_EMAIL;
                $clientes->CLI_DOCUMENTO      = $request->CLI_DOCUMENTO;
        
                // Salva os dados na tabela
                $clientes->save();
        
                // Retorna para view index com uma flash message
                return redirect()
                    ->route('clientes')
                    ->with('status', 'Registro criado com sucesso!');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mozika\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the CLIm CLI editing the specified resource.
     *
     * @param  \Mozika\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mozika\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mozika\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
