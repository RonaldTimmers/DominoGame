<?php
namespace DominoGame\Game; 

use DominoGame\Game\GameMessage;
use DominoGame\Elements\Player;
use DominoGame\Elements\Tile;
use DominoGame\Elements\Stack;


Final class Game implements GameInterface 
{

    /**
     * @var array
     */
    const ALL_TILES = [
        [0,0], 
        [0,1], [1,1], 
        [0,2], [1,2], [2,2], 
        [0,3], [1,3], [2,3], [3,3], 
        [0,4], [1,4], [2,4], [3,4], [4,4], 
        [0,5], [1,5], [2,5], [3,5], [4,5], [5,5],
        [0,6], [1,6], [2,6], [3,6], [4,6], [5,6], [6,6]
    ];

    /**
     * The Domino Tiles for the Game
     *
     * @var array
     */
    public $gameTiles = array();

    /**
     * The Stack with Tiles in the Deck
     *
     * @var Stack
     */
    public $deckStack;

    /**
     * The Stack with Tiles on the playboard
     *
     * @var Stack
     */
    public $boardStack;

    /**
     * Player 1
     * 
     * @var Player
     */
    public $player1;

        /**
     * Player 2
     * 
     * @var Player
     */
    public $player2;

    /**
     * Create an array of Tile's
     * 
     */
    function __construct() {     
        foreach ($this::ALL_TILES as $value) {
            $tile = new Tile($value);
            array_push($this->gameTiles, $tile);
        }
    }

    /**
     * Configure the Domino Game
     * @return Game
     */

    public function setupGame(): Game {

        // Get the available tiles in the game and
        // shuffle them to create a playable deckstack
        $this->deckStack = new Stack();
        $this->deckStack->addTiles( $this->shuffleDeck($this->gameTiles) );

        // Put the first random tile on the board
        $this->boardStack = new Stack();
        $this->exchangeTile($this->deckStack, $this->boardStack);

        $this->player1 = new Player('Ronald', new Stack());
        $this->player2 = new Player('Willem', new Stack());

        // Give each of the players 7 random tiles from the deck
        $this->exchangeTile($this->deckStack, $this->player1->stack, 7);
        $this->exchangeTile($this->deckStack, $this->player2->stack, 7);

        return $this;

    }

    /**
     * Begin the actual domino game 
     * 
     * @return void
     */
    public function begin(): void {
        
        // Start The Game
        echo GameMessage::startMessage($this->boardStack->getTiles());

        // Keep count of the turns to decide which player has the turn
        $turn = 0;

        while (count($this->deckStack->getTiles()) >= 0) {

            // Decide which player has the turn 
            if ($turn % 2 == 0) {
                $player = $this->player1;
            } else {
                $player = $this->player2;
            }

            // Player plays turn
            // Check if we has a tile in his stack to 
            // connect to the boardstack
            $this->playTurn($player);

            // If the player played his last tile
            // Stop the game and announce the winner
            if (count($player->stack->getTiles()) == 0) {
                echo GameMessage::winnerMessage($player->getName());
                break;
            }     
            // The player cannot connect a tile to the board and the deckstack is empty
            // Impossible to play further, so the player who is not able to play will lose. 
            elseif (empty($this->deckStack->getTiles())) {
                echo 'The deck is empty, game stuck. '. $player->getName() .' lost!'. PHP_EOL;
                break;
            }

            $turn++;
    
        }

    }


    /**
     * Player does a turn
     * 
     * @param Player $player
     * 
     */
    public function playTurn(Player $player) {

        // Get the values of the possible connection on the board
        // The first value or the last value of the board
        $firstValueOfBoard = $this->getBoardFirstTile()->getValue()[0];
        $lastValueOfBoard = $this->getBoardLastTile()->getValue()[1];

        $played = false;

        while (!$played) {

            // Compare tile values from the player stack 
            // with the start end of the board stack
            // if a a tile is possible to add to the board, make the play 
            // otherwise pick a new tile from the deck and try again
            foreach ($player->stack->getTiles() as $key=>$tile) {
                
                $tile = $tile->getValue();

                // Tile first value connects to last value of the board
                if ($tile[0] == $lastValueOfBoard) {
                    echo GameMessage::playTileMessage($player->getName(), $tile, $this->getBoardLastTile()->getValue());
                    $this->exchangeTile($player->stack, $this->boardStack, 1, $key, false);
                    $played = true;
                    break;
                } 
                // Tile last value connects to first value of the board
                elseif ($tile[1] == $firstValueOfBoard) {
                    echo GameMessage::playTileMessage($player->getName(), $tile, $this->getBoardFirstTile()->getValue());
                    $this->exchangeTile($player->stack, $this->boardStack, 1, $key, true);
                    $played = true;
                    break;
                }
                // Tile first value connects to first value of the board, when rotated
                elseif ($tile[0] == $firstValueOfBoard) {
                    $player->stack->getTile($key)->rotateTile();
                    echo GameMessage::playTileMessage($player->getName(), $tile, $this->getBoardFirstTile()->getValue());
                    $this->exchangeTile($player->stack, $this->boardStack, 1, $key, true);
                    $played = true;
                    break;
                }
                // Tile last value connects to last value of the board, when rotated
                elseif ($tile[1] == $lastValueOfBoard) {
                    $player->stack->getTile($key)->rotateTile();
                    echo GameMessage::playTileMessage($player->getName(), $tile, $this->getBoardLastTile()->getValue());                    
                    $this->exchangeTile($player->stack, $this->boardStack, 1, $key, false);
                    $played = true;
                    break;
                } 
            }
            
            // The player placed a new tile, show the new board
            if ($played == true) {
                echo GameMessage::showTheBoard($this->boardStack->getTiles());
            }

            if ($played == false) {

                if (empty($this->deckStack->getTiles())) {
                    echo GameMessage::unableToPlay($player->getName());
                    break;
                }
                else {
                    $lastElementKey = count($this->deckStack->getTiles()) - 1;
                    echo GameMessage::drawingTile($player->getName(), $this->deckStack->getTile($lastElementKey)->getValue());
                    $this->exchangeTile($this->deckStack, $player->stack, 1, $lastElementKey);   
                }
            }
        }        
    }


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
     * 
     */

    public function exchangeTile (Stack $fromStack, Stack $toStack, int $count = 1, int $key = 0, bool $addFirst = false ): void {
        for ($i = 0;  $i < $count; $i++) {
            $addFirst ? $toStack->addTileFirst($fromStack->getTile($key)) : $toStack->addTile($fromStack->getTile($key));       
            $fromStack->removeTile($key);
        }
    }

    /**
     * Shuffle the tiles in the deck randomly
     * 
     * @param array $array
     * @return array
     */
    
    public function shuffleDeck(array $array): array {
        shuffle($array);
        return $array;
    }

    /** 
     * Get the last tile of the board to compare against the players stack
     * 
     * @return Tile
    */
    public function getBoardLastTile(): Tile {
        $numberOfTiles = count($this->boardStack->getTiles()) - 1;
        return $this->boardStack->getTile($numberOfTiles);
    }

    /**
     * Get the first tile of the board to compare against the players stack
     * 
     * @return Tile
     */
    public function getBoardFirstTile(): Tile {
        return $this->boardStack->getTile(0);
    }
}