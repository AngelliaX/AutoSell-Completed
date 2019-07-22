<?php

namespace tungsten_autosell;

use pocketmine\{Player, Server};
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\{Command,CommandSender, CommandExecutor, ConsoleCommandSender};
use pocketmine\item\Item;
use pocketmine\event\player\PlayerQuitEvent;
use onebone\economyapi\EconomyAPI;

class Main extends PluginBase implements Listener{

    public $task;
  public function onEnable(){
        $this->getLogger()->info("AutoSell");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
    }
   public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
       if (strtolower($cmd->getName()) == "autosell") {
           if(!isset($args[0])){
               $sender->sendMessage("Dùng /autosell on:off");
               return false;
           }
           switch ($args[0]) {
               case "on":
                   $this->task = new Task_autosell($this,$sender);
                   $this->getScheduler()->scheduleRepeatingTask($this->task,10);
                   break;
               case "off":
                   if(null === $this->task->getTaskId()){
                       return false;
                   }
                   $this->getScheduler()->cancelTask($this->task->getTaskId());
                   break;
               default :
                   $sender->sendMessage("Dùng /autosell on:off");
                   break;
           }
       }

       return true;
   }
   public function onQuit(PlayerQuitEvent $e){
       $a = "autosell off";
       $this->getServer()->dispatchCommand($e->getPlayer(),$a);
    }
   public function onCheck(Player $p){
       $inv = $p->getInventory();
       //dacuoi
       if($inv->contains(Item::get(4,0,64))) {
           $inv->removeItem(Item::get(4,0,64));
           EconomyAPI::getInstance()->addMoney($p->getName(),5000*64);
       }
       //coal
       if($inv->contains(Item::get(263,0,64))) {
           $inv->removeItem(Item::get(4,0,64));
           EconomyAPI::getInstance()->addMoney($p->getName(),5000*64);
       }
       //diamond
       if($inv->contains(Item::get(264,0,64))) {
           $inv->removeItem(Item::get(4,0,64));
           EconomyAPI::getInstance()->addMoney($p->getName(),5000*64);
       }
       //emarald
       if($inv->contains(Item::get(388,0,64))) {
           $inv->removeItem(Item::get(4,0,64));
           EconomyAPI::getInstance()->addMoney($p->getName(),5000*64);
       }
       //gold
       if($inv->contains(Item::get(266,0,64))) {
           $inv->removeItem(Item::get(4,0,64));
           EconomyAPI::getInstance()->addMoney($p->getName(),5000*64);
       }
       //iron
       if($inv->contains(Item::get(265,0,64))) {
           $inv->removeItem(Item::get(4,0,64));
           EconomyAPI::getInstance()->addMoney($p->getName(),5000*64);
       }
       //lapis
       if($inv->contains(Item::get(4,0,64))) {
           $inv->removeItem(Item::get(4,0,64));
           EconomyAPI::getInstance()->addMoney($p->getName(),5000*64);
       }
       //redstone
       if($inv->contains(Item::get(4,0,64))) {
           $inv->removeItem(Item::get(4,0,64));
           EconomyAPI::getInstance()->addMoney($p->getName(),5000*64);
       }
  }

}
