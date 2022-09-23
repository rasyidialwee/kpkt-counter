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
                <h4>Borang Satu</h4>

                <form action="{{ route('borang.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" type="text" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="no_kp">No. Kad Pengenalan</label>
                        <input class="form-control" type="text" name="no_kp" maxlength="12">
                    </div>
                    <div class="form-group">
                        <label for="telefon">No. Telefon</label>
                        <input class="form-control" type="tel" name="telefon">
                    </div>
                    <div class="form-group">
                        <label for="nama">Catatan</label>
                        <textarea class="form-control" name="catatan"></textarea>
                    </div>

                    <button class="btn btn-primary mt-2" type="submit">Sah Kan Nombor Telefon</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
