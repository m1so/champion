<?php

namespace Champion;

class Stats
{
    const ROLE_MOST_IMPROVED = 'mostImproved';
    const ROLE_LEAST_IMPROVED = 'leastImproved';
    const ROLE_LEAST_WINNING = 'leastWinning';
    const ROLE_MOST_WINNING = 'mostWinning';
    const ROLE_WORST_PERFORMANCE = 'worstPerformance';
    const ROLE_BEST_PERFORMANCE = 'bestPerformance';

    const CHAMPION_MOST_BANNED = 'mostBanned';
    const CHAMPION_LEAST_WINNING = 'leastWinning';
    const CHAMPION_LEAST_PLAYED = 'leastPlayed';
    const CHAMPION_MOST_PLAYED = 'mostPlayed';
    const CHAMPION_MOST_WINNING = 'mostWinning';
    const CHAMPION_BEST_RATED = 'bestRated';
    const CHAMPION_WORST_RATED = 'worstRated';

    public static function byRole($role, $flag = "", $page = null, $limit = null)
    {
        if (! in_array($flag, self::rolesFlags())) {
            throw new \InvalidArgumentException("Unsupported flag passed to Stats::byRole");
        }

        return Client::get("stats/role/${role}/${flag}", $page, $limit);
    }

    public static function byChampion($champion)
    {
        return Client::get("stats/champs/${champion}");
    }

    public static function champs($flag, $page = 1, $limit = 10)
    {
        if (! in_array($flag, self::champsFlags())) {
            throw new \InvalidArgumentException("Unsupported flag passed to Stats::champs");
        }

        return Client::get("stats/champs/${flag}", $page, $limit);
    }

    public static function all()
    {
        return Client::get("stats");
    }

    public static function allRoles()
    {
        return Client::get("stats/role");
    }

    private static function rolesFlags()
    {
        return [
            "",
            self::ROLE_MOST_IMPROVED,
            self::ROLE_LEAST_IMPROVED,
            self::ROLE_BEST_PERFORMANCE,
            self::ROLE_WORST_PERFORMANCE,
            self::ROLE_MOST_WINNING,
            self::ROLE_LEAST_WINNING,
        ];
    }

    private static function champsFlags()
    {
        return [
            self::CHAMPION_MOST_BANNED,
            self::CHAMPION_LEAST_WINNING,
            self::CHAMPION_LEAST_PLAYED,
            self::CHAMPION_MOST_PLAYED,
            self::CHAMPION_MOST_WINNING ,
            self::CHAMPION_BEST_RATED,
            self::CHAMPION_WORST_RATED,
        ];
    }
}
