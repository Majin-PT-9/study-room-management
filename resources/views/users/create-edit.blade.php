@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">@isset($user){{ __('Editar Utilizador') }}@else {{ __('Criar Utilizador') }} @endisset</div>
                    <div class="card-body">
                        @isset($user)
                        <form action="{{ route('users.update',$user) }}" method="POST">
                        @else
                        <form action="{{ route('users.store') }}" method="POST">
                        @endif
                            @csrf <!-- CSRF Token for protection -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label"for="name">{{ __('Nome') }}</label><br>
                                    <input class="form-control" @isset($user) value="{{$user->name}}" @endisset type="text" id="name" name="name" required><br>
                                </div>
                               <div class="col-md-6">
                                   <label  class="form-label" for="email">{{ __('Email') }}</label><br>
                                   <input class="form-control" @isset($user) value="{{$user->email}}" @endisset type="email" id="email" name="email" required><br>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label  class="form-label" for="password">{{ __('Palavra-passe') }}</label><br>
                                    <input autocomplete="new-password" class="form-control" type="password" name="password" @if(!isset($user)) required @endif><br>
                                </div>
                                <div class="col-md-6">
                                    <label  class="form-label" for="password_confirmation">{{ __('Confirmar palavra-passe') }}</label><br>
                                    <input autocomplete="new-password-confirm" class="form-control" type="password" name="password_confirmation" @if(!isset($user))required @endif><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="password">{{ __('Tipo') }}</label><br>
                                    <select class="form-select"  name="role" id="role" required>
                                        @foreach ($roles as $role)
                                            <option @if(isset($user) && $user->id == $role->id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select><br>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button style="width: 30%" class="form-control bg-success text-white" type="submit" value="Submit">{{ __('Submeter') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


