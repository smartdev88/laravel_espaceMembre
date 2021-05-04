@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            
        </div>
        <div class="col-lg-9">
            @if(session('success'))
                <div class="alert alert-success mt-5">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger mt-5">
                    {{ session('error')}}
                </div>
            @endif

            <div class="card card-outline-secondary my-4">
                <div class="card-header">Connexion</div>
                <div class="card-body">
                    <form action="{{ route('post.login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                          @error('email')
                                <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Mot de passe</label>
                          <input type="password" class="form-control" id="password" name="password">
                          @error('password')
                                <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
                          <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Connexion</button>
                      </form>
                </div>
            </div>
        </div>
        
    </div>
@endsection