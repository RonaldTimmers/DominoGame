<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use DominoGame\Elements\Tile;

final class TileTest extends TestCase
{

    /**
     * @var Tile
     */
    public $tile;

    function setUp(): void {
        $this->tile = new Tile([4,5]);
    }

    public function testGetTileValueAsArray() {
        $this->assertIsArray($this->tile->getValue());
    }   

    public function testGetRotateValueOfTile() {
        $this->tile->rotateTile();
        $this->assertEquals([5,4], $this->tile->getValue());
    }
}