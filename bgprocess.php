<?php
//echo "to output file";

//error_log("to errorlog file");


for($i=0;$i<5000;$i++) {
    for($j=0;$j<50000;$j++) {
        //echo $i.'=>'.$j;
    }
    //echo '\n';
}

echo "to output file";  

error_log("to errorlog file");
//echo "<script>alert('hello')</script>";

fopen("AV".time(),"w");

//passthru("/usr/bin/php success.php >> /var/www/error.log 2>&1");
