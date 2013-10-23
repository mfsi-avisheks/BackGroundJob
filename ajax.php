<?php
require_once("BGClass.php");

$process = new BackgroundProcess();
$process->setPid($_POST['pid']);
if($process->isRunning()){
    echo $_POST['pid'].' =>still running.....';
}else{
    echo $_POST['pid'].' =>processing done....';
}