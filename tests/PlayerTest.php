<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use DominoGame\Elements\Player;
use DominoGame\Elements\Stack;
use DominoGame\Elements\Tile;


final class PlayerTest extends TestCase
{

    /**
     * @var Player
     */
    public $player;

    /**
     *
     * @var Stack
     */
    public $stack;

    /**
     * 
     * @var Tile
     */
    

    function setUp(): void {
        $this->tile = new Tile([4,5]);
        $this->stack = new Stack();
        $this->stack->addTile($this->tile); 
    }

    public function testGetPlayerStack()
    {   
        $this->player = new Player("TestPlayer", $this->stack);            
        $this->assertCount(1, $this->stack->getTiles());
    }
}