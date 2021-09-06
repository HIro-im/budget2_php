@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">固定費選択画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="GET" action="{{ route('home') }}">
                    <button type="submit" class="btn btn-primary">メニューに戻る</button>
                    </form>
                    <form method="GET" action="{{ route('calc.result') }}">
                    @csrf

                    各項目を固定費として含めるか選択してください。
                    <br>
                    <br>

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $message)
                            <!-- 全てのエラーメッセージを出力 -->
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="form-group row">
                        <label for="inputDaily_necesities" class="col-sm-2 col-form-label">日用品</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="daily_necessities" id="inputDaily_necessities0" value="0">
                            <label class="form-check-label" for="inputDaily_necessities0">含めない</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="daily_necessities" id="inputDaily_necessities1" value="1" checked="checked">
                            <label class="form-check-label" for="inputDaily_necessities1">含める</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDaily_necesities" class="col-sm-2 col-form-label">食費</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="food" id="inputFood0" value="0">
                            <label class="form-check-label" for="inputFood0">含めない</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="food" id="inputFood1" value="1" checked="checked">
                            <label class="form-check-label" for="inputFood1">含める</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDaily_necesities" class="col-sm-2 col-form-label">教養・教育</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="education" id="inputEducation0" value="0">
                            <label class="form-check-label" for="inputEducation0">含めない</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="education" id="inputEducation1" value="1" checked="checked">
                            <label class="form-check-label" for="inputEducation1">含める</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDaily_necesities" class="col-sm-2 col-form-label">趣味・娯楽</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="entertainment" id="inputEntertainment0" value="0">
                            <label class="form-check-label" for="inputEntertainment0">含めない</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="entertainment" id="inputEntertainment1" value="1" checked="checked">
                            <label class="form-check-label" for="inputEntertainment1">含める</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDaily_necesities" class="col-sm-2 col-form-label">衣服・美容</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="clothing" id="inputClothing0" value="0">
                            <label class="form-check-label" for="inputClothing0">含めない</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="clothing" id="inputClothing1" value="1" checked="checked">
                            <label class="form-check-label" for="inputClothing1">含める</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDaily_necesities" class="col-sm-2 col-form-label">健康・医療</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="medical" id="inputMedical0" value="0">
                            <label class="form-check-label" for="inputMedical0">含めない</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="medical" id="inputMedical1" value="1" checked="checked">
                            <label class="form-check-label" for="inputMedical1">含める</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputBalance" class="col-sm-2 col-form-label">預金残高</label>
                        <div class="col-sm-4">
                        <input type="number" class="form-control" id="inputBalance" name="balance" value="0">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">計算する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection