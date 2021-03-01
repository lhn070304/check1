<?php
namespace MyGreeter;


class Greeting
{
    private $pm6;
    private $pm12;
    private $am12;
    private $nowTime;

    public function __construct(){
        $this->setTimes();
    }

    private function setTimes():void {
        $am0 = strtotime("today");
        $am12 = $am0+60*60*12;
        $am18 = $am0+60*60*18;
        $am24 = $am0+60*60*24;
        $this->pm12 = $am0;
        $this->am12 = $am0+60*60*12;
        $this->pm6 = $am0+60*60*18;
        $nowTime = time();

        if($am12 <= $nowTime && $am18 > $nowTime){
            $this->pm12 = $am0+60*60*24;
        }else if($am18 <= $nowTime && $am24 > $nowTime){
            $this->pm12 = $am0+60*60*24;
            $this->am12 = $am12+60*60*24;
        }else{
            $this->pm12 = $am0;
            $this->am12 = $am0+60*60*12;
        }

        $this->nowTime = $nowTime;
    }

    public function greeting():string {
        return $this->getMessage($this->nowTime);
    }

    private function getMessage(int $nowTime):string {
        if($this->am12 <= $nowTime && $this->pm12 > $nowTime){
            return 'Good morning';
        }else if($this->pm12 <= $nowTime && $this->pm6 > $nowTime){
            return 'Good afternoon';
        }else if($this->pm6 <= $nowTime && $this->am12 > $nowTime){
            return 'Good evening';
        }else{
            return '';
        }
    }
}