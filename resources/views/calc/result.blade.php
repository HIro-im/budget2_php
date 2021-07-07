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
                    日用品 平均支出額
                    <input type="text" name="daily_necessities" value={{$daily_necessities_avg}} readonly='readonly'>
                    <br>
                    食費 平均支出額
                    <input type="text" name="food" value={{$food_avg}} readonly='readonly'>
                    <br>
                    教養・教育 平均支出額
                    <input type="text" name="education" value={{$education_avg}} readonly='readonly'>
                    <br>
                    趣味・娯楽 平均支出額
                    <input type="text" name="entertainment" value="{{$entertainment_avg}}" readonly='readonly'>
                    <br>
                    衣服・美容 平均支出額
                    <input type="textbox" name="clothing" value="{{$clothing_avg}}" readonly='readonly'>
                    <br>
                    健康・医療 平均支出額
                    <input type="textbox" name="medical" value="{{$medical_avg}}" readonly='readonly'>
                    <br>

                    無収入での生活可能期間
                    <input type="number" name="term" value={{$number_of_months}} readonly='readonly'>
                    <br>
                    <button type="submit" class="btn btn-primary">計算する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection