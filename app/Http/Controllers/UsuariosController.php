<?php

namespace Mozika\Http\Controllers;

use Mozika\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtém todos os registros da tabela de classificação
        $usuarios = Usuario::orderBy('id', 'desc')->paginate(5);
        //Retorna a pagina com os dados da tabela
        return view('cadastros/usuarios/index', ['usuarios' => $usuarios]);
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];

        // Primeiro, vamos validar os dados do formulário
        $request->validate($rules);

        // Cria um novo registro
        $usuarios = new Usuario;
        $usuarios->name          = $request->name;
        $usuarios->email         = $request->email;
        $usuarios->password      = Hash::make($request->get('password'));

        // Salva os dados na tabela
        $usuarios->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('usuarios')
            ->with('status', 'Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Mozika\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Mozika\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Localiza o registro pelo seu ID
        $usuario = Usuario::findOrFail($id);
        // Obtém todos os registros da tabela de classificação
        $usuarios = Usuario::orderBy('id', 'desc')->paginate(6);
        // Chama a view com o formulário para edição do registro
        return view(
            'cadastros/usuarios/editar',
            [
                'usuario'   => $usuario,
                'usuarios' => $usuarios
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Mozika\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];

        // Primeiro, vamos validar os dados do formulário
        $request->validate($rules);

        // Cria um novo registro
        $usuario = Usuario::findOrFail($id);
        $usuarios->name          = $request->name;
        $usuarios->email         = $request->email;
        $usuarios->password      = Hash::make($request->get('password'));

        // Salva os dados na tabela
        $usuarios->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('usuarios')
            ->with('status', 'Usuário alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Mozika\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        //Exclui o registro
        $usuario->delete();

        return redirect()
            ->route('usuarios')
            ->with('status', 'Usuário apagado com sucesso!');
    }
}
