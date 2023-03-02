<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;
use App\Models\Produto;
use Database\Seeders\ProdutoSeeder;

class CategoriaController extends Controller
{

    private $produto;
    private $categoria;

    public function __construct(Produto $produto, Categoria $categoria)
    {
        $this->produto = $produto;
        $this->categoria = $categoria;
    }

    public function index()
    {
        $categorias = $this->categoria->all();
        return view('categoria.index', compact('categorias'));
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
