<?php

namespace Champion;

use Champion\Exceptions\BaseException;

class ChampionApi
{
    private static $apiKey;

    public static function setApiKey($key)
    {
        self::$apiKey = $key;
    }

    public static function getApiKey()
    {
        if (! isset(self::$apiKey)) {
            throw new BaseException("Please set your Champion.gg API key");
        }

        return self::$apiKey;
    }
}
