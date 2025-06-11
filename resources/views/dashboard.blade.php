<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body class="">
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="header">
        <h1>Dashboard</h1>
    </div>
    <div class="body">
        <div class="content-card">
            <h3>Konsumsi Gula Hari ini</h3>
            <h1 id='sugar-consumption'></h1>
            <h4>dari batas {{  (int) $user->userData->getMaxConsumption()  }}g</h4>
            <div id="progress-bar" style="width: 273px; height: 12px; border-radius: 10px;"> 
                <div id="progress" style="border-radius:10px; height:100%;"></div>
                <div id="progress-legend-container" style="width: 100%; display:flex; justify-content: space-between; color: #000000;">
                    <div class="progress-legend">0</div>
                    <div class="progress-legend">{{ (int)($user->userData->getMaxConsumption() / 2) }}</div>
                    <div class="progress-legend">{{ (int)$user->userData->getMaxConsumption() }}</div>
                </div>
            </div>
        </div>
        <div class="content-card">
            <form id="rec-form" action="javascript:void(0);" onsubmit="addRec()">
                <h3>Apa yang Anda makan?</h3>
                <select name="food" required>
                    <option value="" selected disabled>Pilih makanan</option>
                    @foreach ($food_list as $food)
                        <option value="{{ $food->id }}">{{ $food->name }}</option>
                    @endforeach
                </select>
                <h3>Apa yang anda rasakan sebelum makan?</h3>
                <select name="emotion_before" required>
                    @section("emotion_selector")
                    <option value="" selected disabled>Pilih emosi</option>
                    <option value="excited">Bersemangat</option>
                    <option value="happy">Senang</option>
                    <option value="neutral">Biasa</option>
                    <option value="sad">Sedih</option>
                    <option value="angry">Marah</option>
                    @endsection
                    @yield("emotion_selector")
                </select>
                <h3>Apa yang anda rasakan setelah makan?</h3>
                <select name="emotion_after" required>
                    @yield("emotion_selector")
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
<script src="{{ asset('js/global.js') }}"></script>
<script>
    refreshConsumption();
    async function addRec() {
        const form = document.getElementById('rec-form');
        const submitter = form.querySelector('input[type="submit"]');
        const formData = new FormData(form, submitter);
        const response = await postForm('{{ route('record.insert') }}', formData);

        if (response['status'] === 'success') {
            refreshConsumption();
        } else {
        }
    }
    async function refreshConsumption() {
        const response = await getJson('{{ route('statistic.today_consumption') }}');

        if (response['status'] === 'success') {
            const sugar = response['data']['sugar'];
            const sugarPercentage = sugar / {{ $user->userData->getMaxConsumption() }} * 100;

            var progressBar = document.getElementById('progress');
            var progressBarContainer = document.getElementById('progress-bar');
            var sugarConsumptionContainer = document.getElementById('sugar-consumption');

            sugarConsumptionContainer.innerHTML = sugar + 'g';

            progressBar.style.width = (sugarPercentage <= 100 ? sugarPercentage : 100) + '%';

            progressBarContainer.style.backgroundColor = sugarPercentage >= 75 ? "#ECE7E7" : "#E7ECEB";
            progressBar.style.backgroundColor = sugarPercentage >= 75 ? "#912424" : "#249190";
        }
    }
</script>
</html>