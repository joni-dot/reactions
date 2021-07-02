<?php

namespace JoniDot\Reactions\Models\Traits;

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
            'user_id' => 1,
            'type' => $reaction,
        ]);
    }
}
