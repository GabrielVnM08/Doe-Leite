<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ponto_coleta;
use Session;
use File;

class PontoColetaController extends Controller
{
    public function pontos_coleta() {
        $pontos_coleta = Ponto_coleta::latest()->simplePaginate(5);
        return view('ponto.pontos_coleta', compact('pontos_coleta'));
    }

    public function adicionar_ponto_coleta() {
        return view('ponto.adicionar_ponto_coleta');
    }

    public function salvar_ponto_coleta(Request $request) {
        $request->validate([
            'nome'=>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i|email|max:50',
            'fone'=>'required|max:11',
            'endereco'=>'required|max:255',
        ]);


        Ponto_coleta::create([
            'nome'=>$request->nome,
            'email'=>$request->email,
            'fone'=>$request->fone,
            'endereco'=>$request->endereco,
        ]);

        Session::flash('message', 'Novo ponto de coleta adicionado com sucesso.');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }

    public function editar_ponto_coleta($id)
    {
        $ponto_coleta = Ponto_coleta::findOrFail($id);
        return view('ponto.editar_ponto_coleta',compact('ponto_coleta'));
    }

    public function atualizar_ponto_coleta(Request $request,$id)
    {
        $ponto_coleta = Ponto_coleta::findOrFail($id);
        $request->validate([
            'nome'=>'required|regex:/^[\pL\s\-]+$/u|max:50',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i|email|max:50',
            'fone'=>'required|max:11',
            'endereco'=>'required|max:255',
        ]);

        Ponto_coleta::where('id',$id)->update([
            'nome'=>$request->nome,
            'email'=>$request->email,
            'fone'=>$request->fone,
            'endereco'=>$request->endereco,
        ]);
        Session::flash('message', 'Ponto de coleta atualizado com sucesso.'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();
    }

    public function deletar_ponto_coleta($id)
    {
        $ponto_coleta = Ponto_coleta::find($id);
        $ponto_coleta->delete();
        Session::flash('message', 'Ponto de coleta deletado com sucesso.'); 
        Session::flash('alert-class', 'alert-danger'); 
        return redirect()->back();
    }
}
