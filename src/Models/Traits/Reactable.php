<?php

namespace JoniDot\Reactions\Models\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use JoniDot\Reactions\Models\Reaction;

trait Reactable
{
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactable');
    }

    public function react(string $reaction): void
    {
        $existingReaction = Reaction::query()
            ->where('type', $reaction)
            ->where('reactable_type', $this->getMorphClass())
            ->where('reactable_id', $this->id)
            ->first();

        if ($existingReaction) {
            $existingReaction->delete();

            return;
        }

        $this->reactions()->create([
            'user_id' => Auth::id(),
            'type' => $reaction,
        ]);
    }

    /**
     * Get counts pf reactions and return them as collection.
     */
    public function reactionCounts(): Collection
    {
        return $this->reactions()
            ->select('type')
            ->selectRaw('COUNT(id) as reaction_count')
            ->where('reactable_type', $this->getMorphClass())
            ->where('reactable_id', $this->id)
            ->groupBy('type')
            ->get();
    }
}
