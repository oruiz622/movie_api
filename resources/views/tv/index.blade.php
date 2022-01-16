@extends('layouts.main')

@section('content')
    <div class="container px-4 pt-16 mx-auto">
        <div class="popular-tv">
            <h2 class="text-lg font-semibold tracking-wider text-orange-500 uppercase">Popular Shows</h2>
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">

                @foreach ($popularTV as $tvShow)
                    <x-tv-card :tvShow="$tvShow" />
                @endforeach

            </div>
        </div><!-- end popular tv -->

        <div class="py-24 now-playing-tv">
            <h2 class="text-lg font-semibold tracking-wider text-orange-500 uppercase">Top Playing Shows</h2>
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">

                @foreach ($topRatedTV as $tvShow)
                    <x-tv-card :tvShow="$tvShow" />
                @endforeach

            </div>
        </div><!-- end now playing tv -->

    </div>
@endsection
