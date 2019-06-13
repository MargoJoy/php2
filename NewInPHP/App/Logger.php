<?php
namespace App;

class Logger
{
    protected $path;
    protected $data;

    public function __construct()
    {
        $this->path = __DIR__ . '/Data/log.txt';
        if (file_exists($this->path)) {
            $this->data = file( $this->path, FILE_IGNORE_NEW_LINES | FILE_APPEND);
        }
    }

    public function append(\Exception $exception)
    {
        $date = date('c');
        $file = $exception->getFile();
        $message = $exception->getMessage();

        $logInfo = $date . '|' . $file . '|' . $message;
        $this->data[] = $logInfo;

    }

    public function save()
    {
        $this->data = implode("\n", $this->data);
        file_put_contents($this->path, $this->data);
    }
}

