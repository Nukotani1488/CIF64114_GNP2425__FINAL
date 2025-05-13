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
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <h1>Fill Data</h1>
    <form action="{{ route('userdata.fill.post') }}" method="POST">
        <input type="text" name="full_name" placeholder="Your Full Name" required>
        <input type="number" name="height" placeholder="Your Height" required>
        <input type="number" name="weight" placeholder="Your Weight" required>
        <input type="date" name="birth_date" placeholder="Your Birth Date" required>
        <select name="sex" required>
            <option value="" disabled selected>Select Your Sex </option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <select name="plan" required>
            <option value="" disabled selected>Select Your Plan</option>
            <option value="0">Normal</option>
            <option value="1">Weight Loss</option>
        </select>
        @csrf
        <input type="submit" value="Submit">
    </form>
    @foreach ($errors->all() as $error)
        <p style="color: red;">{{ $error }}</p>
    @endforeach
</body>

</html>