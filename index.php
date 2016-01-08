<!DOCTYPE html>
<html>
   <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <title></title>
   </head>
   <body>
        <?php 
                if(winner('x',$squares)) echo 'You Win!';
                else if(winner('o',$squares)) echo 'I Win!';
                else echo 'No Winner Yet!'; 
                echo 'Hi There!';
        ?>
   </body>   
</html>
<?php
    function winner ($token, $position){
        $won = false; 
 
        //line 40 starts a loop to check for horizontal lines
        //3*$row represents a row (3*0 = row 1, 3*1+1 = row 4, 3*2+2 = row 7) 
        //$token represents 
        for($row=0; $row<3; $row++){
            for($col=0; $col<3; $col++){
                if ($position[3*$row+$col] == $token)
                    $won=true;
                else{
                    $won = false; 
                    break; 
                }
            }
            if($won = true) 
                break; 
        }
        //line 53 checks for verticals
        for($col=0; $col<3; $col++){
         for($row=0; $row<3; $row++){
             if ($position[$col+3*$row] == $token)
                 $won=true;
             else{
                 $won = false; 
                 break; 
             }
         }
         if($won = true) 
             break; 
        }
        //line66 checks for 1 diaganol win
        for($row=0; $row<3; $row++){
            if (($position[$row] == $token) && ($position[$row+1]
             == $token) && ($position[3*$row+2] == $token)) 
                $won = true;
        }
    }
?>
