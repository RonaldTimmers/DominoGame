<?php 
namespace DominoGame\Game;
use DominoGame\Elements\Player;
use DominoGame\Elements\Stack;

interface GameMessageInterface
{
    public static function startMessage(array $array): string;

}