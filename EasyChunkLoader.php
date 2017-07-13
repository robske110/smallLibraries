<?php

use pocketmine\level\ChunkLoader;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\level\format\Chunk;

/**
  * @author robske_110
  * @license GNU LESSER GENERAL PUBLIC LICENSE v3
  * @for API 3.0.0-ALPHA2
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
	  * WARNING: IF YOU NO LONGER REQUIRE THE CHUNKLOADER CALL @link{EasyChunkLoader->unregister()}!
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
	  * This will try to free as much memory as possible. You still have to clear your references to this instance!
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
	
	/**
	 * This will be called when a Chunk is replaced by a new one
	 *
	 * @param Chunk $chunk
	 */
	public function onChunkChanged(Chunk $chunk){
		/** @todo */
	}
	/**
	 * This will be called when a registered chunk is loaded
	 *
	 * @param Chunk $chunk
	 */
	public function onChunkLoaded(Chunk $chunk){
		/** @todo */
	}
	/**
	 * This will be called when a registered chunk is unloaded
	 *
	 * @param Chunk $chunk
	 */
	public function onChunkUnloaded(Chunk $chunk){
		/** @todo */
	}
	/**
	 * This will be called when a registered chunk is populated
	 * Usually it'll be sent with another call to onChunkChanged()
	 *
	 * @param Chunk $chunk
	 */
	public function onChunkPopulated(Chunk $chunk){
		/** @todo */
	}
	/**
	 * This will be called when a block changes in a registered chunk
	 *
	 * @param Block|Vector3 $block
	 */
	public function onBlockChanged(Vector3 $block){
		/** @todo */
	}
}