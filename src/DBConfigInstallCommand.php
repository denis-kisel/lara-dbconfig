<?php


namespace DenisKisel\DBConfig;


use Illuminate\Console\Command;
use Illuminate\Support\Str;

class DBConfigInstallCommand extends Command
{
    protected $signature = 'dbconfig:install';

    public function handle()
    {
        $tableName = config('dbconfig.table', 'settings');
        $path = database_path('/migrations/' . date('Y_m_d_His')) . "_create_{$tableName}_table.php";
        copy(__DIR__ . '/../resources/migration.stub', $path);

        $content = file_get_contents($path);
        $content = str_replace('{tableName}', $tableName, $content);
        $content = str_replace('{className}', 'Create' . Str::studly($tableName) . 'Table', $content);
        file_put_contents($path, $content);

        $this->info("Migration for {$tableName} table is created!");
        $this->call('migrate');
    }
}
