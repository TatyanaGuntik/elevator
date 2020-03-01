<?php


class human
{
    protected $startFloor;
    protected $finishFloor;

    public function __construct($start, $finish)
    {
        $this->startFloor = $start;
        $this->finishFloor = $finish;
    }

    public function getStartFloor()
    {
        return $this->startFloor;
    }

    public function setStartFloor($startFloor)
    {
        $this->startFloor = $startFloor;
    }

    public function getFinishFloor()
    {
        return $this->finishFloor;
    }

    public function setFinishFloor($finishFloor)
    {
        $this->finishFloor = $finishFloor;
    }
}