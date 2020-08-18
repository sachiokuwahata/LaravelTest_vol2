@extends('layouts.company.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($messageUser as $user)
            <div class="card">
            <div class="card-header">面接官 No.{{$user->InterviewUser['id']}}</div>            
            <div class="card-body">
                <p class="col-md-4">名前： {{ $user->InterviewUser['name'] }} </p>
                <p class="col-md-4">chat_room_id {{ $user->chat_room_id }} </p>
                <p class="col-md-8">アドレス： {{ $user->InterviewUser['email'] }} </p>
                <a　class="btn btn-primary"　role="button" href="{{ url('/company/chat/show', $user->chat_room_id ) }}">詳細へ</a>                
            </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection



