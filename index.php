<?php
require_once("BGClass.php");
$process = new BackgroundProcess();
$process->setCommand('/usr/bin/php bgprocess.php');
//if you want out or error log info to some file path
//$process->run('/var/www/bgprocess/bgprocess.out','/var/www/bgprocess/errorlog.out');
//if you dont bother for error or output
$process->run();
echo "<center>
	<h1>Back Ground Process</h1><hr>
	<label>Process Id:</label>
	<input type='text' id='pid' value=".$process->getPid().">
      </center>";
?>
<center><a id="notification" href="#">get notification</a></center>
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
