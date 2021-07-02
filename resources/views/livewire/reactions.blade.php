<div>
    @foreach(config('reactions.default_reactions') as $reaction) 
        <button 
            class="bg-gray-500 py-2 px-4 shadow rounded mr-2 hover:bg-gray-600"
            wire:click="react('{{ $reaction }}')"
        >
            <span class="mr-2">
                {!! config("reactions.reaction_emojies.$reaction") !!}
            </span> 
            <span class="rounded-xl text-sm text-white font-extrabold">
                @if ($reactionCounts->where('type', $reaction)->first())
                    {{ $reactionCounts->where('type', $reaction)->first()->reaction_count }}
                @else 
                    0
                @endif
            </span>
        </button>
    @endforeach
</div>