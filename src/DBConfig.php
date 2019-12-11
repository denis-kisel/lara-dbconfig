<?php

namespace DenisKisel\DBConfig;

class DBConfig
{
    public static function put($key, $value)
    {
        SettingsModel::updateOrInsert(['key' => $key], [
            'key' => $key,
            'value' => serialize($value)
        ]);
    }

    public static function get($key, $default = null)
    {
        return SettingsModel::whereKey($key)->first()->value ?? $default;
    }

    public static function has($key)
    {
        return (!is_null(SettingsModel::whereKey($key)->first()));
    }

    public static function forget($key)
    {
        SettingsModel::whereKey($key)->delete();
    }
}
