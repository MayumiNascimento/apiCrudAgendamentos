<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Http\Controllers\Controller;

class ControllerAgendamento extends Controller
{


    public function get(){
        return Agendamento::all();
    }

    public function getId($id){
        return  $agendamentos = Agendamento::find($id);
        
    }

    public function getDia($dias){

        if($dias === ''){
            return Agendamento::all();
        }
        $arrayDias = explode(',',$dias);
        $agendamentos = Agendamento::whereIn('dia', $arrayDias)->get();
        return response()->json($agendamentos);
    }

    public function post(Request $request){
        $servico = $request->input("servico");
        $cliente = $request->input("cliente");
        $hinicial = $request->input("hinicial");
        $hfinal = $request->input("hfinal");
        $dia = $request->input("dia");
        $valor = $request->input("valor");
        $descricao = $request->input("descricao");
        $isConcluido = $request->input("isConcluido");

        $agendamentos = new Agendamento();
        $agendamentos->servico = $servico;
        $agendamentos->cliente = $cliente;
        $agendamentos->hinicial = $hinicial;
        $agendamentos->hfinal = $hfinal;
        $agendamentos->dia = $dia;
        $agendamentos->valor = $valor;
        $agendamentos->descricao = $descricao;
        $agendamentos->isConcluido = $isConcluido;
        $agendamentos->save();
    }

    public function update(Request $request, $id){
        $agendamentos = Agendamento::find($id);

        $agendamentos->servico = $request->input("servico");
        $agendamentos->cliente = $request->input("cliente");
        $agendamentos->descricao = $request->input("descricao");
        $agendamentos->valor = $request->input("valor");
        $agendamentos->hinicial = $request->input("hinicial");
        $agendamentos->hfinal = $request->input("hfinal");
        $agendamentos->dia = $request->input("dia");
        $agendamentos->isConcluido = $request->input("isConcluido");
        $agendamentos->save();

    }

    public function deletar($id){
        $agendamentos = Agendamento::find($id);
        $agendamentos->delete();
    }
}
