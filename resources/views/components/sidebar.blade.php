<div class="block sidebar h-full w-[20%] bg-molasses-saturated p-10">
    <li class="list-none text-chocolate font-bold text-3xl">
@foreach ($routes as $name => $route)
        <ul class="hover:border-b-5 m-5
        @if(strtolower($name) === strtolower ($currentPage))
        border-b-5
        text-center
        @endif
        ">
            <a href="{{ $route }}" class="
            @if(strtolower($name) === strtolower ($currentPage))
            @endif
            ">{{ $name }}</a>
        </ul>
@endforeach
    </li>
</div>