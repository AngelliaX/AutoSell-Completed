<?php

namespace tungsten_autosell;

use pocketmine\plugin\Plugin;
use pocketmine\scheduler\Task;


class Task_autosell extends Task{

	private $owner;
    public $sender;
	public function __construct(Plugin $owner,$sender){
		$this->owner = $owner;
		$this->sender = $sender;
	}


	public function onRun($tick){
		$this->owner->onCheck($this->sender);
	}
}