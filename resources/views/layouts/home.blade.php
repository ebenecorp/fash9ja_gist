<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    @yield('css')
    <title>
      @yield('title')
    </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Fash9ja Gist</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="/dashboard">Dashboard</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('category.index')}}">List Category</a></li>
                  <li><a class="dropdown-item" href="{{ route('category.create') }}">add Category</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Tag
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('tags.index')}}">List Tag</a></li>
                  <li><a class="dropdown-item" href="{{ route('tags.create') }}">add Tag</a></li>
                </ul>
              </li>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Posts
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{route('posts.index')}}">List Posts</a></li>
                  <li><a class="dropdown-item" href="{{ route('posts.create') }}">add Post</a></li>
                  <li><a class="dropdown-item" href="{{ route('posts.trashed') }}">Trashed Post</a></li>
                </ul>
              </li>
              @if (auth()->user()->isAdmin())
                <li class="nav-item ">
                  
                  <a class="nav-link " href="{{route('user.index')}}" id="navbar" role="button" aria-expanded="false">
                    Users
                  </a>
                  
                </li>
              @endif
              

            </ul>

          </div>
          <div class="d-flex">
            <ul>
              <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name}}
                </a>
                
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                    
                    <a class="dropdown-item" href="{{route('user.edit-profile')}}" >
                      Edit Profile
                    </a>
                  </li>
                  @if (auth()->user()->isAdmin())
                    <li>
                      
                      <a class="dropdown-item" href="{{route('edit-company')}}" >
                        Edit Company Details
                      </a>
                    </li>
                      
                  @endif
                                              

                  <li>
                      <form action="{{route('logout')}}" method="POST">
                      @csrf
                      
                      <button class="dropdown-item" type="submit">Log Out</button>
                    </form>
                  </li>
                    
                 
                </ul>
              </li>
            </ul> 
          </div>
        </div>
      </nav>

    <div class="list-group alert-success">
        {{Session::get('message')}}
    </div>


    @yield('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    @yield('script')

</body>
</html>
