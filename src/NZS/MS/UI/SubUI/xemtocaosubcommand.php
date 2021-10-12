<?php


namespace NZS\MS\UI\SubUI;

use NZS\MS\Report;
use pocketmine\{Player, Server};
use jojoe7777\FormAPI;

class xemtocaosubcommand
{
    public function __construct(Player $player){
        $this->xemtocaosubcommand($player);
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

    public function xemtocaosubcommand($player): bool
    {
        $xtc = $this->getPlugin()->tc->get($player->getName());
        $id = $xtc["ID"];
        $suspect = $xtc["Accused"];
        $reason = $xtc["Reason"];

        $a = Server::getInstance()->getPluginManager()->getPlugin("FormAPI");
        $f = $a->createCustomForm(Function (Player $player, $d){
        });

        $f->setTitle($this->getPlugin()->rp);
        $f->addLabel("§aYour's ID:§c ". $id);
        $f->addLabel("§aSuspect: §e". $suspect);
        $f->addLabel("§aReason:§c ". $reason);
        $f->sendToPlayer($player);
    }
}