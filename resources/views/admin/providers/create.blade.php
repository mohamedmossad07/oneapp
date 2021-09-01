@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('dashboard.admin.providers.store')}}">
        @csrf
        {{--start provider name --}}
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Provider name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ old('name') }}" required>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        {{--end provider name --}}
        {{--start user name --}}

        <div class="form-group row">
            <label for="user_name" class="col-md-4 col-form-label text-md-right">{{ __('User name') }}</label>

            <div class="col-md-6">
                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror"
                       name="user_name" value="{{ old('user_name') }}" required>

                @error('user_name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        {{--end user name --}}
        {{--start provider email --}}

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        {{--end provider email --}}
        {{--start provider pass --}}

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        {{--end provider pass --}}
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-success">
                    {{ __('Add ') }}
                </button>
            </div>
        </div>
    </form>
@endsection
