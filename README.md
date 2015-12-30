# Champion
[Champion.gg API](http://api.champion.gg) wrapper written in PHP.

**Installation:**  
Require this package using composer 
`composer require m1so/champion`

**Disclaimer:**
The internal API of this package may change, use at own risk

**Todo:**
- Add tests

# Documentation
Overview of all methods and endpoints with examples.

## Champion specific
List of all endpoints and methods that are specific to a given champion.

### All champions
Endpoint: `/champion`  
Example:
```php
$champions = Champion::all();
```

### Champion info
Endpoint: `/champion/:name`  
Example:
```php
// Grab all data for given champion
$ahriInfo = (new Champion('Ahri'))->info();
```

Endpoint: `/champion/:name/general`  
Example:
```php
// Grab only general data for given champion
$ahriGeneral = (new Champion('Ahri'))->general();
```

### Champion matchups

Endpoint: `/champion/:name/matchup`
Example:
```php
// All matchups for champion
$matchups = (new Champion('TwistedFate'))->matchups();
```

### Finished items for champion

Endpoint: `/champion/:name/items/finished/{mostPopular, mostWins}`  
Example:
```php
// Grab all finished items (most popular is the default flag)
$popularItems = (new Champion($name))->items();
// Can be called explicitly
$popularItems = (new Champion($name))->items(Champion::CHAMPION_MOST_POPULAR);
// We can also get items by most wins this way
$mostWinsItems = (new Champion($name))->items(Champion::CHAMPION_MOST_WINS);
```


### Skill order for champion

Endpoint: `/champion/:name/skills/{mostPopular, mostWins}`  
Example:
```php
// Skill order (most popular is the default flag)
$popularItems = (new Champion($name))->skills();
// Can be called explicitly
$popularItems = (new Champion($name))->skills(Champion::CHAMPION_MOST_POPULAR);
// We can also get skills by most wins this way
$mostWinsItems = (new Champion($name))->skills(Champion::CHAMPION_MOST_WINS);
```

### Starting items

Endpoint: `/champion/:name/items/starters/{mostPopular, mostWins}` 
Example:
```php
// Same flags apply (Champion::CHAMPION_MOST_WINS and Champion::CHAMPION_MOST_POPULAR)
$startingItems = (new Champion($name))->startingItems();
```

### Summoner spells

Endpoint: `/champion/:name/summoners/{mostPopular, mostWins}`  
Example:
```php
// Same flags apply (Champion::CHAMPION_MOST_WINS and Champion::CHAMPION_MOST_POPULAR)
$summs = (new Champion($name))->summonerSpells();
```

### Runes

Endpoint: `/champion/:name/runes/{mostPopular, mostWins}`  
Example:
```php
// Same flags apply for runes (Champion::CHAMPION_MOST_WINS and Champion::CHAMPION_MOST_POPULAR)
$runes = (new Champion($name))->runes();
```





## Matchup between two champions

Endpoint: `/champion/:name/matchup/:enemy`  
Example: 
```php
// Matchup between two champions
$matchup = Matchup::info($as, $vs);
// TODO: Consider adding Matchup::between($as, $vs) syntax
```





## Stats
Stats related endpoints and methods

### All stats
Endpoint: `/stats`  
Example:
```php
// Grab all stats
$stats = Stats::all();
```

### All stats for all roles

Endpoint: `/stats/role`  
Example:
```php
$allRoles = Stats::allRoles();
```

### Choosing a specific role for stats

Endpoint: `/stats/role/:role/{mostImproved, leastImproved, leastWinning, mostWinning, worstPerformance, bestPerformance} [page, limit]`  
Example:
```php
// Set the role's name
$name = 'Top'; 
// Set page and limit (default from Champion.gg API)
$page = 1; 
$limit = 10;

$stats = Stats::byRole($name);
// We can also specify the flag:
$statsMostImproved  = Stats::byRole($name, Stats::ROLE_MOST_IMPROVED, $page, $limit);
$statsLeastImproved = Stats::byRole($name, Stats::ROLE_LEAST_IMPROVED, $page, $limit);
$statsLeastWinning  = Stats::byRole($name, Stats::ROLE_LEAST_WINNING, $page, $limit);
$statsMostWinning   = Stats::byRole($name, Stats::ROLE_MOST_WINNING, $page, $limit);
$statsWorstPerf     = Stats::byRole($name, Stats::ROLE_WORST_PERFORMANCE, $page, $limit);
$statsBestPerf      = Stats::byRole($name, Stats::ROLE_BEST_PERFORMANCE, $page, $limit);
```

### Specific champion related stats

Endpoint: `/stats/champs/:name`  
Example:
```php
$ahriStats = Stats::byChampion('Ahri');
```

### General champion stats

Endpoint: `/stats/champs/{mostBanned, leastWinning, leastPlayed, mostPlayed, mostWinning, bestRated, worstRated} [page, limit]`
Example:
```php
// Flag is required here:
// By bans
$champStats = Stats::champs(Stats::CHAMPION_MOST_BANNED, $page, $limit);
// By playrate
$champStats = Stats::champs(Stats::CHAMPION_MOST_PLAYED, $page, $limit);
$champStats = Stats::champs(Stats::CHAMPION_LEAST_PLAYED, $page, $limit);
// By winrate
$champStats = Stats::champs(Stats::CHAMPION_MOST_WINNING, $page, $limit);
$champStats = Stats::champs(Stats::CHAMPION_LEAST_WINNING, $page, $limit);
// By rating
$champStats = Stats::champs(Stats::CHAMPION_BEST_RATED, $page, $limit);
$champStats = Stats::champs(Stats::CHAMPION_WORST_RATED, $page, $limit);
```
