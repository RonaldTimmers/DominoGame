<?php 
namespace DominoGame\Elements;

Final class Stack implements StackInterface  
{
    
    /**
     * @var array
     */
    private $tiles = array();
    
    function __construct () {

    }

    /**
     * Get tiles from the stack
     * @param int $count
     * @return Tile[]
     */

    public function getTiles(int $count = 0): array {
        if ($count == 0) {return $this->tiles;}
        else {return array_splice($this->tiles, 0, $count, true); }        
    }

    /**
     * @param int $key
     * @return Tile
     */

    public function getTile($key): Tile {
        return $this->tiles[$key];
    }

    public function addTiles(array $array): void {
        $this->tiles += $array;
    }

    public function addTile(Tile $tile): void {
        array_push($this->tiles, $tile);
    }

    public function addTileFirst(Tile $tile): void {
        array_unshift($this->tiles, $tile);
    }

    public function removeTiles(array $array): void {
        array_slice($this->tiles, 0, $count);
    }

    public function removeTile($key): void {
        array_splice($this->tiles, $key, 1);
    }

    



}