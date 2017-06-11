<?php

/*
 * BigBrother plugin for PocketMine-MP
 * Copyright (C) 2014 shoghicp <https://github.com/shoghicp/BigBrother>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
*/

namespace shoghicp\BigBrother\network\protocol\Play;

use shoghicp\BigBrother\network\Packet;

class ClientSettingsPacket extends Packet{

	public $lang;
	public $view;
	public $chatmode;
	public $chatcolor;
	public $skinsetting;

	public function pid(){
		return 0x05;
	}

	public function encode(){

	}

	public function decode(){
		$this->lang = $this->getString();
		$this->view = $this->getByte();
		$this->chatmode = $this->getByte();
		$this->chatcolor = (bool) $this->getByte();
		$this->skinsetting = base_convert($this->getByte(), 10, 2);
		$this->mainhand = $this->getVarInt();
	}
}