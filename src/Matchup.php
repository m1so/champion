<?php

namespace Champion;

class Matchup
{
    public static function info($as, $vs)
    {
        return Client::get("champion/${as}/matchup/${vs}");
    }
}
