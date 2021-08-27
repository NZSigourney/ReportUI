<?php

/** ----[Reporter]----
* Copyright @Minesuon
* Lastest & Other Version: ReportSPNVN
* github.com/NZSigourney/ReportSPNVN
*/

namespace NZS\RP;

use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender};
use pocketmine\{Player, Server};
// Event
use pocketmine\event\Listener;
use pocketmine\event\player\{PlayerJoinEvent, PlayerQuitEvent};
// utils
use pocketmine\utils\Config;
// Other Plugin
use joejoe7777\FormAPI;
use onebone\economy\EconomyAPI;

class Reporter extends PluginBase implements Listener{
	public $tag = "§l§f[§c• §aReporter§c •§f]";

	public function onEnable():void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->info($this->tag . " Enable");
		$this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		if(!is_dir($this->getDataFolder())){
			mkdir($this->getDataFolder);
		}
		$this->reporter = new Config($this->getDataFolder() . "Reporter.yml", Config::YAML, []);
		$this->broken = new Config($this->getDataFolder() . "BaoLoi.yml", Config::YAML);
		$this->cfs = new Config($this->getDataFolder() . "Config.yml", Config::YAML);
		$this->sg = new Config($this->getDataFolder() . "Settings.yml", Config::YAML, ["UI" => false]);
	}

	public function onDisable(){
		$this->cfs->save();
		$this->reporter->save();
	}

	public function onLoad(){
		$this->getLogger()->info("\n\n§c§l•§b R༶E༶P༶O༶R༶T༶E༶R༶\n §aVersion §b 7.0\n §cCode & Design §eBy §6NZS/Tobi");
	}

	public function onJoin(PlayerJoinEvent $ev){
		$player = $ev->getPlayer();
		$n = $player->getName();
		if(!$this->cfs->exists($n)){
			$this->getServer()->getLogger()->warning("Settings YML is Running!");
		}else{
			$this->cfs->set($n, ["Administrator" => true]);
			$this->cfs->save();
		}
	}

	public function onCommand(CommandSender $player, Command $c, string $l, array $a): bool
    {
        switch ($c->getName()) {
            case "report":
                if (!($player instanceof Player)) {
                    $this->getServer()->getLogger()->warning("Use IN-GAME!");
                    return true;
                }
                if ($player->hasPermission("tocao.cmd")) {
                    $this->openForm($player);
                }
        }
        return true;
    }

	public function openForm($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$f = $api->createSimpleForm(Function(Player $player, $d){
			$r = $d;
			if ($r == null){
				//return $this->openForm($player);
			}
			switch($r){
				case 0:
				$this->tocao($player);
				break;
				case 1:
				$this->baoloi($player);
				break;
				case 2:
				$player->sendMessage("§c");
				break;
			}
		});

		$f->setTitle($this->tag);
		$f->setContent("Tố cáo và Báo lỗi");
		$f->addButton("§l§f[§aTố Cáo§f]", 0, "https://cdn1.iconfinder.com/data/icons/football-soccer-club/512/N_T_522Artboard_1_copy_4-128.png");
		$f->addButton("§l§f[§aBáo Lỗi§f]", 0, "https://cdn2.iconfinder.com/data/icons/technology-outline-set/24/alart-128.png");
		$f->sendToPlayer($player);
	}

	public function tocao($player){
		$lit = [];
		foreach($this->getServer()->getOnlinePlayers() as $player){
			$list[] = $player->getName();
			$this->playerList[$player->getName()] = $list;
		}
		$a = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$f = $a->createCustomForm(Function(Player $player, $d){
			if($d == null)
			{
				return $this->openForm($player);
			}
			$i = $d[0];
			$d[1] = explode("\\n", $d[1]);
			$name = $this->playerList[$player->getName()][$i];
			$this->reporter->set($player->getName(), ["Target" => $i, "Reason" => $d[1]]);
			$this->reporter->save();
			$player->sendMessage($this->tag . "§c Tố cáo thành công ".$name." Đội ngũ STAFF ".$this->getServer()->getMotd()." Chúc bạn chơi game vui vẻ!");
		});

		$f->setTitle($this->tag);
		$f->addDropdown("§c§lTarget", $this->playerList[$player->getName()]);
		$f->addInput("§l§aReason");
		$f->sendToPlayer($player);
	}

	public function baoloi($player){
		$a = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$f = $a->createCustomForm(Function(Player $player, $d){
			if($d == null)
			{
				return $this->openForm($player);
			}
			$d = explode("\\n", $d[0]);
			$this->broken->set($player->getName(), ["Báo Lỗi" => $d]);
			$this->broken->save();
			$player->sendMessage($this->tag . "§l§a Báo Lỗi thành công, Xin cảm on bạn đã báo lỗi cho chúng tôi!");
		});
		$f->setTitle($this->tag);
		$f->addInput("§l§a Nhâp lỗi mà bạn gặp");
		$f->sendToPlayer($player);
	}
}