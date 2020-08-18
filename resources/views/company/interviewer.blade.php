@extends('layouts.company.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            This is your Best Interviewer

            <div class="card">
            <div class="card-header">面接官 No.{{$userInfo->id}}</div>            
            <div class="card-body">
                <p class="col-md-4">名前： {{ $userInfo->name }} </p>
                <p class="col-md-8">アドレス： {{ $userInfo->email }} </p>
                <p class="col-md-8">特技： AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA </p>
                <!-- <a　class="btn btn-primary"　role="button" href="#">メッセージで相談</a> -->
                <!-- 1.モーダル表示のためのボタン -->
                <div class="col-md-8">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-example">
                    モーダルダイアログ表示
                </button>                
                </div>
            </div>
            </div>

        </div>
    </div>
</div>


  <!-- 2.モーダルの配置 -->
  <div class="modal" id="modal-example" tabindex="-1">
    <div class="modal-dialog">
 
      <!-- 3.モーダルのコンテンツ -->
      <div class="modal-content">
 
        <!-- 4.モーダルのヘッダ -->
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button> -->
          <h4 class="modal-title" id="modal-label">ダイアログ</h4>
        </div>

                     <form method="POST" action="{{ route('company.firstMessage', ['userId' => $userInfo->id]) }}">
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
                       <!-- 6.モーダルのフッタ -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                            <!-- <button type="submit" class="btn btn-primary">保存</button> -->
                            <button type="submit" class="btn btn-primary">   保存    </button>
                        </div>
                    </form>

      </div>
    </div>
  </div>
@endsection
