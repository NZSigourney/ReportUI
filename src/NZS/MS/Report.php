<?php

namespace NZS\MS;

/** Information of Plugin
 * Design & Code: NZS (Tobi)
 * Github: github.com/NZSigourney
 * Source: ReportSPNVN
 * Version 9.0
 * 10/10/2021 at Minesuon, Active at Prison RPG II
 * Please respect the Coder make this plugin (Don't change Author, But you can add #Editor: YourNameHere.
 */

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Server;
use pocketmine\event\Listener;
// Class
use NZS\MS\Command\tocao;
use NZS\MS\Command\AdminOnly\Admin;
use NZS\MS\Level\LevelUP;

class Report extends PluginBase implements Listener
{
    public $rp = "§l§f-=§c<§a•§c>§c ToCao§aUI §c<§a•§c>§f=-";

    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getServer()->getCommandMap()->register("tocao", new tocao($this));
        //$this->getServer()->getCommandMap()->register("huytocao", new huytocao($this));
        //$this->getServer()->getCommandMap()->register("checkreport", new Admin($this));
        $this->getServer()->getCommandMap()->register("thangcap", new LevelUP($this));

        $this->getLogger()->info("§bStarting ReportUI Version 9.0");

        @mkdir($this->getDataFolder(), 0744, true);
        $this->tc = new Config($this->getDataFolder() . "report.yml", Config::YAML, []);
        $this->htc = new Config($this->getDataFolder() . "Cancel.yml", Config::YAML, []);

        $this->lv = new Config($this->getDataFolder() . "Level.yml", Config::YAML);
        $this->exp = new Config($this->getDataFolder() . "exp.yml", Config::YAML);
        $this->nb = new Config($this->getDataFolder() . "LanSuDung.yml", Config::YAML);
        $this->dh = new Config($this->getDataFolder() . "DanhHieu.yml", Config::YAML);
    }

    public function onLoad(){
        $this->getLogger()->info("\n\n§c§l•§b R༶E༶P༶O༶R༶T༶S༶P༶N༶V༶N༶ §6Version §e9\n\n§aCode by §bNZS");
    }

    public function createDataExp($name){
        $this->exp->set($name, 0);
        $this->exp->save();
    }

    public function setExp($name, $exp){
        $currentExp = $this->exp->get($name);
        $this->exp->set($name, $currentExp + $exp);
        $this->exp->save();
    }

    public function changeExp($name){
        $this->exp($name, $exp);
        $this->exp->save();
    }

    public function checkExp($name){
        if($this->exp->exists($name))
        {
            return true;
        }
        return false;
    }

    public function seeExp($name){
        if($this->checkExp($name)){
            $currentExp = $this->exp->get($name);
            return $currentExp;
        }
        return false;
    }

    public function createLevel($name){
        $this->lv->set($name, 0);
        $this->lv->save();
    }

    public function setLevel($name, $lv){
        $currentLevel = $this->lv->get($name);
        $this->lv->set($name, $currentLevel + $lv);
        $this->lv->save();
    }

    public function changeLevel($name){
        $this->lv($name, $lv);
        $this->lv->save();
    }

    public function checkLevel($name){
        if($this->lv->exists($name)){
            return true;
        }
        return false;
    }

    public function seeLevel($name){
        if($this->checkLevel($name)){
            $currentExp = $this->lv->get($name);
            return $currentExp;
        }
        return false;
    }

    public function createNB($name){
        $this->nb->set($name, 0);
        $this->nb->save();
    }

    public function setNB($name, $nb){
        $currentNB = $this->nb->get($name);
        $this->nb->set($name, $currentNB + $nb);
        $this->nb->save();
    }

    public function changeNB($name){
        $this->nb($name, $nb);
        $this->nb->save();
    }

    public function checkNB($name){
        if($this->nb->exists($name)){
            return true;
        }
        return true;
    }

    public function seeNB($name){
        if($this->checkNB($name)){
            $currentNB = $this->nb->get($name);
            return $currentNB;
        }
        return false;
    }

    /**public function exp($player){
        $p = $ev->getPlayer();
        $exp = $this->seeExp($name);
        $lv = $this->seeLevel($name);
        if($this->exp->exists($player->getName())){
            if($lv < 10){
                if($this->)
        }
            if($exp >= 1000){
                $this->setLevel($name, 1);
                $p->sendMessage("§l§a[LEVEL]§b Bạn đã được tăng cấp! Hiện tại: §c". $lv);
            }elseif($exp >= 2000){
                $this->setLevel($name, 1);
                $p->sendMessage("§l§a[LEVEL]§b Bạn đã được tăng cấp! Hiện tại: §c". $lv);
            }elseif($exp >= 3000){
                $this->setLevel($name, 1);
                $p->sendMessage("§l§a[LEVEL]§b Bạn đã được tăng cấp! Hiện tại: §c". $lv);
            }elseif($exp >= 4000){
                $this->setLevel($name, 1);
                $p->sendMessage("§l§a[LEVEL]§b Bạn đã được tăng cấp! Hiện tại: §c". $lv);
            }elseif($exp >= 5000){
                $this->setLevel($name, 1);
                $p->sendMessage("§l§a[LEVEL]§b Bạn đã được tăng cấp! Hiện tại: §c". $lv);
            }elseif($exp >= 6000){
                $this->setLevel($name, 1);
                $p->sendMessage("§l§a[LEVEL]§b Bạn đã được tăng cấp! Hiện tại: §c". $lv);
            }elseif($exp >= 7000){
                $this->setLevel($name, 1);
                $p->sendMessage("§l§a[LEVEL]§b Bạn đã được tăng cấp! Hiện tại: §c". $lv);
            }elseif($exp >= 8000){
                $this->setLevel($name, 1);
                $p->sendMessage("§l§a[LEVEL]§b Bạn đã được tăng cấp! Hiện tại: §c". $lv);
            }elseif($exp >= 9000){
                $this->setLevel($name, 1);
                $p->sendMessage("§l§a[LEVEL]§b Bạn đã được tăng cấp! Hiện tại: §c". $lv);
            }elseif($exp >= 10000){
                $this->setLevel($name, 1);
                $p->sendMessage("§l§a[LEVEL]§b Bạn đã được tăng cấp! Hiện tại: §c". $lv);
            }elseif($lv = 10){
                $p->sendPopup("Full!");
            }
    }*/
}