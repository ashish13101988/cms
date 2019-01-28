<?php

/*
class Greet{
    
    function greeting(){
        
        echo "good moning";
    }
    function greeting2(){
        
        echo "good evening";
    }
}

 $class_methods = get_class_methods('Greet');

 foreach($class_methods as $greet){
    
 echo $greet."</br>";
}

    $morning = new greet();

    $morning->greeting();
echo "<br>";
    $morning->greeting2();
*/


/*
class Cars{
    
    var $door =4;
    
    function distance($time,$speed){
        
      return $distance = $time*$speed;
    }
}

class Truck extends Cars{
    
    
}

$toyota = new Truck();



echo $toyota->distance(2,40);
*/


//getter and setters


    class Cars{
        
        private $door_count = 4;
        
        function get_value(){
            
            echo $this->door_count;
        }
        
        function set_value(){
            
            $this->door_count  = 10;
        }       
    }

        $toyota = new Cars();
//        echo $toyota->door_count;
        
        $toyota->set_value();
        $toyota->get_value();
?>