@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メニュー画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('budget.index') }}">
                    <button type="submit" class="btn btn-primary">支出一覧・登録画面</button>
                    </form>
                    <br>
                    <form method="GET" action="{{ route('calc.input') }}">
                    <button type="submit" class="btn btn-primary">固定費計算処理画面</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
