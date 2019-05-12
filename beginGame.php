<?php 
require __DIR__ ."/vendor/autoload.php";
use DominoGame\Game\Game;


$game = new Game();
$game->setupGame()->begin();

