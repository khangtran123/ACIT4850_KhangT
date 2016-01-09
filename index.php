<!DOCTYPE html>
<html>
   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <title></title>
   </head>
   <body>
        <?php
            //starts a new tic tac toe game
            new Game();
        ?>
   </body>   
</html>
<?php 
    
    class Game{
        var $position; 

        function __construct() {
            $this->position = str_split($squares);
        }

        //This function displays the basic tic tac toe table
        function display() {
            echo 'Welcome to Khang\'s Tic Tac Toe Game!';
            echo '<table cols=”3” style=”font­size:large; font­weight:bold”>';
            echo '<tr>'; // open the first row
            for ($pos=0; $pos<9;$pos++) {
              echo '<td>'. $this->position[$pos] .'</td>';
              if ($pos %3 == 2){ 
                  echo '</tr><tr>'; // start a new row for the next square
              }
            } 
            echo '</tr>'; // close the last row
            echo '</table>';
        }

   
        /*
        if(winner('x',$squares)) echo 'You Win!';
        else if(winner('o',$squares)) echo 'I Win!';
        else echo 'No Winner Yet!'; 
        echo 'Hi There!';*/


        function winner ($token, $position){
        $won = false; 

        //line 37 starts a loop to check for horizontal lines
        //3*$row represents a row (3*0 = row 1, 3*1+1 = row 4, 3*2+2 = row 7) 
        //$token represents 
        for($row=0; $row<3; $row++){
            for($col=0; $col<3; $col++){
                if ($position[3*$row+$col] == $token){
                    $won=true;
                }else{
                    $won = false; 
                    break; 
                }
            }
            if($won == true){ 
                break;
            }
        }

        //line 52 checks for verticals
        for($col=0; $col<3; $col++){
         for($row=0; $row<3; $row++){
             if ($position[$col+3*$row] == $token){
                 $won=true;
             }else{
                 $won = false; 
                 break; 
             }
         }
         if($won == true){ 
             break;
         }
        }

        //line68 checks for one diaganol win
        $row = 0; 
        if (($position[$row] == $token) && ($position[$row + 4] == $token)
             && ($position[$row + 8] == $token)){
            $won = true; 
        } else{
            $won = false; 
        }

        //line 76 checks for the other diagonal win 
        if (($position[$row + 2] == $token) && ($position[$row + 4] == $token)
             && ($position[$row + 6] == $token)){
            $won = true; 
        } else{
            $won = false; 
        }
       }
    }
?>

