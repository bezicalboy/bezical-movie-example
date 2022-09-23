{{-- popular --}}
<div class="mt-8">
    <a href="{{ route('movies.show', $movie['id'])}}">
        <img src="{{ $movie['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-200">
    </a>
    <div class="mt-2">
        <a href="{{ route('movies.show', $movie['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{ $movie['title']}}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
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
            <span class="ml-1">{{ $movie['vote_average'] }}</span>
            <span class="mx-2">|</span>
            <span>{{ ($movie['release_date']) }}</span>
        </div>
        <div class="text-gray-400 text-sm mt-1">{{ $movie['genres'] }}</div>
    </div>
</div>
{{-- now playing --}}

