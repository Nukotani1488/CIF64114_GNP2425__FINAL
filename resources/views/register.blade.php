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
        <h1>Register</h1>
    </div>
    <div class="body">
        <div class="content-card">
            <form id="register-form" action="javascript:void(0)" method="POST" onsubmit="register()">
                <input type="text" name="name" placeholder="Enter your username" required>
                <input type="email" name="email" placeholder="Enter your email" required>
                <input type="password" name="password" placeholder="Enter your password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
                <input type="submit" value="Submit">
                @csrf
            </form>
            <a>
                <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
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
<script src="{{ asset('js/global.js') }}"></script>
<script>
    async function register() {
        const form = document.getElementById('register-form');
        const submitter = form.querySelector('input[type="submit"]');
        const formData = new FormData(form, submitter);
        var payload = "";
        formData.forEach((value, key) => {
            payload = payload + key + '=' + value + '&';
        });
        const response = await sendData('{{ route('register.post') }}', payload);
        if (response['status'] == 'success') {
            window.location.href = '{{ route('login') }}';
        }
    }

</script>
</html>