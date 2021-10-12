<?php


namespace NZS\MS;

use NZS\MS\Report;
use pocketmine\event\Listener;
use pocketmine\{Player, Server};
use pocketmine\event\player\{PlayerJoinEvent, PlayerQuitEvent, PlayerChatEvent};

class EventListener implements Listener
{
    public function __construct(Report $plugin){
        $this->plugin = $plugin;
    }

    public function getPlugin(){
        return $this->plugin;
    }

    public function onJoin(PlayerJoinEvent $ev){
        $p = $ev->getName();
        $this->getPlugin()->createDataExp($name);
        $this->getPlugin()->createLevel($name);
        $this->getPlugin()->createNB($name);
    }

    public function onChat(PlayerChatEvent $ev){
        $exp = $this->getPlugin()->exp->get($name);
        $level = $this->getPlugin()->lv->get($name);
        //$max = 10000;
        $p = $ev->getPlayer();
        $tag = $this->getPlugin()->rp;

        //Danh Hiệu
        $sk = "Sơ Khai";
        $kdv = "Kiểm Duyệt Viên";
        $cn = "Chuyên Nghiệp";
        $bt = "Bậc Thầy";
        $dv = "Đại Vương";
        $dt = "Đế Thánh";
        
        if($ev->getPlayer()->getMessage() == "nhandanhhieu"){
            /** Level Max EXP
             * Lv0: 0-1000
             * Lv1: 1000-2000
             */
            switch($level){
                case 0:
                    $max = 1000;
                    break;
                case 1:
                    $max = 2000;
                    break;
                case 2:
                    $max = 3000;
                    break;
                case 3:
                    $max = 4000;
                    break;
                case 4:
                    $max = 5000;
                    break;
                case 5:
                    $max = 6000;
                    break;
                case 6:
                    $max = 7000;
                    break;
                case 7:
                    $max = 8000;
                    break;
                case 8:
                    $max = 8500;
                    break;
                case 9:
                    $max = 9000;
                    break;
                case 10:
                    $max = 10000;
                    break;
            }
            /** Level Danh Hieu */
            switch($level){
                case 0:
                    $p->sendMessage("§l§c[WARNING] Bạn không đủ cấp độ!, Hiện tại: ". $this->getPlugin()->seeLevel($name));
                    break;
                case 1:
                    $this->getPlugin()->bh->set($player, $sk);
                    $this->getPlugin()->bh->save();
                    $p->sendMessage($tag . "§l§a Hiện tại bạn đang đạt cấp §b".$level."§a Danh Hiệu nhận được là §c".$sk."§a!");
                    $p->sendPopup("§a[EXP] §b".$this->getPlugin()->seeExp($name)."§f/§c".$max);
                break;
                case 3:
                    $this->getPlugin()->bh->set($player, $kdv);
                    $this->getPlugin()->bh->save();
                    $p->sendMessage($tag . "§l§a Hiện tại bạn đang đạt cấp §b".$level."§a Danh Hiệu nhận được là §c".$kdv."§a!");
                    $p->sendPopup("§a[EXP] §b".$this->getPlugin()->seeExp($name)."§f/§c".$max);
                    break;
                case 5:
                    $this->getPlugin()->bh->set($player, $cn);
                    $this->getPlugin()->bh->save();
                    $p->sendMessage($tag . "§l§a Hiện tại bạn đang đạt cấp §b".$level."§a Danh Hiệu nhận được là §c".$cn."§a!");
                    $p->sendPopup("§a[EXP] §b".$this->getPlugin()->seeExp($name)."§f/§c".$max);
                    break;
                case 8:
                    $this->getPlugin()->bh->set($player, $bt);
                    $this->getPlugin()->bh->save();
                    $p->sendMessage($tag . "§l§a Hiện tại bạn đang đạt cấp §b".$level."§a Danh Hiệu nhận được là §c".$bt."§a!");
                    $p->sendPopup("§a[EXP] §b".$this->getPlugin()->seeExp($name)."§f/§c".$max);
                    break;
                case 9:
                    $this->getPlugin()->bh->set($player, $dv);
                    $this->getPlugin()->bh->save();
                    $p->sendMessage($tag . "§l§a Hiện tại bạn đang đạt cấp §b".$level."§a Danh Hiệu nhận được là §c".$dv."§a!");
                    $p->sendPopup("§a[EXP] §b".$this->getPlugin()->seeExp($name)."§f/§c".$max);
                    break;
                case 10:
                    $this->getPlugin()->bh->set($player, $dt);
                    $this->getPlugin()->bh->save();
                    $p->sendMessage($tag . "§l§a Hiện tại bạn đang đạt cấp §b".$level."§a Danh Hiệu nhận được là §c".$dt."§a!");
                    $p->sendPopup("§a[EXP] §b".$this->getPlugin()->seeExp($name)."§f/§c".$max);
                    break;
            }
            /**if($level = 1){
                $this->getPlugin()->bh->set($player, $sk);
                $this->getPlugin()->bh->save();
                $p->sendMessage($tag . "§l§a Hiện tại bạn đang đạt cấp §b".$level."§a Danh Hiệu nhận được là §c".$sk."§a!");
                $p->sendPopup("§a[EXP")
            }elseif($level = 3){
                $this->getPlugin()->bh->set($player, $kdv);
                $this->getPlugin()->bh->save();
            }elseif($level = 5){
                $this->getPlugin()->bh->set($player, $cn);
                $this->getPlugin()->bh->save();
            }elseif($level = 8){
                $this->getPlugin()->bh->set($player, $bt);
                $this->getPlugin()->bh->save();
            }elseif($level = 9){
                $this->getPlugin()->bh->set($player, $dv);
                $this->getPlugin()->bh->save();
            }elseif($level = 10){
                $this->getPlugin()->bh->set($player, $dt);
                $this->getPlugin()->bh->save();
            }elseif($level < 1){
                $p->sendMessage("§l§c[WARNING] Bạn không đủ cấp độ!, Hiện tại: ". $this->getPlugin()->seeLevel($name));
            }*/
        }
        
    }
}