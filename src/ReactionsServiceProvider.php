<?php

namespace JoniDot\Reactions;

use JoniDot\Reactions\Commands\ReactionsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use JoniDot\Reactions\Http\Livewire\Reactions;
use Livewire\Livewire;

class ReactionsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('reactions')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(ReactionsCommand::class);
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function packageBooted()
    {
        Livewire::component('reactions::reactions', Reactions::class);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
