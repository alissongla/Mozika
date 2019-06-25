<?php

namespace Mozika\Http\Controllers;

use Mozika\Estoque;
use Mozika\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstoqueController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gerarRelatorio()
    {
        $produtos = DB::Table('produtos')
        ->join('fornecedores', 'produtos.FOR_ID', '=', 'fornecedores.FOR_ID')
        ->select("*")
        ->get();   

        return \PDF::loadView('estoque/relatorio', compact('produtos'))
                    // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                    ->stream('relEstoque.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mozika\Estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function show(Estoque $estoque)
    {
        // Obtém todos os registros da tabela de classificação
        $produtos = Produto::orderBy('PRO_ID', 'asc')->paginate(5);
        // Chama a view com o formulário para edição do registro
        return view(
            'estoque/lista',
            [
                'produtos' => $produtos
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mozika\Estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function edit(Estoque $estoque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mozika\Estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estoque $estoque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mozika\Estoque  $estoque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estoque $estoque)
    {
        //
    }
}
