<?php

namespace Khapu\VNRepository;

use Illuminate\Support\ServiceProvider;
use Khapu\VNRepository\Console\Commands\VNRepositoryCommand;
use Khapu\VNRepository\Console\Commands\CriterionCommand;

class PackageServiceProvider extends ServiceProvider
{
    protected const MODULE_PATH =  __DIR__ . '/';

    protected $command = [
        VNRepositoryCommand::class,
        CriterionCommand::class,
    ];

    private function _command()
    {
        if ($this->app->runningInConsole()) {
            $this->commands($this->command);
        }
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->_command();
    }
}
