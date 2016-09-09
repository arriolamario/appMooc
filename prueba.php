<?php 
class A 
{ 
    function __construct() 
    { 
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            echo "__construct<br>";
            call_user_func_array(array($this,$f),$a); 
        } 
    } 
    
    function __construct1($a1) 
    { 
        echo('__construct with 1 param called: '.$a1.PHP_EOL); 
        echo "<br>";
    } 
    
    function __construct2($a1,$a2) 
    { 
        echo('__construct with 2 params called: '.$a1.','.$a2.PHP_EOL); 
        echo "<br>";
    } 
    
} 
$o = new A('sheep'); 
$o = new A('sheep','cat'); 
$o = new A('sheep','cat','dog'); 
$o = new A('sheep','cat','dog',"asd"); 

// results: 
// __construct with 1 param called: sheep 
// __construct with 2 params called: sheep,cat 
// __construct with 3 params called: sheep,cat,dog 
?>