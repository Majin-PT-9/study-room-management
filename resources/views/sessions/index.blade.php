@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-black">{{ __('Sessões') }} <a class="text-white" data-bs-toggle="modal" data-bs-target="#sessionForm" style="float: right" ><i class="fa-solid fa-circle-plus "></i></a></div>
                    <div class="card-body">
                        @if(count($sessions) != 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{__('Titulo')}}</th>
                                <th scope="col">{{__('Horário')}}</th>
                                <th scope="col">{{__('Professor')}}</th>
                                <th scope="col">{{__('Disciplina')}}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sessions as $session)
                                <tr>
                                    <td>{{$session->title}}</td>
                                    <td>{{$session->starts_at}} - {{$session->ends_at}}</td>
                                    <td>{{$session->teacher->name}}</td>
                                    <td>{{$session->subject->name}}</td>
                                    <td><a class="tb-actions" href="{{route('sessions', $session->code)}}"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <h5>{{__('Sem sessões disponíveis. Crie uma!')}}</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <session-form :is-teacher="{{json_encode(Auth::user()->isTeacher())}}" :teachers="{{ json_encode($teachers) }}" :subjects="{{ json_encode($subjects) }}"></session-form>
    </div>


@endsection


