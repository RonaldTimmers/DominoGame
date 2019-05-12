<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use DominoGame\Game\Game;
use DominoGame\Elements\Player;
use DominoGame\Elements\Stack;
use DominoGame\Elements\Tile;


final class GameTest extends TestCase
{      

    /**
     * 
     * @var Game
     */
    public $game;

    public function setUp(): void {
        $this->game = new Game();
    }

    public function testGetAllGameTiles() {
        $this->assertCount(28, $this->game->gameTiles);
    }

    public function testGetStartDeck(){
        $this->game->setupGame();
        $this->assertCount(13, $this->game->deckStack->getTiles());
    } 

    public function testGetBoardStack(){
        $this->game->setupGame();
        $this->assertCount(1, $this->game->boardStack->getTiles());
    } 

    public function testGetPlayerStack(){
        $this->game->setupGame();
        $this->assertCount(7, $this->game->player1->stack->getTiles());
    } 

}