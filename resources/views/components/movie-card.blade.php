<div class="mt-8">
    <a href="{{ route('movies.show', $movie['id']) }}">
        <img src="{{ $movie['poster_path'] }}" alt="poster"
            class="transition duration-150 ease-in-out hover:opacity-75">
    </a>

    <div class="mt-2">
        <a href="{{ route('movies.show', $movie['id']) }}"
            class="mt-2 text-sm hover:text-gray-300">{{ $movie['title'] }}</a>
        <div class="flex items-center text-gray-400">
            <svg class="w-4 text-orange-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">
                <title>Star SVG icon</title>
                <path d="M10,10L10,10L10,10z"></path>
                <path
                    d="M531.3,72.6l124.5,350.4H990L717.3,628.8L814.8,990L531.3,773.5L247.8,990l97.5-361.2L72.6,422.9h334.2L531.3,72.6z">
                </path>
            </svg>
            <span>Star</span>
            <span class="ml-1">{{ $movie['vote_average'] }}</span>
            <span class="mx-2">|</span>
            <span class="text-sm">{{ $movie['release_date'] }}</span>
        </div>
        <div class="text-sm text-gray-400">
            {{ $movie['genres'] }}
        </div>
    </div>
</div>
