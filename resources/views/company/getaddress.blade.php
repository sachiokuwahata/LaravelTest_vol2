@extends('layouts.company.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
            <div class="card-header">下記を連絡して下さい。</div>            
            <div class="card-body">
            <p class="col-md-8">こちらのURLからアクセスし、友達申請をして下さい。: {{$hashurl}} </p>
            </p>
            </div>
            </div>

        </div>
    </div>
</div>

@endsection



