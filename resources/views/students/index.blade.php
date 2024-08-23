@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-black">{{ __('Alunos') }} <a class="text-white" data-bs-toggle="modal" data-bs-target="#studentForm" style="float: right" ><i class="fa-solid fa-circle-plus "></i></a></div>
                    <div class="card-body">
                        @if(count($students) != 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{__('Nome')}}</th>
                                <th scope="col">{{__('Ano')}}</th>
                                <th scope="col">{{__('Turma')}}</th>
                                <th scope="col">{{__('NIF')}}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{$student->full_name}}</td>
                                    <td>{{$student->grade ? $student->grade->name : ''}} </td>
                                    <td>{{$student->assembly ? $student->assembly->name : ''}}</td>
                                    <td>{{$student->nif}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <h5>{{__('Sem Alunos para listar. Crie um!')}}</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


