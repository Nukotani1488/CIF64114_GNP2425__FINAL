<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>
        input {
            display: block;
            margin: 10px auto;
        }
    </style>
</head>

<body class="">
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="header">
        <h1>Login</h1>
    </div>
    <div class="body">
        <div class="content-card">
            <form action="{{ route('userdata.fill.post') }}" method="POST">
                <input type="text" name="full_name" placeholder="Your Full Name" required>
                <input type="number" name="height" placeholder="Your Height" required>
                <input type="number" name="weight" placeholder="Your Weight" required>
                <input type="date" name="birth_date" placeholder="Your Birth Date" required>
                <select name="sex" required>
                    <option value="" disabled selected>Pilih jenis kelamin Anda</option>
                    <option value="male">Laki-laki</option>
                    <option value="female">Perempuan</option>
                </select>
                <select name="plan" required>
                    <option value="" disabled selected>Pilih plan Anda</option>
                    <option value="0">Normal</option>
                    <option value="1">Penurunah berat badan</option>
                </select>
                @csrf
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="content-card">
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <p style="color: red;">{{ $error }}</p>
                @endforeach
            @endif
        </div>
    </div>
</body>

</html>
