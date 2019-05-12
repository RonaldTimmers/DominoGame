<?php 
namespace DominoGame\Elements;

Final class Tile implements TileInterface 
{

    /**
     * @var array 
     */

    private $tileValue;


   /**
    * 
    * @param array $values
    */

    function __construct ($values) {
        $this->tileValue = $values;
    }

    /**
     * Get values of the Tile
     * 
     * @return array
     */


    public function getValue(): array {
        return $this->tileValue;   
    }

    /**
     * Rotate the tile values
     * 
     * @return void
     */

    public function rotateTile(): void {
        $this->tileValue = array_reverse($this->tileValue);
    }
} 
