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
        <h1>Dashboard</h1>
        <h2>Welcome, {{ $user->name }}</h2>
        <h2>Sugar Consumption: {{ $user->getSugarConsumptionToday() }}</h2>
        <h2>Maximum Sugar Consumption: {{ $user->userData->maxConsumption }}</h2>
        <h1>Consoom</h1>
        <form action="{{ route('record.insert') }}" method="POST">
            <select name="food" required>
                <option value="" disabled selected>Select Food</option>
            @foreach ($food_list as $food)
                <option value="{{ $food->id }}">{{ $food->name }}</option>
            @endforeach
            @csrf
            <select name="emotion_before" required>
                <option value="" disabled selected>Select Emotion Before</option>
                <option value="happy">Happy</option>
                <option value="sad">Sad</option>
                <option value="angry">Angry</option>
                <option value="neutral">Neutral</option>
                <option value="bored">Bored</option>
            </select>
            <select name="emotion_after" required>
                <option value="" disabled selected>Select Emotion Before</option>
                <option value="happy">Happy</option>
                <option value="sad">Sad</option>
                <option value="angry">Angry</option>
                <option value="neutral">Neutral</option>
                <option value="bored">Bored</option>
            </select>
            <input type="submit" value="Submit">
        </form>
        @if ($errors)
            @foreach ($errors->all() as $error)
                <p style="color: red;">{{ $error }}</p>
            @endforeach
        @endif
    </body>
</html>