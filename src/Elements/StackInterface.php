<?php 
namespace DominoGame\Elements;

use DominoGame\Elements\Tile;

/**
 * 1. Number of tiles in the deck 
 * 
 */

interface StackInterface 
{

    public function getTile(int $key): Tile;

    public function getTiles(): array;

    public function addTiles(array $array): void;

    public function addTile(Tile $tile): void;

    public function addTileFirst(Tile $tile): void;

    public function removeTiles(array $array): void;

} 