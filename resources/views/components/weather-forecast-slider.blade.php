@props(['forecast'])

<div class="mt-6">
    <h4 class="text-lg font-bold mb-2">📅 7-Day Forecast</h4>

    <div x-data="{ scrollLeft() { $refs.carousel.scrollLeft -= 200 }, scrollRight() { $refs.carousel.scrollLeft += 200 } }" class="relative">
        <button @click="scrollLeft" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow px-2 py-1 rounded z-10">◀️</button>

        <div class="flex overflow-x-auto space-x-4 px-8 py-2" x-ref="carousel">
            @foreach ($forecast['time'] as $i => $day)
                <div class="min-w-[120px] bg-white rounded-lg shadow p-2 text-center">
                    <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($day)->format('D, M j') }}</p>
                    <div class="text-3xl my-1"><img src="{{ $forecast['icons'][$i] }}" alt=""></div>
                    <p class="text-sm"><img src="{{ asset('icons/weather/thermometer.svg') }}" alt="temperature">{{ $forecast['temperature_2m_min'][$i] }}° / {{ $forecast['temperature_2m_max'][$i] }}°</p>
                </div>
            @endforeach
        </div>

        <button @click="scrollRight" class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow px-2 py-1 rounded z-10">▶️</button>
    </div>
</div>
