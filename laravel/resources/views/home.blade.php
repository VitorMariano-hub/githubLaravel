<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <form method="POST" action="{{ route('show') }}">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Pesquisar..." aria-label="Pesquisar..." aria-describedby="button-addon2">
                <button class="btn btn-primary" type="submit" id="button-addon2">Pesquisar</button>
            </div>
        </form>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row">
      @if(isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
     @endif
     @if(isset($user))
        <div class="card" style="width: 18rem;">
          <img src="{{$user['avatar_url']}}" class="card-img-top" alt="Avatar">
          <div class="card-body">
            <h5 class="card-title">{{$user['name']}}</h5>
            <p class="card-text">{{$user['bio']}}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$user['location']}}</li>
            <li class="list-group-item">@if($user['email'] != null) {{ $user['email']}} @else Email: @endif</li>
          </ul>
          <div class="card-body">
            <a href="{{$user['html_url']}}" class="card-link" target="_blank">Github</a>
          </div>
        </div>
      </div>
    </div>
    </div>
    @endif
  </body>
</html>
