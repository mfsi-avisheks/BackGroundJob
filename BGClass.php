<?php
class BackgroundProcess
{
    private $command;
    private $pid;

    public function __construct()
    {
        //$this->command = $command;
    }
    
    public function setCommand($command){
        $this->command = $command;
    }

    public function run($outputFile = '/dev/null',$errorlogFile = '/dev/null')
    {
        /*
        $c=sprintf(
            '%s > %s 2>&1 & echo $!',
            $this->command,
            $outputFile
        );
        */
        $c=sprintf(
            '%s > %s 2> %s & echo $!',
            $this->command,
            $outputFile,
            $errorlogFile
        );

        $this->pid=shell_exec($c);
    }

    public function isRunning()
    {
        try {
            $result = shell_exec(sprintf('ps %d', $this->pid));
            if(count(preg_split("/\n/", $result)) > 2) {
                return true;
            }
        } catch(Exception $e) {}

        return false;
    }

    public function getPid()
    {
        return $this->pid;
    }
    public function setPid($pid){
        $this->pid=$pid;
    }
}