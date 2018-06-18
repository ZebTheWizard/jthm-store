<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('includes.header')
    </head>
    <body>
        <main class="py-4 has-nav">
            <div class="fixed-top bg-white sniddl-nav">
              <a href="/" class="h3 m-0 text-dark">{{ env('APP_NAME') }}</a>
              <div class="links">

                @if(Auth::guest())
                <a href="/login" class="nav-icon"><i class="fas fa-sign-in fa-lg"></i></a>
                @else
                <a href="/cart" class="fa-layers fa-fw nav-icon">
                  <i class="fas fa-shopping-cart fa-lg"></i>
                  @if($count = Auth::user()->cartCount())
                    <span class="fa-layers-counter" id="cart-counter">{{ $count }}</span>
                  @endif

                </a>

                <a href="/home" class="fa-layers fa-fw nav-icon">
                  <i class="fas fa-user fa-lg"></i>
                </a>

                <!-- <a href="/cart" class="nav-icon"></a> -->
                <!-- <a href="/home" class="nav-icon"><i class="fas fa-user fa-lg"></i></a> -->
                @endif
              </div>
            </div>
            @if (View::hasSection('content'))
              <div id="app">@yield('content')</div>
            @endif
            <div>@yield('no-vue')</div>
        </main>
        <footer class="mt-5 py-5 text-muted text-center text-small">
          <p class="mb-1">Created by ZebTheWizard 2018</p>
          <ul class="list-inline">
            <li class="list-inline-item"><a class="text-dark" href="https://github.com/ZebTheWizard/jthm-store">Github</a></li>
            <li class="list-inline-item"><a class="text-dark" href="/home">Dashboard</a></li>
          </ul>
        </footer>

        @yield('scripts')
    </body>
</html>
