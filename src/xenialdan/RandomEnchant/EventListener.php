<?php

namespace xenialdan\RandomEnchant;

use pocketmine\block\Block;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Armor;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Tool;
use pocketmine\plugin\Plugin;

class EventListener implements Listener {

	/**
	 * EventListener constructor.
	 * @param Plugin $plugin
	 */
	public function __construct(Plugin $plugin) {
		$this->owner = $plugin;
	}

	/**
	 * @param PlayerInteractEvent $event
	 * @return bool
	 */
	public function onClickTable(PlayerInteractEvent $event) {
		if (($player = $event->getPlayer())->hasPermission('randomenchant') && $player->getInventory()->getItemInHand() instanceof Tool || $player->getInventory()->getItemInHand() instanceof Armor && $event->getBlock()->getId() === Block::ENCHANT_TABLE) {
			$player->getInventory()->getItemInHand()->addEnchantment(Enchantment::getEnchantment(array_rand(Enchantment::$enchantments)));
		}
		return true;
	}
}