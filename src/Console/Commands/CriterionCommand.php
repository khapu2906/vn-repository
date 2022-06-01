<?php

namespace Khapu\VNRepository\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class CriterionCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:criterion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Criterion';

    protected $type = 'Criterion';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/criterial.php.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Criterions';
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

        $this->doOtherOperations();
        return 0;
    }
}
