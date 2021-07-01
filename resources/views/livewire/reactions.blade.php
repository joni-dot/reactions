<div>
    @foreach(config('reactions.default_reactions') as $reaction) 
        <button class="bg-gray-300 py-2 px-4 shadow rounded mr-2">{{ $reaction }}</button>
    @endforeach
</div>