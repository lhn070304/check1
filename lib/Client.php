<?php
namespace MyGreeter;


class Client
{
    public function getGreeting(){
        $obj = new Greeting();
        $message = $obj->greeting();
        print $message;
        return $message;
    }
}