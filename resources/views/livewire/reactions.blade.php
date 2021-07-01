<div>
    @foreach(config('reactions.default_reactions') as $reaction) 
        <button>{{ $reaction }}</button>
    @endforeach
</div>