<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('site.index', compact('produtos', 'categorias'));
    }

    public function prodFilter(Request $request)
    {
        // dd("pesquisando por {$request['categorias']}");
        $selecaoCate = Categoria::where('id', $request['categorias'])->first();
        $produtos = [];
        if (isset($selecaoCate)) {
            $produtos = Produto::where('categoria_id', $selecaoCate->id)->get();
            // dd($produtos);
        } else
            $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('site.index', compact('produtos', 'categorias', 'selecaoCate'));
    }

    public function prodSearch(Request $request)
    {
        // dd("pesquisando por {$request['search']}");
        $produtos = Produto::where('nome', 'LIKE', "%{$request['search']}%")->get();
        $categorias = Categoria::all();
        return view('site.index', compact('produtos', 'categorias'));
    }

    public function comprar(Request $request, $id)
    {
        $produtos = Produto::find($id);
        $quantidade = $request->quantidade;
        //dd($quantidade);
        if ($produtos && $produtos->quantidade >= $quantidade && $quantidade > 0) {
            $produtos->quantidade -= $quantidade;
            $produtos->save();
            return redirect()->back()->with('success', 'Comprar bem sucedida');
        } else
            return redirect()->back()->with('errors', 'Falha na compra');
    }
}
