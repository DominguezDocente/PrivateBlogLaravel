<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SeedPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ejecuta el seeder de permisos';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Ejecutando PermissionSeeder...');

        Artisan::call('db:seed', [
            '--class' => 'PermissionSeeder',
        ]);

        $this->info(Artisan::output());

        return 0;
    }
}
