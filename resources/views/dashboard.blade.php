@extends('layouts.home')

@section('title', __('sidebar.dashboard'))

@section('home-content')
<div class="dashboard-container h-screen p-20 flex gap-2 w-full">
    <div class="flex flex-col gap-2 w-[50%]">
        <div class="content-container bg-white rounded-xl border-5 border-molasses-dark p-5">
            <p class="font-bold text-xl text-center">{{ __('dashboard.consumption') }}</p>
            <p id="consumption" class="font-bold text-4xl m-3">{{ (int) $user->getSugarConsumptionToday() }}{{ __('dashboard.gram') }}</p>
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
        <p class="text-xl font-bold text-center">{{ __('dashboard.note_head') }}</p>
        <form>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
</script>
@endsection