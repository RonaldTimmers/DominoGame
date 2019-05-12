<?php 
namespace DominoGame\Game;
use DominoGame\Elements\Player;
use DominoGame\Elements\Stack;
use DominoGame\Elements\Tile;

interface GameInterface 
{
    /**
    * Configure the Domino Game
    * @return Game
    */
    public function setupGame(): Game;


    /**
     * Begin the actual domino game 
     * 
     * @return void
     */
    public function begin(): void;


    /**
     * Shuffle the tiles in the deck randomly
     * 
     * @param array $array
     * @return array
     */
    public function shuffleDeck(array $array): array;

    /**
     * Put a tile from one stack to another
     * 
     * @param Stack $fromStack
     * @param Stack $toStack
     * @param int $count
     * @param int $key
     * @param bool $addFirst
     * 
     * @return void
     */
    public function exchangeTile (Stack $fromStack, Stack $toStack, int $key ): void;

    /**
     * Player does a turn
     * 
     * @param Player $player
     * 
     */
    public function playTurn(Player $player);


    /** 
     * Get the last tile of the board to compare against the players stack
     * 
     * @return Tile
     */
    public function getBoardLastTile(): Tile;

    /**
     * Get the first tile of the board to compare against the players stack
     * 
     * @return Tile
     */
    public function getBoardFirstTile(): Tile;

}