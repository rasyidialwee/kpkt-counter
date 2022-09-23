<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @vite(['resources/js/app.js'])

</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h4>Pengesahan Nombor Telefon</h4>
                <p>Sila masukkan kod pengesahan yang anda terima melalui SMS.</p>
                <form action="{{ route('borang.pengesahan.store', $borang->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input class="form-control" type="text" name="code">
                    </div>

                    <button class="btn btn-primary mt-2" type="submit">Hantar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
