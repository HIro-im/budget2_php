@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    showです
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

                    <input class="btn btn-info" type="submit" value="変更する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection