@extends('layouts.main')

@section('content')
    <div class="container px-4 py-16 mx-auto">
        {{-- Popular Actors --}}
        <div class="popular-actors">
            <div class="text-lg font-semibold tracking-wide text-orange-500 uppercase">Popular Actors</div>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">

                @foreach ($popularActors as $actor)

                    <div class="mt-8 actor">
                        <a href="{{ route('actors.show', $actor['id']) }}"><img src="{{ $actor['profile_path'] }}"
                                alt="profile image" class="transition duration-150 ease-in-out hover:opacity-75">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $actor['id']) }}"
                                class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                            <div class="text-sm text-gray-400 truncate">
                                {{ $actor['known_for'] }}
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
        {{-- End Popular Actors --}}

        <div class="flex justify-between mt-16">
            @if ($previous)
                <div class="flex justify-between mt-16">
                    <a href="/actors/page/{{ $previous }}">Previous</a>
                </div>
            @else
                <div></div>
            @endif

            @if ($next)
                <div class="flex justify-between mt-16">
                    <a href="/actors/page/{{ $next }}">Next</a>
                </div>
            @else
                <div></div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')

    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js">
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll(elem, {
            // options
            path: '/actors/page/@{{ # }}',
            append: '.actor',
            history: false,
            loadOnScroll: true,
        });

        // // element argument can be a selector string
        // //   for an individual element
        // let infScroll = new InfiniteScroll('.grid', {
        //     // options
        // });
    </script>
@endsection
