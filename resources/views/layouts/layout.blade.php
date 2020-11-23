<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>مرجع</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">


  </head>

  <body>



    <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="200" height="40"
          viewBox="0 0 237 87">
          <text id="_مرجع_" data-name="&lt;/مرجع&gt;" transform="translate(0 62)" fill="#2eb19f" font-size="60"
            font-family="URWDINArabic-Bold, URW DIN Arabic" font-weight="700">
            <tspan x="0" y="0">&lt;/</tspan>
            <tspan y="0">مرجع</tspan>
            <tspan y="0">&gt;</tspan>
          </text>
        </svg>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse navh" id="navbarNav">
        <ul class="navbar-nav ml-auto" reversed>
          <!-- Authentication Links -->
          @guest

          <li class="nav-item">
            <a class="nav-link" href="#">تواصل معنا</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/courses') }}">الدورات</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/chanals') }}">القنوات</a>
          </li>


          <li class="nav-item active">
            <a class="nav-link" style="color: #333" href="{{ url('/') }}"><b>الرئيسية</b> <span
                class="sr-only">(current)</span></a>
          </li>

          @else
          <li class="nav-item">
            <a class="nav-link" href="#">تواصل معنا</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/chanals') }}">القنوات</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/courses') }}">الدورات</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">الرئيسية <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

              <a class="dropdown-item" href="{{ url('/dashboard') }}">dashboard</a>


              <br>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </nav>

    @yield('content')

    <footer class="two pt-5">
      <h3 class="text-center pt-5">created by <a href="https://mustafadev.ml/"><b style="color: #fff">mustafadev</b></a>
      </h3>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
      integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
  </body>

</html>