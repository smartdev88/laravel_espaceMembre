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

            <div class="card card-outline-secondary my-4">
                <div class="card-header">Inscription</div>
                <div class="card-body">
                    <form action="{{ route('post.register') }}" method="post">
                        @csrf
                        <!-- ces champs correspondent aux champs de la BD-->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                            @error('name')
                                <div class="error">{{$message}}</div>
                            @enderror
                          </div>
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
                        <button type="submit" class="btn btn-primary">Inscription</button>
                      </form>
                      <p>
                        <a href="{{ route('register') }}">J'ai déja un compte</a>
                    </p>
                </div>
            </div>
        </div>
        
    </div>
@endsection