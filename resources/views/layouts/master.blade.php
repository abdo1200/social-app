<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title','app page')</title>

    <!-- Bootstrap core CSS -->
    {{-- <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/offcanvas.css') }}" rel="stylesheet">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/offcanvas.js') }}" defer></script> --}}

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/offcanvas.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.js')}}"></script>
  </head>

  <body class="bg-light">

    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand ml-5 text-light" href="#">Social app</a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav offset-2 mr-auto">
          <li class="nav-itemactive">
            <a class="nav-link pr-5" href=" {{ url('/') }} "><span><i class="fas fa-home text-success"></i></span> Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link pl-5 pr-5" href="#"><span><i class="fas fa-bell text-success"></i></span> Notifications</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link pl-5 pr-5" href="#"><span><i class="fas fa-envelope text-success"></i></i></span> Messages</a>
          </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
              </li>
            @endauth
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @endguest
        </ul>
      </div>
    </nav>

    <div class="row" id="body-row">

                @include('layouts.sidebar')
                <div class="col">
                    @yield('content')
                </div>
                <!-- Main Col END -->
            </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


    <script>
        $(document).ready(function(){
          $('[data-toggle="popover"]').popover();
        });
        </script>
  </body>
</html>
