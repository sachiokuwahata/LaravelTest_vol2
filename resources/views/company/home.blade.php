@extends('layouts.company.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

            @foreach($users as $user)
            <div class="card">
            <div class="card-header">面接官 No.{{$user->id}}</div>            
            <div class="card-body">
                <p class="col-md-4">名前： {{ $user->name }} </p>
                <p class="col-md-8">アドレス： {{ $user->email }} </p>
                <a　class="btn btn-primary"　role="button" href="{{ url('/company/interviewerShow', $user->id) }}">詳細へ</a>
                
            </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection

    