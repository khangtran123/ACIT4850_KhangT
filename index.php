<!DOCTYPE html>
<html>
   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <title></title>
   </head>
   <body>
        <?php
            
            //line 10 gets the input from url "xoxoxoxo" from url /?board=xoxoxo
            $position = $_GET['board'];
            //line 12 splits the string into it squares for the board
            $squares = str_split($position);
            //creates the new game
            $game = new Game($squares);
            //calling on the AI function 
            $game->bot(); 
            //calling on the display function to draw the board 
            $game->display(); 
            
            if($game->winner('x')){
                //echo '<br/>';
                echo 'You Win!';
            }
            else if($game->winner('o')) {
                //echo '<br/>';
                echo 'I Win!';
            }
            else {
                //echo '<br/>';
                echo 'No Winner Yet!';
            }
            
        ?>
   </body>   
</html>
<?php 
    
    class Game{
        
        var $position; 
        var $board = '---------';

        function __construct($squares) {
            $this->position = $squares;
        }
        
        //This function displays the basic tic tac toe table
        function display() {
            echo 'Welcome to Khang\'s Tic Tac Toe Game!';
            echo '<font size = "5">';
            echo '<table cols=”3” border="1" style=”font­size:large; font­weight:bold”>';
            echo '<tr>'; // open the first row
            for ($pos=0; $pos<9;$pos++) {
              echo $this->show_cell($pos);
              if ($pos %3 == 2){ 
                  echo '</tr><tr>'; // start a new row for the next square
              }
            } 
            echo '</tr>'; // close the last row
            echo '</table>';
            //this form action is for starting a new game
            echo '<form action>';
            echo '<div>';
                //this is a hidden input button that gets triggered when the 
                //submit button is clicked
                echo '<input type="hidden" name="board" value="---------"/>';
		echo '<input type="submit" name="button" value="Start a New Game"/>';
            echo '</div>';
        echo '</form> </br>';
        //this displays the new game message when the board is at a new game state
        if($this->board == '---------'){
                $this->display_message('new game'); 
            } else{
                echo ''; 
            }
        }

        
        function winner ($token){
        $won = false; 

        //line 37 starts a loop to check for horizontal lines
        //3*$row represents a row (3*0 = row 1, 3*1+1 = row 4, 3*2+2 = row 7) 
        //$token represents 
        for($row=0; $row<3; $row++){
            for($col=0; $col<3; $col++){
                if ($this->position[3*$row+$col] == $token){
                    $won=true;
                }else{
                    $won = false; 
                    break; 
                }
            }
            if($won == true){ 
                return true;
            }
        }

        //line 52 checks for verticals
        for($col=0; $col<3; $col++){
         for($row=0; $row<3; $row++){
             if ($this->position[$col+3*$row] == $token){
                 $won=true;
             }else{
                 $won = false; 
                 break; 
             }
        }
         if($won == true){ 
             return true;
         } 
        }

        //this condition checks for the diagonal wins
        $row = 0; 
        if (($this->position[$row] == $token) && ($this->position[$row + 4] == $token)
             && ($this->position[$row + 8] == $token)){
            $won = true; 
        } else  if (($this->position[$row + 2] == $token) && ($this->position[$row + 4] == $token)
             && ($this->position[$row + 6] == $token)){
            $won = true; 
        } else{
            $won = false; 
        }  
    
        return $won; 
       }
       
        function show_cell($which){
           $token = $this->position[$which];
           // deal with the easy case
           if($token <> '-'){
               return '<td>'.$token.'</td>'; 
           }
           //now the hard case
           $this->newposition = $this->position; //copy the original     
           $this->newposition[$which] = 'x'; //this would be their move
           $move = implode($this->newposition); //make a string from the board array
           $link = '?board='.$move; //this is what we want the link to be
           //so return a cell containing an anchor and showing a hyphen 
           return '<td><a href="'.$link.'">-</a></td>'; 
        }
        //This is a simple AI bot 
        function bot(){
            //this for loops iterates through the entire board and finds a - 
            //and replaces it with a o
            $this->board = implode($this->position); 
            for($i=0; $i<8; $i++){
                //this generates a random square and assigns it to var $i 
                $i = rand(0, 8); 
                //this condition checks to see if the square is - and that 
                //the player x starts first
                if($this->position[$i] == '-' && $this->board != '---------'){
                    $this->position[$i] = 'o'; 
                    break; 
                } 
            }
        }
        
        //this function basically displays the message
        function display_message($message){
            
            switch($message){
                case 'new game':
                    echo "Shall we begin! To start, click on a box to place your x. ";
            }
            
        }
    }
    
?>

