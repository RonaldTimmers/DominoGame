# Domino Game Case

Goal: Create a non-interactive domino game. 

--- 

# Initiate the Game

`php beginGame.php`

---

# Example Game

Game starting with first tile: <4:6>

Ronald plays <4:4> to connect to tile <4:6> on the board

Board is now: <4:4> <4:6>

Willem plays <2:6> to connect to tile <4:6> on the board

Board is now: <4:4> <4:6> <6:2>

Ronald plays <1:2> to connect to tile <6:2> on the board

Board is now: <4:4> <4:6> <6:2> <2:1>

Willem plays <0:4> to connect to tile <4:4> on the board

Board is now: <0:4> <4:4> <4:6> <6:2> <2:1>

Ronald plays <1:4> to connect to tile <2:1> on the board

Board is now: <0:4> <4:4> <4:6> <6:2> <2:1> <1:4>

Willem plays <0:6> to connect to tile <0:4> on the board

Board is now: <6:0> <0:4> <4:4> <4:6> <6:2> <2:1> <1:4>

Ronald plays <3:6> to connect to tile <6:0> on the board

Board is now: <3:6> <6:0> <0:4> <4:4> <4:6> <6:2> <2:1> <1:4>

Willem plays <3:3> to connect to tile <3:6> on the board

Board is now: <3:3> <3:6> <6:0> <0:4> <4:4> <4:6> <6:2> <2:1> <1:4>

Ronald plays <3:5> to connect to tile <3:3> on the board

Board is now: <5:3> <3:3> <3:6> <6:0> <0:4> <4:4> <4:6> <6:2> <2:1> <1:4>

Willem can't play, drawing tile <4:5>

Willem plays <4:5> to connect to tile <1:4> on the board

Board is now: <5:3> <3:3> <3:6> <6:0> <0:4> <4:4> <4:6> <6:2> <2:1> <1:4> <4:5>

Ronald plays <5:6> to connect to tile <4:5> on the board

Board is now: <5:3> <3:3> <3:6> <6:0> <0:4> <4:4> <4:6> <6:2> <2:1> <1:4> <4:5> <5:6>

Willem plays <1:6> to connect to tile <5:6> on the board

Board is now: <5:3> <3:3> <3:6> <6:0> <0:4> <4:4> <4:6> <6:2> <2:1> <1:4> <4:5> <5:6> <6:1>

Ronald plays <1:5> to connect to tile <6:1> on the board

Board is now: <5:3> <3:3> <3:6> <6:0> <0:4> <4:4> <4:6> <6:2> <2:1> <1:4> <4:5> <5:6> <6:1> <1:5>

Player Ronald has won!


