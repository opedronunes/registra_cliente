<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $clientes = Cliente::all();

        return Inertia::render('Listar', ['clientes' => $clientes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return Inertia::render('Criar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'rg' => 'required|unique:clientes',
            'email' => 'required|email',
            'telefone' => 'required|max:11',
            'endereco' => 'required',
            'imagem' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $file_name = time() . '.' . request()->imagem->getClientOriginalExtension();

        request()->imagem->move(public_path('images'), $file_name);

        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->rg = $request->rg;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->endereco = $request->endereco;
        $cliente->imagem = $request->imagem;

        $cliente->save();


        return Redirect::route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        
        return Inertia::render(
            'Editar', ['cliente' => $cliente]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Cliente $cliente)
    {
        if (Cliente::where('id', $id)->exists()) {
            
            $regras = [
                'nome' => 'required',
                'rg' => 'required|unique:clientes',
                'email' => 'required|email',
                'telefone' => 'required|max:11',
                'endereco' => 'required',
                'imagem' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            ];

            $request->validate($regras);

            $file_name = time() . '.' . request()->imagem->getClientOriginalExtension();

            request()->imagem->move(public_path('images'), $file_name);

            $cliente = new Cliente();
            $cliente->nome = $request->nome;
            $cliente->rg = $request->rg;
            $cliente->email = $request->email;
            $cliente->telefone = $request->telefone;
            $cliente->endereco = $request->endereco;
            $cliente->imagem = $request->imagem;

            $cliente->save();

            return Redirect::route('clientes.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return Redirect::route('clientes.index')->with('message', 'Cliente removido com suscesso!');
    }
}
