<?php
/*
$output = shell_exec('sleep 5 > /dev/null 2>&1 & echo $!');
echo "<pre>$output</pre>";
exit;

*/
require_once("BGClass.php");
$process = new BackgroundProcess();
$process->setCommand('/usr/bin/php bgprocess.php');
$process->run('/var/www/bgprocess/bgprocess.out','/var/www/bgprocess/errorlog.out');
echo "<input type='text' id='pid' value=".$process->getPid().">";
/*
echo sprintf('Crunching numbers in process %d', $process->getPid());
while ($process->isRunning()) {
    echo '.';
    sleep(1);
}
echo "\nDone.\n";
*/

?>
<a id="notification" href="#">get notification</a>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
    $(document).ready(function(){
        $("#notification").click(function(){
            var ds="pid="+$("#pid").val();
            var url="ajax.php";            
            
            $.ajax({  
                    type: "POST",  
                    url: url,  
                    data: ds, 
                    timeout:30000,
                    success: function(response){
                        if(response){
                            alert(response);
                        }else{
                            alert('Cannot retrieve reponse at this time. Please try later.');
                        }  
                    },  
                    error: function(response) {
                        alert('Cannot retrieve reponse at this time. Please try later.');
                    }
            });

        });
    });
</script>
