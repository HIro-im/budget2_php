@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('budget.create') }}">
                    <button type="submit" class="btn btn-primary">支出登録</button>
                    </form>

                    <form method="GET" action="{{ route('calc.result') }}">
                    @csrf

                    固定費として含めるか選択してください。
                    <br>

                    日用品
                    <input type="radio" name="daily_necessities" value="0">含めない
                    <input type="radio" name="daily_necessities" value="1" checked="checked">含める
                    <br>
                    食費
                    <input type="radio" name="food" value="0">含めない
                    <input type="radio" name="food" value="1" checked="checked">含める
                    <br>
                    教養・教育
                    <input type="radio" name="education" value="0">含めない
                    <input type="radio" name="education" value="1" checked="checked">含める
                    <br>
                    趣味・娯楽
                    <input type="radio" name="entertainment" value="0">含めない
                    <input type="radio" name="entertainment" value="1" checked="checked">含める  
                    <br>
                    衣服・美容
                    <input type="radio" name="clothing" value="0">含めない
                    <input type="radio" name="clothing" value="1" checked="checked">含める
                    <br>
                    健康・医療
                    <input type="radio" name="medical" value="0">含めない
                    <input type="radio" name="medical" value="1" checked="checked">含める
                    <br>

                    預金残高
                    <input type="number" name="balance" value="0">
                    <br>
                    <button type="submit" class="btn btn-primary">計算する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection