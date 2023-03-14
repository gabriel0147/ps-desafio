@extends('layouts.site.site')

@section('titulo')
    Site Aleatorio
@endsection

@section('conteudo')
    <section class="produtos-container">
        <div class="produtos-content">
            <div class="nome-produtos">
                <h1>Produtos</h1>
                <Form class="select" action="{{ route('prodFilter') }}">
                    <div class="select-container">
                        <label for="categorias">Filtrar por categorias:</label>
                        <br>
                        <select name="categorias" id="categorias">
                            <option class="selecione" value="default">Selecione uma categorias</option>
                            <option value="">Mostrar todos</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria['nome'] }}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="Filtrar">
                    </div>
                </Form>
                <form class="search mobile" action="{{ route('prodSearch') }}">
                    <input type="search" id="search" name="search">
                    <button type="submit">
                        <span class="material-symbols-outlined">search</span>
                    </button>
                </form>
            </div>

            <div class="produtos">
                @isset($produtos)
                    @if (count($produtos))
                        @foreach ($produtos as $produto)
                            <div class="card">
                                <div class="imagem-container">
                                    <img src="{{ $produto['imagem'] }}">

                                    @if ($produto->quantidade > 0)
                                        <form method="POST" class="quantidade"
                                            action="{{ route('comprar', ['id' => $produto->id]) }}">
                                            @csrf
                                            <input type="number" id="quantidade" name="quantidade">
                                            <button type="submit">
                                                <span class="btnComprar">Comprar</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="info-produto">
                                    <p>{{ $produto['nome'] }}</p>
                                    <p>{{ $produto->categoria->nome }}</p>
                                    <p class="descri">{{ $produto['descricao'] }}</p>
                                    @if ($produto->quantidade == 0)
                                        <p class="preco" style="color:red; font-size: 20px;">ESGOTADO</p>
                                    @else
                                        <p> Quantidade: {{ $produto['quantidade'] }}</p>
                                        <p>Preco: {{ $produto['preco'] }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="no-produtos">Sem estoque</p>
                    @endif
                @endisset
            </div>
            <div class="paginacao">
                {{ $produtos->render() }}
            </div>
        </div>
    </section>
@endsection
