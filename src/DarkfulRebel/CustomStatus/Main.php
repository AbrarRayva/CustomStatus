<?php

namespace DarkfulRebel\CustomStatus;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if(strtolower($command->getName()) === "customstatus"){
            if($sender instanceof Player){
                if(isset($args[0])){
                    $status = implode(" ", $args);
                    $sender->setScoreTag("§7§o" . $status);
                    $sender->sendMessage("§eYour status has been changed to :§6 " . $status);
                } else{
                    $sender->sendMessage("Usage: /customstatus <status>");
                }
            } else{
                $sender->sendMessage("You cannot use this command.");
            }
        }
        return true;
    }
}