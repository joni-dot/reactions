<?php

namespace JoniDot\Reactions\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Reactions extends Component
{
    public $model;

    public function mount(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Render Reactions component and show model related reactions.
     *
     * @return void
     */
    public function render()
    {
        return view('reactions::livewire.reactions', [
            'reactions' => collect(),
            'reactionCounts' => $this->model->reactionCounts(),
        ]);
    }

    /**
     * Validate reactions and add it for model.
     *
     * @return void
     */
    public function react(string $reaction): void
    {
        $this->model->react($reaction);
    }
}
