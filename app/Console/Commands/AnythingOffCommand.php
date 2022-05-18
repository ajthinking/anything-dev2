<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Archetype\Facades\PHPFile;

class AnythingOffCommand extends Command
{
    protected $signature = 'anything:off';
    protected $description = 'Reverts anything mode by restoring bootstrap/app.php';
	public $defaultApplication = \Illuminate\Foundation\Application::class;
	public $anythingApplication = \App\AnythingApplication::class;

    public function handle()
    {
		PHPFile::load('bootstrap/app.php')
			->astQuery()
			->name()
			->where('parts', explode('\\', $this->anythingApplication))
			->replaceProperty('parts', explode('\\', $this->defaultApplication))
			->end()
			->save();
		
		$this->newLine() && $this->info('Restored bootstrap/app.php');
		
		$this->call('cache:clear');
				
		$this->info('Anything mode turned OFF 🔴');		

        return 0;
    }
}
