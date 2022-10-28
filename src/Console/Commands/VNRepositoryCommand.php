<?php

namespace Khapu\VNRepository\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class VNRepositoryCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:repository';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a VNRepository';

    protected $type = 'Repository';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/repository.php.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }

    protected function doOtherOperations()
    {
        $class = $this->qualifyClass($this->getNameInput());

        $path = $this->getPath($class);

        $content = file_get_contents($path);

        file_put_contents($path, $content);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        parent::handle();

        return 0;
    }
}
