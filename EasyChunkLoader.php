<?php

use pocketmine\level\ChunkLoader;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\math\Vector3;

/**
  * @author robske_110
  * @license GNU LESSER GENERAL PUBLIC LICENSE v3
  */
class EasyChunkLoader implements ChunkLoader{
	private $id;
	private $position;
	private $chunkX;
	private $chunkZ;
	private $active = false;
	
	public function __construct(Vector3 $pos, Level $level){
		$this->id = Level::generateChunkLoaderId($this);
		$this->position = Position::fromObject($pos, $level);
		$this->chunkX = $pos->x >> 4;
		$this->chunkZ = $pos->z >> 4;
		$this->level = $level;
		$this->active = true;
		$this->level->registerChunkLoader($this, $this->chunkX, $this->chunkZ);
	}
	
	/**
	  * @return int
 	  */
	public function getLoaderId(){
		return $this->id;
	}
	
	/**
	  * Returns if the chunk loader is currently active
	  *
	  * @return bool
	  */
	public function isLoaderActive(){
		return $this->active;
	}
	
	/**
	  * Call this to temporarily deactivate this chunkloader!
	  * WARNING: IF YOU NO LONGER REQUIRE THE CHUNKLOADER CALL @link{SuperChunkLoader->unregister()}!
	  */
	public function deactivate(){
		$this->active = false;
	}
	
	/**
	  * Activate the chunk loader again after deactivate() has been called
	  */
	public function activate(){
		$this->active = true;
	}
	
	/**
	  * This will try to free as much memory as possible. Please clear your references to this chunkloader also!
	  */
	public function unregister(){
		$this->active = false;
		$this->position = null;
		$this->level->unregisterChunkLoader($this, $this->chunkX, $this->chunkZ);
		$this->level = null;
	}
	
	/**
	 * @return Position
	 */
	public function getPosition(){
		return $this->position;
	}
	/**
	 * @return float
	 */
	public function getX(){
		return $this->position->x;
	}
	/**
	 * @return float
	 */
	public function getZ(){
		return $this->position->z;
	}
	/**
	 * @return Level
	 */
	public function getLevel(){
		return $this->level;
	}
}