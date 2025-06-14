<div id="{{ $id }}" class="emotion-selector w-full h-20 bg-brown-light rounded-full text-center mb-10">
    <input type="text" name="emotion-{{ $id }}" class="hidden" value="">
    <div class="selection inline-block">
        <img src="{{ asset('images/emotions/happy.png') }}" name="happy" class=" m-1 cursor-pointer">
        <span class="hidden bg-chocolate text-white p-3 rounded-full">{{ __('emotions.happy') }}</span>
    </div>
    <div class="selection inline-block">
        <img src="{{ asset('images/emotions/neutral.png') }}" name="neutral" class="m-1  cursor-pointer">
        <span class="hidden bg-chocolate text-white p-3 rounded-full">{{ __('emotions.neutral') }}</span>
    </div>
    <div class="selection inline-block">
        <img src="{{ asset('images/emotions/bored.png') }}" name="bored" class="m-1 cursor-pointer">
        <span class="hidden bg-chocolate text-white p-3 rounded-full">{{ __('emotions.bored') }}</span>
    </div>
    <div class="selection inline-block">
        <img src="{{ asset('images/emotions/sad.png') }}" name="sad" class="m-1 cursor-pointer">
        <span class="hidden bg-chocolate text-white p-3 rounded-full">{{ __('emotions.sad') }}</span>
    </div>
    <div class="selection inline-block">
        <img src="{{ asset('images/emotions/angry.png') }}" name="angry" class="m-1  cursor-pointer">
        <span class="hidden bg-chocolate text-white p-3 rounded-full">{{ __('emotions.angry') }}</span>
    </div>
</div>