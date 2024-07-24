@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">{{ __('Utilizadores') }} <a class="text-white" href="{{route('users.create')}}" style="float: right" ><i class="fa-solid fa-circle-plus "></i></a></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('Nome')}}</th>
                                <th scope="col">{{__('Email')}}</th>
                                <th scope="col">{{__('Tipo de Utilizador')}}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td><a class="tb-actions"><a href="{{route('users.edit', $user)}}"> <i class="fa-regular fa-pen-to-square"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


