<?php 
namespace DominoGame\Elements;

Final class Player implements PlayerInterface 
{

    /**
     *
     * @var string
     */
    private $name;

    /**
     *
     * @var Stack
     */
    public $stack;

    /**
     * The Player Constructor
     * 
     * @param string $name
     * @param Stack $stack
     * @return void
     */
    
    function __construct(string $name, Stack $stack ) {
        $this->name = $name;
        $this->stack = $stack;
    }

    /**
     * @return string
     */

    public function getName (): string {
        return $this->name;
    }
}