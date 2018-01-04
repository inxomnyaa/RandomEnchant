<?php

namespace xenialdan\RandomEnchant;

use pocketmine\block\Block;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Armor;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\Tool;
use pocketmine\plugin\Plugin;

class EventListener implements Listener{
	private $owner;

	/**
	 * EventListener constructor.
	 * @param Plugin $plugin
	 */
	public function __construct(Plugin $plugin){
		$this->owner = $plugin;
	}

	/**
	 * @param PlayerInteractEvent $event
	 * @return bool
	 */
	public function onClickTable(PlayerInteractEvent $event){
		if (($player = $event->getPlayer())->hasPermission('randomenchant') && $event->getBlock()->getId() === Block::ENCHANTING_TABLE){
			$item = $event->getItem();
			if ($item instanceof Tool || $item instanceof Armor){
				do{
					$enchantment = Enchantment::getEnchantment(mt_rand(Enchantment::PROTECTION, Enchantment::MENDING));
					if ($item->hasEnchantment($enchantment->getId())) continue;
					$item->addEnchantment(new EnchantmentInstance($enchantment));
				} while (!$item->hasEnchantment($enchantment->getId()));
				$event->setCancelled();
			}
		}
		return true;
	}
}