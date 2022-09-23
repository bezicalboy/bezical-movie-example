@extends('layouts.main')

@section('content')

    <div class="tv-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ $tvshow['poster_path'] }}" alt="poster" class="w-64 md:w-96 object-scale-down">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $tvshow['name']}}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <span>
                    <svg version="1.1" id="Layer_1" class="w-4 fill-current text-orange-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 280.124 280.124" style="enable-background:new 0 0 280.124 280.124;" xml:space="preserve">
                   <g>
                       <path style="fill:#F4B459;" d="M280.124,106.914l-92.059-6.598L140.057,4.441l-48.55,95.874L0,106.914l61.282,74.015
                           l-17.519,94.754l96.294-43.614l96.294,43.606l-17.799-94.754C218.553,180.919,280.124,106.914,280.124,106.914z"/>
                       <polygon style="fill:#E3A753;" points="236.352,275.683 218.553,180.92 280.071,106.975 280.071,106.905 188.065,100.315
                           140.057,4.441 140.057,232.068 	"/>
                   </g>
                   </svg></span>
                    <span class="ml-1">{{ $tvshow['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ ($tvshow['first_air_date']) }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        {{ $tvshow['genres']}}
                    </span>
                </div>

                <p class="text-gray300 mt-8">
                    {{ $tvshow['overview']}}
                </p>

                <div class="mt-12">
                    <div class="flex mt-4">
                        @foreach ($tvshow['created_by'] as $crew)
                        <div class="mr-8">
                            <div>{{ $crew['name']}}</div>
                            <div class="text-sm text-gray-400">Creator</div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div x-data="{ isOpen: false }">
                    @if (count($tvshow['videos']['results']) > 0)
                        <div class="mt-12">
                            <button
                                @click="isOpen = true"
                                class="flex inline-flex items-center bg-teal-500 text-zinc-900 rounded font-semibold px-5 py-4 hover:bg-teal-600 transition ease-in-out duration-150"
                            >
                                <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>

                        <template x-if="isOpen" >
                            <div
                                style="background-color: rgba(0, 0, 0, .5);"
                                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                            >
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div class="bg-zinc-900 rounded ">
                                        <div class="flex justify-end pr-4 pt-2">
                                            <button
                                                @click="isOpen = false"
                                                @keydown.escape.window="isOpen = false"
                                                class="text-3xl leading-none hover:text-gray-300">&times;
                                            </button>
                                        </div>
                                        <div class="modal-body px-8 py-8 ">
                                            <div class="responsive-container overflow-hidden relative " style="padding-top: 56.25%" >
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full " src="https://www.youtube.com/embed/{{ $tvshow['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen ></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    @endif


                </div>

            </div>
        </div>
    </div>
    {{-- end tv info --}}
    <div class="tvshow-cast border-b border-zinc-900">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                @foreach ($tvshow['cast'] as $cast)
                <div class="mt-8">
                    <a href="{{ route('actors.show', $cast['id'])}}">
                        <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$cast['profile_path'] }}" alt="profile" class="hover:opacity-75 transition ease-in-out duration-200 object-cover w-full md:w-auto h-[400px]">
                    </a>
                    <div class="mt-2">
                        <a href="{{ route('actors.show', $cast['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name']}}</a>
                        <div class="flex text-gray-400 text-md">
                            <span>{{$cast['character']}}</span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
    </div>
    </div>
    {{-- end cast --}}
    <div class="tv-images" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($tvshow['images'] as $image)
                <div class="mt-8">
                    <a @click.prevent="
                    isOpen = true
                    image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'
                "
                href="#"
            >
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="images" class="hover:opacity-75 transition ease-in-out duration-200">
                    </a>

                    </div>
                @endforeach

            </div>
            <div
            style="background-color: rgba(0, 0, 0, .5);"
            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
            x-show="isOpen"
        >
            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                <div class="bg-zinc-900 rounded">
                    <div class="flex justify-end pr-4 pt-2">
                        <button
                            @click="isOpen = false"
                            @keydown.escape.window="isOpen = false"
                            class="text-3xl leading-none hover:text-gray-300">&times;
                        </button>
                    </div>
                    <div class="modal-body px-8 py-8">
                        <img :src="image" alt="poster">
                    </div>
                </div>
            </div>
        </div>
         </div>
    </div>

@endsection
