@extends('layouts.app')

@section('content')
<div id="fondopng">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
                <br>
                @if (session('info'))
                                <div class="alert alert-success">
                                    {{ session('info') }}
                                </div>
                            @endif
            </div>
        </div>
    </div>
</div>
@endsection
