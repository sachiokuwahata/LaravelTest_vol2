@extends('layouts.company.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
            <div class="card-header">プロフィール</div>            
            <div class="card-body">


            <form method="POST" action="{{ route('company.profileUpdate')}}">
                @csrf
                <p class="col-md-8">Name: <input type = "text" name = "name" value="{{$profileInfo->name}}"> </p>
                <p class="col-md-8">Email: <input type = "text" name = "email" value="{{$profileInfo->email}}"> </p>

                <button type="submit" class="btn btn-primary">   更新する    </button>
            </form>

            </div>
            </div>

        </div>
    </div>
</div>

@endsection



