@extends('templates.main')

@section('main')
    <form action="{{route('login.action')}}" method="post">
        @csrf
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session()->get('success')}}
            </div>
        @endif
        @error('auth_error')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <div class="mb-3 mt-5">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" value="{{old('email')}}"
                   class="form-control @error('email') is-invalid @enderror" id="email">
            @error('email')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" value="{{old('password')}}"
                   class="form-control @error('password') is-invalid @enderror" id="password">
            @error('password')
            <div id="validationServer03Feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
@endsection

