<?php

namespace Orchestra\Canvas\Console;

use Orchestra\Canvas\Core\Commands\GeneratorCommand;
use Orchestra\Canvas\Core\Concerns\ResolvesPresetStubs;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputOption;

#[AsCommand(name: 'make:class', description: 'Create a new class')]
class CodeMakeCommand extends GeneratorCommand
{
    use ResolvesPresetStubs;

    /**
     * The type of class being generated.
     */
    protected $type = 'Class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/class.stub');
    }

    /**
     * Resolve the default fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveDefaultStubPath($stub)
    {
        return __DIR__.$stub;
    }

    /**
     * Get the console command options.
     *
     * @return array<int, array>
     */
    protected function getOptions()
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Create the class even if the class already exists'],
        ];
    }
}
