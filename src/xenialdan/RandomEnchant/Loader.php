<?php

namespace xenialdan\RandomEnchant;

use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
	}
}