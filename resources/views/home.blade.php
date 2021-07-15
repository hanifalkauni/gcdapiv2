@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome!</br>
                    You need ApiKey and AccessToken to access GCD API<hr>
                    Here ApiKey to access GCD API : 
                    <code>
                    {{ env('API_KEY', 'Laravel') }}
                    </code>
                    <hr>
                    <div class="accesstoken">
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
