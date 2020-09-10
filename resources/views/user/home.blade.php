@extends('layouts.user.app')

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
        </div>

        @foreach($contractusers as $user)

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">契約申請が来てます</div>

                <div class="card-body">

                    <div class="card">
                    <div class="card-body">
                        <p class="col-md-4">名前： {{ $user->company['name'] }} </p>
                    </div>
                    </div>
                </div>                
            </div>            
        </div>
        @endforeach



    </div>
</div>
@endsection
