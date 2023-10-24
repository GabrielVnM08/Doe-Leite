<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doacao;
use Session;
use File;

class DoacaoController extends Controller
{
    public function todas_doacoes()
    {
        $todas_doacoes = Doacao::latest()->simplePaginate(5);
        return view('doacao.todas_doacoes',compact('todas_doacoes'));
    }

    public function adicionar_doacao()
    {
        return view('doacao.adicionar_doacao');
    }

    public function salvar_doacao(Request $request)
    {
        $request->validate([
            
            'data_doacao'=> 'required',
            'nome_doadora'=> 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'quantidade'=> 'required|integer|min:1|between:1,10000',
        ]);

        Doacao::create([
            'data_doacao'=>$request->data_doacao,
            'nome_doadora'=>$request->nome_doadora,
            'quantidade'=>$request->quantidade,
            
        ]);
        Session::flash('message', 'Nova Doação realizada com sucesso!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }

    public function editar_doacao($id)
    {
        $doacao = Doacao::findOrFail($id);
        return view('doacao.editar_doacao',compact('doacao'));
    }

    public function atualizar_doacao(Request $request,$id)
    {
        $doacao = Doacao::findOrFail($id);
        $request->validate([
            'data_doacao'=> 'required',
            'nome_doadora'=> 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'quantidade'=> 'required|integer|min:1|between:1,10000',
        ]);

        Doacao::where('id',$id)->update([
            'data_doacao'=>$request->data_doacao,
            'nome_doadora'=>$request->nome_doadora,
            'quantidade'=>$request->quantidade,
        ]);
        Session::flash('message', 'Doação atualizada com sucesso!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }

    public function deletar_doacao($id)
    {
        $doacao = Doacao::find($id);
        $doacao->delete();
        Session::flash('message', 'Doação deletada com sucesso!'); 
        Session::flash('alert-class', 'alert-danger'); 
        return redirect()->back();
    }
}
