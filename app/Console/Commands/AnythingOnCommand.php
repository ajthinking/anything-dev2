<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Archetype\Facades\PHPFile;

class AnythingOnCommand extends Command
{
    protected $signature = 'anything:on';
    protected $description = 'Allow anything mode by modifying bootstrap/app.php';
	protected $alreadyInAnythingMode = 'Could not find the defult application in bootstrap/app.php. Already in Anything mode?';
	public $defaultApplication = \Illuminate\Foundation\Application::class;
	public $anythingApplication = \App\AnythingApplication::class;

    public function handle()
    {
		PHPFile::load('bootstrap/app.php')
			->astQuery()
			->name()
			->where('parts', explode('\\', $this->defaultApplication))
			->replaceProperty('parts', explode('\\', $this->anythingApplication))			
			->end()
			->save();

		$this->newLine() && $this->info('Using AnythingApplication in bootstrap/app.php');

		$this->call('cache:clear');

		$this->info('Anything mode turned ON 🟢');

        return 0;
    }
}
