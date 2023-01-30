<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordem_servico;
use App\Models\Cliente;
use App\Models\Servico;
use Illuminate\Support\Facades\DB;

class Ordem_servicoController extends Controller
{
   //GET ALL
   public function index(){

        //get solicitação de servicos
        $ordens = DB::table('ordem_servicos as ord')
                    ->join('clientes as cl', 'cl.id', '=', 'ord.cliente_id')
                    ->join('servicos as sr', 'sr.id', '=', 'ord.servico_id')
                    ->select('ord.id as ordem_id', 'cl.nome as cliente', 'ord.data_abertura as data_abertura', 'sr.nome as servico')
                    ->get();
        
        //Formata data para view
        $data_formatada = [];
        foreach ($ordens as $key => $datas) {
            $data_formatada = (new \DateTimeImmutable($datas->data_abertura))->format('d/m/Y');
        }

        //get clientes
        $clientes = Cliente::all();

        //get serviços que estão ativos
        $servicos = Servico::where('status', '=', 'ativo')->get();

        
        return view('home', [
            'ordens' => $ordens, 
            'data_formatada' => $data_formatada,
            'clientes' => $clientes,
            'servicos' => $servicos
        ]);
    }

    public function inserir(Request $request){

        if(!empty($request)){

            $verify = DB::table('ordem_servicos')
                        ->where('cliente_id', $request->cliente)
                        ->where('servico_id', $request->servico)
                        ->where('data_abertura', $request->data_abertura)
                        ->First();

            $cliente = Cliente::where('id', $request->cliente)->First();
            $servico = Servico::where('id', $request->servico)->First();

            if($verify){
               return back()->with('error', "O cliente $cliente->nome ja solicitou o serviço de $servico->nome para a data $request->data_abertura."); 
            }

            $ordem = new Ordem_servico;
            $ordem->cliente_id = $request->cliente;
            $ordem->servico_id = $request->servico;
            $ordem->data_abertura = $request->data_abertura;
            
            if($ordem->save()){
                return back()->with('success', 'Serviço solicitado com sucesso!');
            }else {
                return back()->with('error', 'Error ao solicitar serviço!');
            }

        }

    }


    //DELETE
    public function delete($id){

        if(Ordem_servico::where("id", $id)->delete()){
            return back()->with('success', "Deletou a socilicitação de serviço [id = $id]");
        }else{
            return back()->with('error', "Error ao deletar serviço [id = $id]");
        }
    }   

}
