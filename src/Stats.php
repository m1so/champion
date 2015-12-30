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
        return Client::get("stats/role/${role}/${flag}", $page, $limit);
    }

    public static function byChampion($champion)
    {
        return Client::get("stats/champs/${champion}");
    }

    public static function champs($flag, $page = 1, $limit = 10)
    {
        return Client::get("stats/champs/${flag}", $page, $limit);
    }
}
