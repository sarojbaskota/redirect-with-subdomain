@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    {{ __('Welcome Admin') }}
                    @php 
                        $domain =  preg_replace('#^https?://#', '', rtrim(env('APP_URL', 'http://localhost'),'/'));
                        $subdomain = auth()->user()->subdomain.'.'.$domain.'/dashboard';
                        echo $subdomain;
                        echo "<br/>";
                        echo config('app.short_url');
                    @endphp
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
