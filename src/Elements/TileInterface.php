<?php
namespace DominoGame\Elements;


interface TileInterface 
{

    /**
     * Get both values of the tile as array
     * 
     * @return array
     */

    public function getValue(): array;

    /**
     *  Rotate the tile values
     * 
     * @return void
     */

    public function rotateTile(): void;

} 