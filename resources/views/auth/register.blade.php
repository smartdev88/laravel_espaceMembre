@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="card card-outline-secondary my-4">
            <div class="card-header">Inscription</div>
            <div class="card-body">
                <form>
                    <!-- ces champs correspondent aux champs de la BD-->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name">
                      </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password">
                    </div>
                    {{-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Inscription</button>
                  </form>
            </div>
        </div>
    </div>
@endsection