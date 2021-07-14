@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">詳細画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $budget_month->budget_date }}
                    {{ $budget_month->daily_necessities }}
                    {{ $budget_month->food }}
                    {{ $budget_month->education }}
                    {{ $budget_month->entertainment }}
                    {{ $budget_month->clothing }}
                    {{ $budget_month->medical }}
                    {{ $budget_month->created_at }}


                    <form method="GET" action="{{route('budget.edit', ['id' => $budget_month->id])}}">
                    @csrf

                    <input class="btn btn-info" type="submit" value="修正する">
                    </form>

                    <form method="POST" action="{{route('budget.destroy', ['id' => $budget_month->id])}}" id="delete_{{ $budget_month->id }}" >
                    @csrf
                    <a href="#" class="btn btn-danger" data-id="{{ $budget_month->id }}" onclick="deletePost(this);">削除する</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function deletePost(e){
    'use strict'
    if (confirm('本当に削除していいですか')) {
        document.getElementById('delete_' + e.dataset.id).submit();
    }
}
</script>

@endsection