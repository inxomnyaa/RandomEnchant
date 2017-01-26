<?php

namespace xenialdan\RandomEnchant;

use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\tile\Tile;
use xenialdan\SimpleSpawner\block\MonsterSpawner;
use xenialdan\SimpleSpawner\tile\MobSpawner;

class Loader extends PluginBase
{
    public function onEnable()
    {
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    }
}