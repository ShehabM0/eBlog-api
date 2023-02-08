<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
      <link rel="stylesheet" href="{{ asset('css/header.css') }}">
      <link rel="stylesheet" href="{{ asset('css/home.css') }}">
      <link rel="stylesheet" href="{{ asset('css/card.css') }}">
      <link rel="stylesheet" href="{{ asset('css/alert.css') }}">
      <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
      <link rel="stylesheet" href="{{ asset('css/post.css') }}">
      <link rel="stylesheet" href="{{ asset('css/create.css') }}">
      <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
      <link rel="stylesheet" href="{{ asset('css/myposts.css') }}">
      <title>eBlog - @yield('pageTitle')</title>

      {{-- fonts --}}
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
          href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap"
          rel="stylesheet" />
      <script defer src="{{ asset('js/app.js') }}"></script>
  </head>

  <body>

      {{-- page header --}}
      <div class="header">
          <div class="nav-container">
              @guest
                  <a href="{{ asset('/') }}">
                      <span class="logo">
                          e<span>B</span>log
                      </span>
                  </a>
                  <div class="search-bar">
                      <button type="submit"><img src="{{ asset('img/bx-search.svg') }}" alt="" /> </button>
                      <input type="text" name="search_keyword" placeholder="search" form="search-form">
                      <form action="/" method="get" id="search-form"></form>
                  </div>
                  <div>
                      <a href="{{ asset('signup') }}" class="signup">SignUp</a>
                      <a href="{{ asset('login') }}" class="login">Login</a>
                  </div>
              @endguest
              @auth
                  <div class="left-side">
                      <a href="{{ asset('/') }}">
                          <span class="logo"> e<span>B</span>log </span>
                      </a>
                      <button id="create-post">Create Post</button>
                      <a href="/myposts"><button id="create-post">My posts</button></a>
                  </div>
                  <div class="search-bar">
                      <button type="submit"><img src="{{ asset('img/bx-search.svg') }}" alt="" /> </button>
                      <input type="text" name="search_keyword" placeholder="search" form="search-form">
                      <form action="/" method="get" id="search-form"></form>
                  </div>
                  <div>
                      <form action="/logout" method="POST" id="logoutFormSubmit">@csrf</form>
                      <span style="color: #fff; padding: 0 15px">Hello {{ Auth::user()['name'] }}</span>
                      <a href="#" class="logout" onclick="submitLogoutForm()">Logout</a>
                  </div>
              @endauth
          </div>
      </div>

      {{-- create post window --}}
      @include('posts.createPost')
      
      {{-- page alerts --}}
      @if ($errors->any() || session('message'))
          <div class="alert-msg">
              <button id="x-btn" class="close-btn">&times;</button>
              <div>
                  <p>{{ session('message') }}</p>
                  @foreach ($errors->all() as $error)
                      <p>-{{ $error }}</p>
                  @endforeach
              </div>
          </div>
      @endif

      @yield('signup-content')
      @yield('login-content')
      @yield('homepage-content')
      @yield('post-content')
      @yield('myposts-content')

  </body>

</html>
