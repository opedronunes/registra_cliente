<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllClientes()
    {
        $clientes = Cliente::get()->toJson(JSON_PRETTY_PRINT);
        return response($clientes, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCliente(Request $request)
    {
        $regras = [
            'nome' => 'required',
            'rg' => 'required|unique:clientes',
            'email' => 'required|email',
            'telefone' => 'required|max:11',
            'endereco' => 'required',
            'imagem' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ];
        $retornos = [];

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

        return response()->json([
            "message" => "Cliente cadastrado."
        ], 201);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function getCliente(Cliente $cliente, $id)
    {
        if (Cliente::where('id', $id)->exists()) {

            $cliente = Cliente::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($cliente, 200);

        }else {
            return response([
                "message" => "Cliente não encontrado."
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
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
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function updateCliente(Request $request, $id, Cliente $cliente)
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

            return response()->json([
                "message" => "dados atualizados"
            ], 200);

        }else {
            return response()->json([
                "message" => "Cliente não encontrado."
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function deleteCliente($id)
    {
        if (Cliente::where('id', $id)->exists()) {
            $cliente = Cliente::find($id);
            $cliente->delete();

            return response()->json([
                "message" => "Cliente deletado."
            ], 202);

        }else {
            return response()->json([
                "message" => "Cliente não encontrado."
            ], 404);
        }
    }
}
