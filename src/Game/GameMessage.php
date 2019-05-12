<?php
namespace DominoGame\Game; 

final class GameMessage implements GameMessageInterface
{   
    /**
     * 
     * @param array $array
     * @return string
     */

    public static function startMessage(array $array): string {
        $startMessage = 'Game starting with first tile: ';
        
        foreach ($array as $tile) {
            $tile = $tile->getValue();
            $startMessage .= '<'. $tile[0] .':'. $tile[1] .'>'. PHP_EOL;
        }

        return $startMessage;  
    }

    /**
     * 
     * @param string $playerName
     * @param array $playingTile
     * @param array $boardTile
     * @return string
     */

    public function playTileMessage(string $playerName, array $playingTile, array $boardTile): string {
        return $playerName .' plays <'. $playingTile[0] .':'. $playingTile[1] .'> to connect to tile <'. $boardTile[0] .':'. $boardTile[1].'> on the board'. PHP_EOL;
    }

    /**
     * 
     * @param string $playerName
     * @param array $tileValue
     * @return string
     */

    public static function drawingTile(string $playerName, array $tileValue): string {
        return $playerName .' can\'t play, drawing tile <'. implode(":", $tileValue) .'>'. PHP_EOL;
    }

    /**
     * @param string
     * @return string
     */


    public static function unableToPlay(string $playerName): string {
        return $playerName .' is stuck, unable to play or pick new tile'. PHP_EOL;
    }

    /**
     * @param array
     * @return string
     */

    public static function showTheBoard(array $array): string {
        $boardMessage = 'Board is now: ';
        foreach($array as $tile) {
            $tile = $tile->getValue();
            $boardMessage .= '<'. implode(':', $tile) .'> ';
        }
        $boardMessage .= PHP_EOL;

        return $boardMessage;
    }

    /**
     * 
     * @param string $playerName
     * @return string
     */

    public static function winnerMessage(string $playerName): string {
        return 'Player '. $playerName .' has won!';
    }


}