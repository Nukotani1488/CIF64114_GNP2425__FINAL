@extends('layouts.home')

@section('title', __('sidebar.dashboard'))

@section('home-content')
<div class="dashboard-container h-screen p-20 flex gap-2 w-full">
    <div class="flex flex-col gap-2 w-[50%]">
        <div class="content-container bg-white rounded-xl border-5 border-molasses-dark p-5">
            <p class="font-bold text-2xl text-center">{{ __('dashboard.consumption') }}</p>
            <p id="consumption" class="font-bold text-6xl m-3">{{ (int) $user->getSugarConsumptionToday() }}{{ __('dashboard.gram') }}</p>
            <p>{{ __('dashboard.limit') }} {{ (int) $user->userData->getMaxConsumption() }}{{ __('dashboard.gram') }}</p>
            <div class="slider w-full">
                <input disabled type="range" min="0"
                class="w-full"
                max="{{ (int) $user->userData->getMaxConsumption() }}"
                value="{{ $user->getSugarConsumptionToday() }}">
            </div>
              <div class="flex justify-between text-sm text-gray-600">
                <span>0</span>
                <span>{{ (int) $user->userData->getMaxConsumption() / 2 }}</span>
                <span>{{ (int) $user->userData->getMaxConsumption() }}</span>
            </div>
        </div>
        <div class="content-container h-full bg-white rounded-xl border-5 border-molasses-dark p-5">
        </div>
    </div>
    <div class="content-container bg-white rounded-xl border-5 border-molasses-dark p-5 w-[50%]">
        <p class="text-2xl font-bold text-center m-2">{{ __('dashboard.note_head') }}</p>
        <form id="data-form" class="flex-col justify-between h-full">
            <div class="w-64 mx-auto">
            <input
                type="text"
                name="name"
                id="searchInput"
                placeholder="Search..."
                class="lock w-full p-2 border-3 border-molasses-dark focus:border-chocolate rounded">

            <ul id="results" class="border border-gray-300 rounded max-h-40 overflow-y-auto hidden">
            </ul>
            <input type="text" name="food">
            <p id="selectedText" class="mt-2 text-sm text-gray-600"></p>
            </div>
            <p class="text-center font-bold m-3">{{ __('dashboard.feeling_before') }}</p>
            <x-emotion-selector id="before"></x-emotion-selector>
            <p class="text-center font-bold m-3">{{ __('dashboard.feeling_after') }}</p>
            <x-emotion-selector id="after"></x-emotion-selector>
            <x-form-inputs type="submit" placeholder="{{ __('dashboard.note') }}"></x-form-inputs>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src={{ asset('js/emotion-selector.js') }} type="module"></script>
<script type="module">

  $('#searchInput').on('input', function () {
    const value = $(this).val().toLowerCase();
    const $results = $('#results');
    $results.empty();

    if (!value) {
      $results.addClass('hidden');
      return;
    }


    sendForm($(this), "{{ route('food.search') }}", function(message) {
        let filtered = JSON.parse(message.items);

        if (Object.keys(filtered).length) {
        $results.removeClass('hidden');
        filtered.forEach(item => {
            const $li = $('<li></li>')
            .text(item.name)
            .addClass('px-3 py-2 hover:bg-blue-100 cursor-pointer')
            .on('click', function () {
                $('#searchInput').val(item.name);
                $results.addClass('hidden');
                $('#selectedText').text(`Selected: ${item.name}`);
                $('#selectedText').attr('fid', `${item.id}`);
                $('input[name=food]').attr('value', `${item.id}`);
            });
            $results.append($li);
        });
        } else {
            $results.addClass('hidden');
        }
    }, function(){});
});


  $(document).on('click', function (e) {
    if (!$(e.target).closest('#searchInput, #results').length) {
      $('#results').addClass('hidden');
    }
  });

    function successCallback(message) {
        $('.alert').css('display', 'block');
        $('.alert-content').html(message.message);
    }

    function errorCallback(message) {
        $('.alert').css('display', 'block');
        $('.alert-content').html(message.responseJSON.message);
    }

    $('#data-form').on('submit', function(e) {
        e.preventDefault();
        sendForm($(this), "{{ route('record.insert') }}", successCallback, errorCallback);
    })
</script>
@endsection