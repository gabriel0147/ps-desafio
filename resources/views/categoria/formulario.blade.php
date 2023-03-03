<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Categorias') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome"
                id="input-nome" type="text" placeholder="{{ __('Categoria do Produto') }}"
                value="{{ isset($categoria) ? $categoria->nome : old('nome') }}" required="true"
                aria-required="true" />
            @if ($errors->has('nome'))
                <span id="nome-error" class="error text-danger"
                    for="input-nome">{{ $errors->first('nome') }}</span>
            @endif
        </div>
    </div>
</div>
