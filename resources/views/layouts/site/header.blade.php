<header id="site-header">

    <div id="header-logo">
        <form class="search" action="{{ route('prodSearch') }}">
            <input type="text" id="search" name="search">
            <button type="submit">
                <span class="material-symbols-outlined">search</span>
            </button>
        </form>
        <a href="{{ route('siteIndex') }}">
            <img src="{{ asset('site/img/adapti.png') }}" alt="Logo" style="width=300 height=300">
        </a>
        <div class="btn-novo-div">
            <button class="btn-novo" id="dark-sun" style="--clr:#0FF0FC"><span>claro</span><i></i></button>
        </div>
        <div class="mobile-dark">
            <input type="checkbox" name="change-theme" id="change-theme">
            <label for="change-theme">
                <span class="material-symbols-outlined lua">
                    dark_mode
                </span>
                <span class="material-symbols-outlined sol">
                    light_mode
                </span>
            </label>
        </div>
    </div>

</header>
<hr>
