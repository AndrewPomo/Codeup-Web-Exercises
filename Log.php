<?php 

class Log

{
	protected $filename;
	protected $handle;
	public function logMessage($logLevel, $message)
	{
		fwrite($this->handle, date('Y-m-d')." ".date('H:i:s')."[$logLevel] $message\n");
	}

	protected function setFileName($fileName)
    {
        if (!is_string($filename))
        {
        	echo "Filename must be a string!";
        	die();
    	}
    }

	public function info($message)
	{
		$this->logMessage("INFO", $message);
	}

	public function error($message)
	{
		$this->logMessage("ERROR", $message);
	}

	public function __construct($prefix = 'log')
    {
		$this->prefix = $prefix;
		$this->filename = $this->prefix."-".date('Y-m-d').".log";
		$this->handle = fopen($this->filename, 'a');
    }

    public function __destruct()
    {
		fclose($this->handle);
        
    }
}

 ?>