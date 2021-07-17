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
                    <span wire:loading.remove wire:target="react('{{ $reaction }}')">
                        {{ $reactionCounts->where('type', $reaction)->first()->reaction_count }}
                    </span>
                @else 
                    <span wire:loading.remove wire:target="react('{{ $reaction }}')">
                        0
                    </span>
                @endif
                <span wire:loading wire:target="react('{{ $reaction }}')">
                    @svg('refresh', 'animate-spin fill-current w-4 h-4 mr-1 ml-0 inline')
                </span>
            </span>
        </button>
    @endforeach
</div>