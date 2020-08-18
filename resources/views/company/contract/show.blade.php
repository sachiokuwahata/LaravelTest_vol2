@extends('layouts.company.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


            <form method="POST" action="{{ route('company.contract.presentation')}}">
                @csrf


                <p class="col-md-8">金額: <input type = "text" name = "money" value=""> </p>

                <p class="col-md-8">
                面接回数:                
                <select name="interviewCount">
                <option value="1回">1回</option>
                <option value="2回">2回</option>
                <option value="3回">3回</option>
                </select>                
                </p>

                <button type="submit" class="btn btn-primary">   契約提示    </button>
            </form>


        </div>
    </div>
</div>

@endsection



