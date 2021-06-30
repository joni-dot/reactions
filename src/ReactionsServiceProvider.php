<?php

namespace JoniDot\Reactions;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use JoniDot\Reactions\Commands\ReactionsCommand;

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
            ->hasMigration('create_reactions_table')
            ->hasCommand(ReactionsCommand::class);
    }
}
