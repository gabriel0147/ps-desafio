<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProdutoController extends Controller
{

    private $produtos;
    private $categorias;

    public function __construct(Produto $produto, Categoria $categoria)
    {
        $this->produtos = $produto;
        $this->categorias = $categoria;
    }

    public function index()
    {
        $produtos = $this->produtos->all();
        return view('produto.index', compact('produtos'));
    }


    public function create()
    {
        $categorias = $this->categorias->all();
        return view('produto.crud', compact('categorias'));
    }


    public function store(StoreProdutoRequest $request)
    {
        $data = $request->all();

        $data['imagem'] = '/storage/' . $request->file('imagem')->store('produtos', 'public');
        $this->produtos->create($data);
        return redirect()->route('produto.index')->with('sucess', 'produto criado com sucesso');
    }


    public function show($id)
    {
        $produto = $this->produtos->find($id);
        // $produto->load('categoria');
        $produto->categoria;
        return response()->json($produto);
    }


    public function edit($id)
    {
        $produto = $this->produtos->find($id);
        $categorias = $this->categorias->all();

        return view('produto.crud', compact('produto', 'categorias'));
    }


    public function update(StoreProdutoRequest $request, $id)
    {
        $data = $request->all();
        $produto = $this->produtos->find($id);

        if ($request->hasFile('imagem')) {
            Storage::disk('public')->delete(substr($produto->imagem, 9));
            $data['imagem'] = '/storage/' . $request->file('imagem')->store('produtos', 'public');
        }

        $produto->update($data);
        return redirect()->route('produto.index')->with('sucess', 'Produto editado com sucesso.');
    }

    public function destroy($id)
    {
        $produto = $this->produtos->find($id);
        Storage::disk('public')->delete(substr($produto->imagem, 9));
        $produto->delete();

        return redirect()->route('produto.index')->with('sucess', 'Produto deletado com sucesso');
    }
}
