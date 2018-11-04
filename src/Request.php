<?php

namespace Karamel\Http;

use Karamel\Http\Models\UplodedFile;

class Request
{
    private static $instance;
    private $request;
    private $files;
    private $server;

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new Request();
        return self::$instance;
    }

    public function __construct()
    {
        $this->request = $_REQUEST;
        $this->files = $_FILES;
        $this->server = $_SERVER;
    }

    public function input($name, $default = null)
    {
        return isset($this->request[$name]) ? trim($this->request[$name]) : $default;
    }

    public function file($name)
    {
        return isset($this->files[$name]) ? new UplodedFile($this->files[$name]) : null;
    }
}