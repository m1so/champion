<?php

namespace Champion;

class Champion
{
    protected $champion;

    const CHAMPION_MOST_POPULAR = 'mostPopular';
    const CHAMPION_MOST_WINS = 'mostWins';

    /**
     * Champion constructor.
     *
     * @param $champion
     */
    public function __construct($champion)
    {
        $this->champion = $champion;
    }

    public function summonerSpells($flag = self::CHAMPION_MOST_POPULAR)
    {
        return Client::get("champion/{$this->champion}/summoners/${flag}");
    }

    public function startingItems($flag = self::CHAMPION_MOST_POPULAR)
    {
        return Client::get("champion/{$this->champion}/starters/${flag}");
    }

    public function skills($flag = "")
    {
        return Client::get("champion/{$this->champion}/skills/${flag}");
    }

    public function items($flag = self::CHAMPION_MOST_POPULAR)
    {
        return Client::get("champion/{$this->champion}/finished/${flag}");
    }

    public function matchups()
    {
        return Client::get("champion/{$this->champion}/matchups");
    }

    public function general()
    {
        return Client::get("champion/{$this->champion}/general");
    }

    public function info()
    {
        return Client::get("champion/{$this->champion}");
    }

    public static function all()
    {
        return Client::get("champion");
    }
}
