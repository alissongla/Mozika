<?php

namespace Mozika\Http\Controllers;

use Mozika\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
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
            'PRO_NOME' => 'required|string|max:255',
            'PRO_VALOR' => 'required|max:255',
            'PRO_QTDE_ESTOQUE' => 'required|max:255',
            'CAT_ID' => 'required|max:255',
            'FOR_ID' => 'required|max:255'
        ];

        // Primeiro, vamos validar os dados do formulário
        $request->validate($rules);

        // Cria um novo registro
        $produto = new Produto;
        $produto->PRO_NOME         = $request->PRO_NOME;
        $produto->PRO_VALOR        = $request->PRO_VALOR;
        $produto->PRO_QTDE_ESTOQUE = $request->PRO_QTDE_ESTOQUE;
        $produto->CAT_ID           = $request->CAT_ID;
        $produto->FOR_ID           = $request->FOR_ID;

        // Salva os dados na tabela
        $produto->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('produtos')
            ->with('status', 'Registro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mozika\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mozika\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mozika\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mozika\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
