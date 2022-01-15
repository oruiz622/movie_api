@extends('layouts.main')

@section('content')
    <!-- movie-info -->
    <div class="border-b border-gray-800 movie-info">
        <div class="container flex flex-col px-4 py-4 mx-auto md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt="parasite"
                class="w-64 lg:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400">
                    <svg class="w-4 text-orange-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">
                        <title>Star SVG icon</title>
                        <path d="M10,10L10,10L10,10z"></path>
                        <path
                            d="M531.3,72.6l124.5,350.4H990L717.3,628.8L814.8,990L531.3,773.5L247.8,990l97.5-361.2L72.6,422.9h334.2L531.3,72.6z">
                        </path>
                    </svg>
                    <span>star</span>
                    <span class="ml-1">{{ $movie['vote_average'] }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date']) }}</span>
                    <span class="mx-2">|</span>

                    <span>
                        {{ $movie['genres'] }}
                    </span>

                </div>
                <p class="mt-8 text-gray-300">
                    {{ $movie['overview'] }}
                </p>

                <div class="mt-12">

                    <h4 class="font-semibold text-white">Featured Crew</h4>

                    <div class="flex mt-4">

                        @foreach ($movie['crew'] as $crew)
                            <div class="mr-8">
                                <div>{{ $crew['name'] }}</div>
                                <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div x-data="{isOpen: false}">
                    @if (count($movie['videos']['results']) > 0)

                        <div class="mt-12">
                            <button @click="isOpen=true"
                                class="flex inline-flex items-center px-5 py-4 font-semibold text-gray-900 transition duration-150 ease-in-out bg-orange-500 rounded hover:bg-orange-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000">
                                    <title>Play SVG icon</title>
                                    <path
                                        d="M500,990C229.4,990,10,770.6,10,500C10,229.4,229.4,10,500,10c270.6,0,490,219.4,490,490C990,770.6,770.6,990,500,990z M500,122.1c-208.7,0-377.9,169.2-377.9,377.9c0,208.7,169.2,377.9,377.9,377.9c208.7,0,377.9-169.2,377.9-377.9C877.9,291.3,708.7,122.1,500,122.1z">
                                    </path>
                                    <path
                                        d="M360.9,658c0,5.7,2.9,11.2,8,14.4c5.2,3.2,11.4,3.3,16.5,0.7l316.1-158c5.6-2.8,9.4-8.5,9.4-15.1c0-6.7-3.8-12.4-9.4-15.2l-316.1-158c-5.1-2.5-11.3-2.4-16.5,0.7c-5.2,3.2-8,8.8-8,14.4L360.9,658L360.9,658z">
                                    </path>
                                </svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>

                    @endif

                    <!-- Modal -->
                    <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        style="background-color: rgba(0,0,0,0.5);"
                        class="fixed top-0 left-0 flex items-center w-full h-full overflow-y-auto shadow-lg">
                        <div class="container mx-auto overflow-y-auto rounded-lg lg:px-32">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pt-2 pr-4">
                                    <button @click="isOpen=false" x-transition.opacity
                                        class="text-3xl leading-none hover:text-gray-300">&times;</button>
                                </div>
                                <div class="px-8 py-8 modal-body">
                                    <div class="relative overflow-hidden responsive-container" style="padding-top: 56.25%">
                                        <iframe class="absolute top-0 left-0 w-full h-full responsive-iframe" height="315"
                                            width="560"
                                            src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}"
                                            style="border:0;" allow="autoplay; encrypted-media" frameborder="0"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                </div>

            </div>

        </div>
    </div><!-- end movie-info -->

    <!-- movie cast -->
    <div class="border-b border-gray-800 movie-cast">
        <div class="container px-4 py-16 mx-auto">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">

                @foreach ($movie['cast'] as $cast)

                    <div class="mt-8">
                        <a href="{{ route('actors.show', $cast['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }}"
                                alt="cast profile image" class="w-64 lg:w-96">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $cast['id']) }}" class="mt-2 text-lg hover:text-gray-300">
                                {{ $cast['name'] }}
                            </a>
                            <div class="text-sm text-gray-400">
                                {{ $cast['character'] }}
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div><!-- end movie cast -->


    <!-- movie images -->
    <div x-data="{isOpen: false, image: ''}" class="border-b border-gray-800 movie-images">
        <div class="container px-4 py-16 mx-auto">
            <h2 class="text-4xl font-semibold">
                Images
            </h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3 sm:grid-cols-2">

                @foreach ($movie['images'] as $image)

                    <div class="mt-8">
                        <a @click.prevent="isOpen = true image='{{ 'https://image.tmdb.org/t/p/original/' . $image['file_path'] }}'"
                            href="#">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" alt="poster image"
                                class="transition duration-150 ease-in-out hover:opacity-75">
                        </a>
                    </div>

                @endforeach

            </div>

            <!-- Images Modal -->
            <div x-show="isOpen" style="background-color: rgba(0,0,0,0.5)"
                class="fixed top-0 left-0 flex items-center w-full h-full overflow-y-auto shadow-lg">
                <div class="container mx-auto overflow-y-auto rounded-lg lg:px-2">
                    <div class="bg-gray-900 rounded">
                        <div class="flex justify-end pt-2 pr-4">
                            <button @click="isOpen=false" @keydown.escape.window="isOpen=false"
                                class="text-3xl leading-none hover:text-gray-300">&times;</button>
                        </div>
                        <div class="p-8 modal-body">

                            <img :src="image" alt="movie poster">

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Images Modal -->

        </div>
    </div><!-- end movie images -->

@endsection
