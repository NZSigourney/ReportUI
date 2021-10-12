<?php


namespace NZS\MS\UI\SubUI;

use NZS\MS\Report;
use pocketmine\{Player, Server};
use jojoe7777\FormAPI;

class tocaosubcommand
{
    public function __construct(Player $player){
        $this->subcommand($player);
    }

    public function getPlugin(): Report
    {
        $report = Server::getInstance()->getPluginManager()->getPlugin("ToCaoUI");
        if($report instanceof Report)
        {
            return $report;
        }
        return null;
    }

    public function subcommand($player)
    {
        $a = Server::getInstance()->getPluginManager()->getPlugin("FormAPI");
        $f = $a->createCustomForm(Function (Player $player, $d){
            if(!isset($d[0]) || !isset($d[1]) || !isset($d[2])){
                $player->sendMessage($this->getPlugin()->rp . "§l§c Điền đầy đủ thông tin!");
                return;
            }
            $id = mt_rand(1, mt_getrandmax());
            $name = $player->getName();
            $tc = $this->getPlugin()->tc->get($player->getName())["ID"];

            $this->getPlugin()->tc->set($player->getName(), ["ID" => $id, "Accused" => $d[0], "Reason" => $d[1], "promise" => $d[2]]);
            $this->getPlugin()->tc->save();
            $this->getPlugin()->setExp($name, rand(100, 500));
            $this->getPlugin()->setNB($name, 1);
            $player->sendMessage($this->getPlugin()->rp . "§l§a Report §c".$d[0]."§a Success, ID:§e ". $tc);
        });

        $f->setTitle($this->getPlugin()->rp);
        $f->addInput("§aAccused's Name:");
        $f->addInput("§aReason:");
        $f->addInput("Are you sure?");
        $f->addLabel("§f===============\n§c• §aLiên hệ chúng tôi tại Fanpage Minesuon hoặc liên hệ trực tiếp STAFF nếu thắc mắc!");
        $f->sendToPlayer($player);
    }
}