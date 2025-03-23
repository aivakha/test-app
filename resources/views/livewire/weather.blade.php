<div x-data="{ loading: @entangle('loading') }" class="c-weather max-w-md mx-auto p-6 bg-white rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-center">
        <img src="{{ asset('icons/weather/weather-logo.svg') }}" alt="weather-logo">
        Weather App Component
    </h2>

    <input
        type="text"
        class="border w-full px-4 py-2 rounded-md mb-2"
        placeholder="Enter city..."
        wire:model.defer="city"
        @keydown.enter="loading = true; $wire.getWeather()"
    >

    <button
        class="bg-blue-600 text-white w-full py-2 rounded hover:bg-blue-700 transition"
        wire:click="getWeather"
        wire:loading.attr="disabled"
        x-bind:disabled="loading"
    >
        <span wire:loading.remove>Get Weather</span>
        <span wire:loading>Loading...</span>

        <div wire:loading>
            <x-weather-loader />
        </div>
    </button>

    @if ($error)
        <p class="text-red-500 mt-4 text-center">{{ $error }}</p>
    @endif

    @if ($weather)
        <x-weather-card :city="$city" :weather="$weather" />
    @endif

    @if ($dailyForecast)
        <x-weather-forecast-slider :forecast="$dailyForecast" />
    @endif
</div>
