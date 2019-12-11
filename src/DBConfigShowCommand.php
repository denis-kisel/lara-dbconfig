<?php


namespace DenisKisel\DBConfig;

use Illuminate\Console\Command;

class DBConfigShowCommand extends Command
{
    protected $signature = 'dbconfig:show {--key=}';

    public function handle()
    {
        if ($this->option('key')) {
            dump(DBConfig::get($this->option('key')));
        } else {
            dump(SettingsModel::all()->pluck('value', 'key'));
        }
    }
}
