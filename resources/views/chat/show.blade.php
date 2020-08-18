@extends('layouts.company.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @empty($contract->first())

        <div class="col-md-8">        
            <form method="POST" action="{{ route('company.contract.presentation', ['toUserID' => $ChatRoomUser ])}}">
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

        @else
        契約提示中！！！！


        @endempty

        @foreach($Messages as $Message)
            <div class="card">
            <div class="card-header">User_id {{ $Message->user_id }}</div>            
            <div class="card-body">
                <p class="col-md-8">メッセージ： {{ $Message->message }} </p>                
            </div>
            </div>
        @endforeach

        <form method="POST" action="{{ route('company.firstMessage', ['userId' =>$Message->user_id]) }}">
                        @csrf

                        <div class="form-group row">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> -->

                            <div class="col-md-6">
                                <!-- <input id="message" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> -->
                                <textarea id="message" name="freeans" rows="4" cols="40"> 自由に意見を記述してください </textarea>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> 投稿 </button>
                        </div>
        </form>


        <!-- <a　class="btn btn-primary"　role="button" href="{{ route('company.contract.show', ['user_id' => $Message->user_id]) }}">契約を提示する</a>                 -->


        </div>
    </div>
</div>
@endsection

    