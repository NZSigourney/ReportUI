<?php


namespace NZS\MS\UI;

use NZS\MS\Report;
use NZS\MS\UI\SubUI\tocaosubcommand;
use NZS\MS\UI\SubUI\xemtocaosubcommand;
use pocketmine\Player;
use pocketmine\Server;
use jojoe7777\FormAPI;

class tocaoUI
{
    Public function __construct(Player $player)
    {
        $this->tocaoForm($player);
    }

    public function getPlugin(): ?Report
    {
        $tocao = Server::getInstance()->getPluginManager()->getPlugin("ToCaoUI");
        if ($tocao instanceof Report)
        {
            return $tocao;
        }
        return null;
    }

    public function tocaoForm($player)
    {
        $a = Server::getInstance()->getPluginManager()->getPlugin("FormAPI");
        $f = $a->createSimpleForm(Function (Player $player, $data){
            $r = $data;
            if ($r == null) {
                return true;
            }
            switch($r){
                case 0:
                    $player->sendMessage("");
                    break;
                case 1:
                    new tocaosubcommand($player);
                    break;
                case 2:
                    new xemtocaosubcommand($player);
                    break;
                case 3:
                    $this->guide($player);
                    break;
            }
        });
        $max = 10000;
        $name = $player->getName();

        $f->setTitle($this->getPlugin()->rp);
        $f->setContent("§l§b•§a Cấp Độ hiện tại: §c".$this->getPlugin()->seeLevel($name)."\n§l•§a Exp: §c".$this->getPlugin()->seeExp($name)."§f/§a".$max."\n§l§b•§a Số Lần tố cáo: §c".$this->getPlugin()->seeNB($name));
        $f->addButton("EXIT", 0);
        $f->addButton("§l§c• §aTố cáo §c•", 1);
        $f->addButton("§l§c• §eHủy §cTố Cáo •", 2);
        $f->addButton("§l§c• §aHướng Dẫn§c •", 3);
        $f->sendToPlayer($player);
    }

    public function guide($player){
        $a = Server::getInstance()->getPluginManager()->getPlugin("FormAPI");
        $f = $a->createCustomForm(Function (Player $player, $d){
        });

        $f->setTitle($this->getPlugin()->rp);
        $f->addLabel("§l§c•§a Hướng Dẫn:\n§f[§c+§f]§a Sau mỗi lượt tố cáo (Bao gồm hủy đơn kiện) Sẽ được cộng exp và lên cấp.\n Tố Cáo (30 exp) và Hủy đơn (10 exp).");
        $f->addLabel("§f[§c+§f]§a Hệ thống cấp bậc và Exp:\nCấp 1: 0-1000 exp, Cấp 2: 1000-2000 exp,\nCấp 3: 2000-3000, V.V");
        $f->addLabel("§f[§c+§f]§a Danh Hiệu:\n§cCấp 1: §aSơ Khai,§c Cấp 3:§a Kiểm Duyệt Viên (KDV),\n§cCấp 5:§a Chuyên Nghiệp,§c Cấp 8:§c Bậc Thầy,\n§cCấp 9:§a Đại Vương,§c Cấp 10:§a Đế Thánh");
        $f->sendToPlayer($player);
    }
}