<?php


namespace DenisKisel\DBConfig;


use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    public function getValueAttribute()
    {
        return unserialize($this->attributes['value']);
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = serialize($value);
    }

    public function setTable($table)
    {
        return config('dbconfig.table', 'settings');
    }
}
