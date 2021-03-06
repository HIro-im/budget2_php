@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">詳細画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('budget.index') }}">
                    <button type="submit" class="btn btn-primary">一覧に戻る</button>
                    </form>
                    <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">支出年月</th>
                          <!-- 項目追加が発生した場合、以下の項目を追加していく -->
                          <th scope="col"><a href="{{ route('make.graph', ['content' => 'daily']) }}">日用品</a></th>
                          <th scope="col"><a href="{{ route('make.graph', ['content' => 'food']) }}">食費</a></th>
                          <th scope="col"><a href="{{ route('make.graph', ['content' => 'education']) }}">教養・教育</a></th>
                          <th scope="col"><a href="{{ route('make.graph', ['content' => 'entertainment']) }}">趣味・娯楽</a></th>
                          <th scope="col"><a href="{{ route('make.graph', ['content' => 'clothing']) }}">衣服・美容</a></th>
                          <th scope="col"><a href="{{ route('make.graph', ['content' => 'medical']) }}">健康・医療</a></th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                          <th>{{ $budget_month->budget_date}}</th>
                          <!-- 項目追加が発生した場合、以下の項目を追加していく -->
                          <td>{{ $budget_month->daily_necessities}}</td>
                          <td>{{ $budget_month->food}}</td>
                          <td>{{ $budget_month->education}}</td>
                          <td>{{ $budget_month->entertainment}}</td>
                          <td>{{ $budget_month->clothing}}</td>
                          <td>{{ $budget_month->medical}}</td>
                          </tr>
                      </tbody>
                    </table>
                    </div>
                    <div class="btn-group" role="group">
                        <form method="GET" action="{{route('budget.edit', ['id' => $budget_month->id])}}">
                        @csrf

                        <input class="btn btn-info" type="submit" value="修正する">
                       </form>

                        <form method="POST" action="{{route('budget.destroy', ['id' => $budget_month->id])}}" id="delete_{{ $budget_month->id }}" >
                        @csrf
                        <input class="btn btn-danger" type="submit" value="削除する">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection