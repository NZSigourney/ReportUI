<?php


namespace NZS\MS\Level;

use NZS\MS\Report;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Command\ConsoleCommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class LevelUP extends Command
{
    public function __construct(Report $plugin)
    {
        $this->plugin = $plugin;
        parent::__construct("thangcap");
        $this->setDescription("Level Up for Tocao");
    }

    public function getPlugin(): Report{
        return $this->plugin;
    }

    public function execute(CommandSender $player, string $commandLabel, array $args): void{
        if(!($player instanceof Player)){
            Server::getInstance()->getLogger()->warning("USE IN-GAME!");
            return;
        }
        $exp = $this->getPlugin()->exp->get($player->getName());
        $level = $this->getPlugin()->lv->get($player->getName());
        $next = $level + 1;
        $max = 10000;
        $name = $player->getName();

        if($exp >= 1000 || $exp <= 2000){
            $this->getPlugin()->setLevel($name, 1);
            $player->sendPopup("§f[§aLEVEL§f]§a Level UP!, §eLV: §b".$level."§a, Next Level:§b ". $next);
            $player->sendMessage("§f[§eEXP§f]§a §b".$exp."§f/§c". $max);
        }elseif($exp >= 2000 || $exp <= 2999){
            $this->getPlugin()->setLevel($name, 1);
            $player->sendPopup("§f[§aLEVEL§f]§a Level UP!, §eLV: §b".$level."§a, Next Level:§b ". $next);
            $player->sendMessage("§f[§eEXP§f]§a §b".$exp."§f/§c". $max);
        }elseif($exp >= 3000 || $exp <= 3999){
            $this->getPlugin()->setLevel($name, 1);
            $player->sendPopup("§f[§aLEVEL§f]§a Level UP!, §eLV: §b".$level."§a, Next Level:§b ". $next);
            $player->sendMessage("§f[§eEXP§f]§a §b".$exp."§f/§c". $max);
        }elseif($exp >= 4000 || $exp <= 4999){
            $this->getPlugin()->setLevel($name, 1);
            $player->sendPopup("§f[§aLEVEL§f]§a Level UP!, §eLV: §b".$level."§a, Next Level:§b ". $next);
            $player->sendMessage("§f[§eEXP§f]§a §b".$exp."§f/§c". $max);
        }elseif($exp >= 5000 || $exp <= 5999){
            $this->getPlugin()->setLevel($name, 1);
            $player->sendPopup("§f[§aLEVEL§f]§a Level UP!, §eLV: §b".$level."§a, Next Level:§b ". $next);
            $player->sendMessage("§f[§eEXP§f]§a §b".$exp."§f/§c". $max);
        }elseif($exp >= 6000 || $exp = 6999){
            $this->getPlugin()->setLevel($name, 1);
            $player->sendPopup("§f[§aLEVEL§f]§a Level UP!, §eLV: §b".$level."§a, Next Level:§b ". $next);
            $player->sendMessage("§f[§eEXP§f]§a §b".$exp."§f/§c". $max);
        }elseif($exp >= 7000 || $exp = 7999){
            $this->getPlugin()->setLevel($name, 1);
            $player->sendPopup("§f[§aLEVEL§f]§a Level UP!, §eLV: §b".$level."§a, Next Level:§b ". $next);
            $player->sendMessage("§f[§eEXP§f]§a §b".$exp."§f/§c". $max);
        }elseif($exp >= 8000 || $exp = 8499){
            $this->getPlugin()->setLevel($name, 1);
            $player->sendPopup("§f[§aLEVEL§f]§a Level UP!, §eLV: §b".$level."§a, Next Level:§b ". $next);
            $player->sendMessage("§f[§eEXP§f]§a §b".$exp."§f/§c". $max);
        }elseif($exp >= 9000 || $exp < 10000){
            $this->getPlugin()->setLevel($name, 1);
            $player->sendPopup("§f[§aLEVEL§f]§a Level UP!, §eLV: §b".$level."§a, Next Level:§b ". $next);
            $player->sendMessage("§f[§eEXP§f]§a §b".$exp."§f/§c". $max);
        }elseif($exp >= 10000){
            $player->sendPopup("§l§a[EXP] Full §b".$exp."§f/§c". $max);
        }elseif($exp < 1000){
            $player->sendMeseage("§cKhông Đủ Exp!");
        }
        return;
    }
}