<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARAVEL CRUD PERMISSIONS</title>

        <!-- Bootstrap 5 CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


         <!-- RUN npm run dev if APP_HOT_RELOAD is true -->
        @if(ENV('APP_HOT_RELOAD'))
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @endif


        <style>
.navbar-light .navbar-nav .nav-link.active {
  color: rgb(91, 130, 238);
  font-weight: bold;
}
        </style>

</head>

<body class="d-flex flex-column h-100" cz-shortcut-listen="true">


    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #dce9f1;">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('home') }}">Laravel Crud Permissions</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">


              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">{{ auth()->user()->name }}</a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
              </li>

              @can('view_posts')
              <li class="nav-item">
                <a class="nav-link {{ Route::is('posts.create') ? 'active' : '' }}" href="{{ route('posts.create') }}">New Post</a>
              </li>
                @endcan

                @can('view_users')
              <li class="nav-item">
                <a class="nav-link {{ Route::is('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">Users</a>
              </li>
              @endif

                @can('view_roles')
              <li class="nav-item">
                <a class="nav-link {{ Route::is('roles.index') ? 'active' : '' }}" href="{{ route('roles.index') }}">Roles</a>
              </li>
                @endif



            </ul>

            <form method="POST" class="d-flex" action="{{ route('logout') }}">
                @csrf
              <button class="btn btn-outline-success" type="submit">Logout</button>
            </form>
          </div>
        </div>
      </nav>


    <main class="flex-shrink-0 mt-5">
        <div class="container">
            @yield('content')
        </div>
      </main>

      <footer class="footer mt-auto py-3 bg-body-tertiary">
        <hr>
        <div class="container">

            <div class="col-md-4 d-flex align-items-center">
                <span class="mb-3 mb-md-0 text-muted">By Sebastianv20</span>
              </div>
        </div>
      </footer>




    </body>

    <!-- Bootstrap 5 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
