@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">一覧画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('budget.create') }}">
                    <button type="submit" class="btn btn-primary">支出登録</button>
                    </form>
                    <form method="GET" action="{{ route('calc.input') }}">
                    <button type="submit" class="btn btn-primary">計算処理</button>
                    </form>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">支出年月</th>
                          <th scope="col">日用品</th>
                          <th scope="col">食費</th>
                          <th scope="col">教養・教育</th>
                          <th scope="col">趣味・娯楽</th>
                          <th scope="col">衣服・美容</th>
                          <th scope="col">健康・医療</th>
                          <th scope="col">詳細</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($budgets as $budget)
                          <tr>
                          <th>{{ $budget->budget_date}}</th>
                          <td>{{ $budget->daily_necessities}}</td>
                          <td>{{ $budget->food}}</td>
                          <td>{{ $budget->education}}</td>
                          <td>{{ $budget->entertainment}}</td>
                          <td>{{ $budget->clothing}}</td>
                          <td>{{ $budget->medical}}</td>
                          <td><a href="{{ route('budget.show', ['id' => $budget->id]) }}">詳細</a></td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection