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
     * Render Comments component and show model related reactions.
     *
     * @return void
     */
    public function render()
    {
        return view('comments::livewire.reactions', [
            'reactions' => $this->model->reactions()->get(),
        ]);
    }

    /**
     * Validate reactions and add it for model.
     *
     * @return void
     */
    public function react($reaction)
    {
        $this->model->toggleReaction(reaction);
    }
}
