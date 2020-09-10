@extends('layouts.company.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
            <div class="card-header">プロフィール</div>            
            <div class="card-body">
            <p class="col-md-8">Name: {{$profileInfo->name}} </p>
            <p class="col-md-8">Email: {{$profileInfo->email}} </p>
            <p class="col-md-8">
            <a　class="btn btn-primary"　role="button" href="{{ route('company.getaddress' ) }}">友達を招待する</a>
            </p>
            <a　class="btn btn-primary"　role="button" href="{{ url('/company/profileEdit' ) }}">プロフィールを編集する</a>                
            </div>
            </div>

        </div>
    </div>
</div>

@endsection



