<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GeneratorMvc extends Command
{
    protected $signature = 'generate:mvc {name}
        {-m|--migration?}
        {-r|--request?}
        {-c|--controller?}
        {-v|--view?}';
    protected $description = 'Generate MVC components (model, migration, controller, view) for the given name';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $name = $this->argument('name');

        if ($this->argument('migration')) {
            $this->call('make:model', ['name' => $name, '-migration' => true]);
        } else {
            $this->call('make:model', ['name' => $name]);
        }

        if ($this->argument('request')) {
            $this->call('make:request', ['name' => $name . 'Request']);
        }

        if ($this->argument('controller')) {
            $this->call('make:controller', ['name' => $name . 'Controller']);
        }

        if ($this->argument('view')) {
            $viewFolder = strtolower($name);
            $viewPath = resource_path('views/' . $viewFolder);

            if (!File::exists($viewPath)) {
                File::makeDirectory($viewPath, 0755, true);
            }

            $views = ['index', 'show', 'edit', 'update'];

            foreach ($views as $view) {
                $viewContent = $this->generateView($view, $name);
                File::put($viewPath . '/' . $view . '.blade.php', $viewContent);
            }
        }

        $this->info('MVC components for {name} generated successfully.');
    }

    protected function generateView(string $view, string $name): string
    {
        return match ($view) {
            'index' => "<!-- View for listing {$name} -->\n\n@foreach (\${$name}s as \${$name})\n    <p>{{ \${$name}->name }}</p>\n@endforeach",
            'show' => "<!-- View for showing {$name} -->\n\n<p>{{ \${$name}->name }}</p>",
            'edit' => "<!-- View for editing {$name} -->\n\n<form action=\"{{ route('{$name}.update', \${$name}->id) }}\" method=\"POST\">\n    @csrf\n    @method('PUT')\n    <input type=\"text\" name=\"name\" value=\"{{ \${$name}->name }}\">\n    <button type=\"submit\">Save</button>\n</form>",
            'update' => "<!-- View for updating {$name} -->\n\n<p>{{ \${$name}->name }} has been updated.</p>",
            default => "<!-- View for {$name} -->",
        };
    }
}
