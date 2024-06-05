<?php

declare(strict_types=1);

namespace Farmero\servergui\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\PluginOwned;
use pocketmine\plugin\Plugin;

use Farmero\servergui\ServerGUI;

class ServerGUICommand extends Command implements PluginOwned {

    private $plugin;

    public function __construct(ServerGUI $plugin) {
        parent::__construct("servergui", "Open the server GUI", "/servergui");
        $this->setPermission("servergui.cmd");
        $this->plugin = $plugin;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if (!$sender instanceof Player) {
            $sender->sendMessage("This command can only be used in-game");
            return;
        }
        $this->plugin->openServerGUI($sender);
    }

    public function getOwningPlugin(): Plugin {
        return $this->plugin;
    }
}