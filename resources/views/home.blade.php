@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @guest
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('register') }}">{{ __('Register') }}</a> to start a raffle!
                    </div>
                </div>
            @endguest

            @auth
                <div class="card mb-5">
                    <div class="card-header">Create a Contest</div>

                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">My Contests</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex align-items-center">
                                <a href="/contests/1">Some Contest</a>
                                <button class="btn btn-danger ml-auto">&times;</button>
                            </li>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection
