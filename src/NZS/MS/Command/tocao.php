<?php


namespace NZS\MS\Command;


use NZS\MS\Report;
use NZS\MS\UI\tocaoUI;
use NZS\MS\Command\AdminOnly\Admin;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Command\ConsoleCommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class tocao extends Command
{
    public function __construct(Report $plugin)
    {
        $this->plugin = $plugin;
        Parent::__construct("tocao");
        $this->setDescription("Tố cáo người chơi");
        $this->setAliases(array("tc"));
    }

    public function getPlugin(): Report
    {
        return $this->plugin;
    }

    public function execute(CommandSender $player, string $commandLabel, array $args)
    {
        if(!($player instanceof Player)){
            Server::getInstance()->getLogger()->warning("USE IN-GAME!");
            return true;
        }
        new tocaoUI($player);
        return;
    }
}