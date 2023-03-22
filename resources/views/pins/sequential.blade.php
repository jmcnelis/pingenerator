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
            Is it a sequential number?
        </div>

        <div class="card-body">

            @if ($outcome === true)
                YES it is!
            @else
                NO it's not.
            @endif

        </div>
    </div>
</div>
</body>
</html>