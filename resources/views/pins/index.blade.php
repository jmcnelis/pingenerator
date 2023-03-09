<!DOCTYPE html>
<html>
<head>
    <title>Pin Generator - Generate</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Pin Generator
        </div>
        <div class="card-body">
            <form name="generate-pin" id="generate-pin" method="post" action="{{url('generator/pins')}}">
                @csrf
                <button type="submit" class="btn btn-primary">Generate Pin!</button>
            </form>

            <hr>

            <h1>Current Pins</h1>

            @forelse ($pins as $pin)
                <li>{{ $pin->pin }}</li>
            @empty
                <p> 'No pins yet' </p>
            @endforelse
        </div>
    </div>
</div>
</body>
</html>