<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{   
    //GET ALL
    public function index(){

        $clientes = Cliente::all();

        return view('clientes', ['clientes' => $clientes]);
    }

    //INSERTE
    public function insert(Request $request){

        if(!empty($request->all())){

            //VALIDA EMAIL
            if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
                return back()->with('error', 'Email inválido');
            }

            //VERIFICA SE O EMAIL JA EXISTE
            if(Cliente::where('email', $request->email)->First()){
                return back()->with('error', 'Ja existe um cliente com o mesmo email.');
            }

            //VERIFICA SE O NOME JA EXISTE
            if(Cliente::where('nome', $request->nome)->First()){
                return back()->with('error', 'Ja existe um cliente com o mesmo nome.');
            }

            //REALIZA O CADASTRO DO CLIENTE 
            $cliente = new Cliente;
            $cliente->nome = $request->nome;
            $cliente->email = $request->email;
            $cliente->rua = $request->rua;
            $cliente->numero = $request->numero;
            $cliente->complemento = $request->complemento;
            $cliente->bairro = $request->bairro;
            $cliente->cidade = $request->cidade;
            $cliente->estado = $request->estado;
            
            //VERIFICA SE DEU CERTO
            if($cliente->save()){
                return back()->with('success', 'cliente criado com sucesso!');
            }else {
                return back()->with('error', 'Error ao criar cliente!');
            }
            
        }else{
            return back()->with('error', 'Error ao inserir cliente.');
        }
    }


    //UPDATE
    public function update(Request $request){

        if(!empty($request->all())){

            //VALIDA EMAIL
            if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
                return back()->with('error', 'Email inválido');
            }

            //REALIZA UPDATE
            $update = Cliente::where('id', $request->id)
                            ->update([
                                'nome'=> $request->nome,
                                'email'=> $request->email,
                                'rua'=> $request->rua,
                                'numero'=> $request->numero,
                                'complemento'=> $request->complemento,
                                'bairro'=> $request->bairro,
                                'cidade'=> $request->cidade,
                                'estado'=> $request->estado
                            ]);
            
            //VERIFICA SE DEU CERTO
            if ($update) {
                return back()->with('success', "O Cliente ($request->id) foi alterado com sucesso ");
            }else {
                return back()->with('error', "Error ao atualizar o Cliente ($request->id)");
            }

        }else{
            return back()->with('error', 'Error ao inserir cliente.');
        }


    }


    //DELETE
    public function delete($id){

        if(Cliente::where("id", $id)->delete()){
            return back()->with('success', "Deletou o Cliente de [id = $id]");
        }else{
            return back()->with('error', "Error ao deletar Cliente de [id = $id]");
        }

    }
}
