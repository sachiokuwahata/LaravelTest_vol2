@extends('layouts.company.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
            <div class="card-header">下記を連絡して下さい。</div>            
            <div class="card-body">
            <p class="col-md-8">友達名称: {{$friend->name}} </p>

            <p class="col-md-8">申請する</p>
            </p>
            </div>
            </div>

        </div>
    </div>
</div>

@endsection



