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
        <button class="btn-novo" id="dark-sun" style="--clr:#0FF0FC"><span>claro</span><i></i></button>
    </div>

</header>
<hr>
