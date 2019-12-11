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
        return SettingsModel::where('key', '=', $key)->first()->value ?? $default;
    }

    public static function has($key)
    {
        return (!is_null(SettingsModel::whereKey($key)->first()));
    }

    public static function forget($key)
    {
        SettingsModel::where('key', '=', $key)->delete();
    }

    public static function increment($key, $amount = 1)
    {
        $data = self::get($key);
        $data = (int)$data + $amount;
        self::put($key, $data);
    }

    public static function decrement($key, $amount = 1)
    {
        $data = self::get($key);
        $data = (int)$data - $amount;
        self::put($key, $data);
    }
}
