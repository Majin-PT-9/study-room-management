@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Subjects') }}</div>
                    <div class="card-body">
                        <subject-manager :initial-subjects='@json($subjects)'></subject-manager>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


