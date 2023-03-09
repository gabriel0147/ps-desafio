<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Categoria;
use App\Models\Produto;
use Database\Seeders\ProdutoSeeder;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    private $produtos;
    private $categoria;

    public function __construct(Produto $produto, Categoria $categoria)
    {
        $this->produtos = $produto;
        $this->categoria = $categoria;
    }

    public function index()
    {
        $categorias = $this->categoria->all();
        return view('categoria.index', compact('categorias'));
    }


    public function create()
    {
        return view('categoria.crud');
    }


    public function store(StoreCategoriaRequest $request)
    {
        $data = $request->all();
        $this->categoria->create($data);
        return redirect()->route('categoria.index')->with('sucess', 'Categoria criada com sucesso!!!');
    }

    public function edit($id)
    {
        $categoria = $this->categoria->find($id);
        return view('categoria.crud', compact('categoria'));
    }

    public function update(UpdateCategoriaRequest $request, $id)
    {
        $data = $request->validated();
        $categoria = $this->categoria->find($id);
        $categoria->update($data);

        return redirect()->route('categoria.index')->with('sucess', 'Categoria modificada com sucesso');
    }

    public function destroy($id)
    {
        $produtos = $this->produtos->where('categoria_id', $id)->whereNotNull('imagem')->get();
        foreach ($produtos as $produto) {
            Storage::disk('public')->delete(str_replace('/storage', '', $produto->imagem));
        }

        $categoria = $this->categoria->find($id);
        $categoria->delete();

        return redirect()->route('categoria.index')->with('sucess', 'Categoria deletada com sucesso');
    }
}
