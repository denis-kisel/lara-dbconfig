<?php


namespace DenisKisel\DBConfig;


use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    public function __construct(array $attributes = [])
    {
        $this->table = config('dbconfig.table', 'settings');
        parent::__construct($attributes);
    }

    public function getValueAttribute()
    {
        return unserialize($this->attributes['value']);
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = serialize($value);
    }
}
