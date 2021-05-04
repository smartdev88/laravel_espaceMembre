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
                <div class="card-header">J'ai oublié mon mot de passe</div>
                <div class="card-body">
                    <form action="{{ route('post.forgot') }}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                          @error('email')
                                <div class="error">{{$message}}</div>
                            @enderror
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                      </form>

                      <p class="my-2">
                          <a href="{{ route('register') }}">Je n'ai pas de compte</a>
                      </p>
                      <p>
                        <a href="{{ route('forgot') }}">J'ai oublié mon mot de passe</a>
                    </p>
                </div>
            </div>
        </div>
        
    </div>
@endsection