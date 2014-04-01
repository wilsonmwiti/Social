<?php

namespace Core;

class Route{
    
    private $method;
    private $pattern;
    private $callable;
    private $arguments;

    public function __construct($method, $pattern, $callable){
        $this->method    = $method;
        $this->pattern   = $pattern;
        $this->callable  = $callable;
        $this->arguments = array();
    }

    public function match($method, $uri){
        if ($method !== $this->method) {
            return false;
        }

        if (preg_match($this->compilePattern(), $uri, $this->arguments)) {
            array_shift($this->arguments);

            return true;
        }

        return false;
    }

    public function getMethod(){
        return $this->method;
    }
    
    public function getPattern(){
        return $this->pattern;
    }

    public function getCallable(){
        return $this->callable;
    }

    public function getArguments(){
        return $this->arguments;
    }

    private function compilePattern(){
        return sprintf('#^%s/?$#', $this->pattern);
    }
}
