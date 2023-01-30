<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\Ordem_servico;

class ServicoController extends Controller
{   
    //GET ALL
    public function index(){

        $servicos = Servico::all();

        return view('servicos', ['servicos' => $servicos]);
    }

    
    //INSERTE
    public function insert(Request $request){

        //verifica se o nome ja existe 
        if(Servico::where('nome', $request->nome)->First()){
            return back()->with('error', 'Ja existe um serviço com o mesmo nome.');
        }


        if(!empty($request->all())){

            //REALIZA O CADASTRO DO SERVIÇO 
            $servicos = new Servico;
            $servicos->nome = $request->nome;
            $servicos->status = $request->status;
            
            //VERIFICA SE DEU CERTO
            if($servicos->save()){
                return back()->with('success', 'serviço criado com sucesso!');
            }else {
                return back()->with('error', 'Error ao criar serviço!');
            }
            
        }else{
            return back()->with('error', 'Error ao inserir serviço.');
        }
    }


    //UPDATE
    public function update(Request $request){

        if(!empty($request->all())){

            if($request->status == "desativo"){
                if (Ordem_servico::where('servico_id', $request->id)->First()) {
                    return back()->with('error', 'Serviço nao pode ser dasativado porque estar sendo ultilizado por um cliente');
                }
            }

            //REALIZA UPDATE
            $update = Servico::where('id', $request->id)
                            ->update([
                                'nome'=> $request->nome,
                                'status'=> $request->status
                            ]);
            
            //VERIFICA SE DEU CERTO
            if ($update) {
                return back()->with('success', "O serviço ($request->id) foi alterado com sucesso ");
            }else {
                return back()->with('error', "Error ao atualizar o serviço ($request->id)");
            }

        }else{
            return back()->with('error', 'Error ao inserir serviço.');
        }


    }


    //DELETE
    public function delete($id){

        if(Servico::where("id", $id)->delete()){
            return back()->with('success', "Deletou o serviço de [id = $id]");
        }else{
            return back()->with('error', "Error ao deletar serviço de [id = $id]");
        }
    }    
}
