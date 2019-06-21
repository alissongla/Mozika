<?php

namespace Mozika\Http\Controllers;

use Mozika\Venda;
use Mozika\Produto;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('vendas/index');
    }
    public function nota(Request $request)
    {
        return view('vendas/comprovante');
    }

    /**
     * Show the form for creating a new resource.
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
            'VEN_VALOR' => 'required',
            'PRO_ID'    => 'required'
        ];  
        // Primeiro, vamos validar os dados do formulário
        $request->validate($rules);

        // Cria um novo registro
        $venda = new Venda;
        $venda->VEN_VALOR           = $request->VEN_VALOR;
        $venda->VEN_QTDE_VENDIDA    = $request->VEN_QTDE_VENDIDA;
        $venda->PRO_ID              = $request->PRO_ID;
        $venda->CLI_ID              = $request->CLI_ID;
        $venda->USU_ID              = $request->id;
        $venda->VEN_DATA_VENDA      = date('Y-m-d');
        $venda->VEN_HORA_VENDA      = date('h:i:s');

        // Salva os dados na tabela
        $venda->save();

        //update na tabela produtos
        $produto = Produto::findOrFail($request->PRO_ID);
        $produto->PRO_QTDE_ESTOQUE = $produto->PRO_QTDE_ESTOQUE - $request->VEN_QTDE_VENDIDA;
        $produto->save();
        // Retorna para view index com uma flash message
        return redirect()
            ->route('vendas')
            ->with('status', 'Venda criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mozika\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mozika\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venda = Venda::findOrFail($id);
        // Obtém todos os registros da tabela de classificação
        $vendas = Venda::orderBy('CLI_ID', 'desc')->paginate(10);
        // Chama a view com o formulário para edição do registro
        return view(
            'cadastros/vendas/editar',
            [
                'venda'   => $venda,
                'vendas' => $vendas
            ]
        );
    }

    public function lista(){
        // Obtém todos os registros da tabela de classificação
        $vendas = Venda::orderBy('CLI_ID', 'desc')->paginate(6);
        // Chama a view com o formulário para edição do registro
        return view(
            'vendas/lista',
            [
                'vendas' => $vendas
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mozika\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'VEN_VALOR' => 'required|double',
            'PRO_ID'    => 'required'
        ];  
        // Primeiro, vamos validar os dados do formulário
        $request->validate($rules);

        // Cria um novo registro
        $venda = Venda::findOrFail($id);
        $venda->VEN_VALOR           = $request->VEN_VALOR;
        $venda->VEN_QTDE_VENDIDA    = $request->VEN_QTDE_VENDIDA;
        $venda->PRO_ID              = $request->PRO_ID;
        $venda->CLI_ID              = $request->CLI_ID;
        $venda->USU_ID              = $request->id;
        $venda->VEN_DATA_VENDA      = date('Y-m-d');
        $venda->VEN_HORA_VENDA      = date('h:i:s');

        // Salva os dados na tabela
        $venda->save();

        //update na tabela produtos
        $produto = Produto::findOrFail($request->PRO_ID);
        $produto->PRO_QTDE_ESTOQUE = $produto->PRO_QTDE_ESTOQUE - $request->VEN_QTDE_VENDIDA;
        $produto->save();
        
        // Retorna para view index com uma flash message
        return redirect()
            ->route('vendas')
            ->with('status', 'Venda alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mozika\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda)
    {
        $venda = Venda::findOrFail($id);
        //update na tabela produtos
        $produto = Produto::findOrFail($venda->PRO_ID);
        $produto->PRO_QTDE_ESTOQUE = $produto->PRO_QTDE_ESTOQUE + $venda->VEN_QTDE_VENDIDA;
        $produto->save();
        //Exclui o registro
        $venda->delete();

        return redirect()
            ->route('vendas')
            ->with('status', 'Venda apagada com sucesso!');
    }
}
