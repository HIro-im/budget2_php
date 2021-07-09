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

                    <form method="GET" action="{{ route('login') }}">
                    <button type="submit" class="btn btn-primary">アカウント作成済みの人はこちら</button>
                    </form>
                    <br>
                    <form method="GET" action="{{ route('register') }}">
                    <button type="submit" class="btn btn-primary">アカウント未登録の人はこちら</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
