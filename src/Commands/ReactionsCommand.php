<?php

namespace JoniDot\Reactions\Commands;

use Illuminate\Console\Command;

class ReactionsCommand extends Command
{
    public $signature = 'reactions';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
