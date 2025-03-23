@props(['city', 'weather'])

<div class="mt-6 p-4 rounded-lg bg-gray-100 text-center space-y-2">
    <h3 class="text-xl font-semibold">{{ ucfirst($city) }}</h3>

    <div class="text-5xl">
        <img src="{{ $weather['icon'] }}" alt="current-weather">
    </div>

    <p class="text-lg">
       <div>
            <img src="{{ asset('icons/weather/thermometer.svg') }}" alt="temperature">
            <strong>{{ $weather['temperature'] }}</strong>
        </div>

        <div>
            <img src="{{ asset('icons/weather/wind.svg') }}" alt="wind">
            <strong>{{ $weather['windspeed'] }} mph</strong>
        </div>
    </p>

    <p class="text-sm text-gray-600">
        <img src="{{ asset('icons/weather/barometer.svg') }}" alt="barometer">
        {{ \Carbon\Carbon::parse($weather['time'])->format('D, M j') }}
    </p>
</div>
