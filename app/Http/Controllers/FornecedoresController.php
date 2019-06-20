<?php

namespace Mozika\Http\Controllers;

use Mozika\Fornecedor;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fornecedor.create');
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
            'FOR_NOME' => 'required|string|max:255',
            'FOR_EMAIL' => 'required|string|email|max:255|unique:fornecedores',
        ];

        // Primeiro, vamos validar os dados do formulário
        $request->validate($rules);

        // Cria um novo registro
        $fornecedor = new Fornecedor;
        $fornecedor->FOR_NOME           = $request->FOR_NOME;
        $fornecedor->FOR_TELEFONE       = $request->FOR_TELEFONE;
        $fornecedor->FOR_EMAIL          = $request->FOR_EMAIL;
        $fornecedor->FOR_DOCUMENTO      = $request->FOR_DOCUMENTO;
        $fornecedor->FOR_ENDERECO       = $request->FOR_ENDERECO;

        // Salva os dados na tabela
        $fornecedor->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('fornecedores')
            ->with('status', 'Registro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mozika\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mozika\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mozika\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mozika\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedor $fornecedor)
    {
        //
    }
}
