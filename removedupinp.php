<?php

function removeDuplicateChar ($str) { 
    assert(is_string($str)); 
    
    $start = 0 ; 
    $end = strlen($str) -1;
    
 
    while ($start < $end  ) { 
        
        $isDuplicateFound = false; 
        
        for($second =  $start +1 ; $second <= $end ; $second ++ ) { 
            
            if($str[$start] == $str[$second]){ 
                $isDuplicateFound  = true;
                break;      
            }
        }
         
      
        if($isDuplicateFound) {             
            for($rev = $second ; $rev < $end; $rev++) {
                $str[$rev] = $str[$rev +1];
            }
            
            $str[$rev]  = null;
            $str = trim($str);
            $end = strlen($str)-1;
           
        } else { 
             $start ++ ;
        }
        
    }
    
    return $str ; 
    
    
}
$myfile = fopen("removedup_inp.txt", "r") or die("Unable to open file!");
$str = trim(fread($myfile,filesize("removedup_inp.txt")));
fclose($myfile);
if (ctype_lower($str)) {
	echo "input text string: ". $str;
	echo "<br>";
	echo "output string: ". removeDuplicateChar($str);
}
else{
	echo "The input string $str does not consist of all lowercase letters.\n";
}


?>