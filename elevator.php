<?php

class elevator
{

    protected $floor = 1;
    protected $passengers = [];

    protected $direction;

    protected $passengersInLine = [];

//    public function callElevator(human $human)
//    {
//        $this->floor = $human->getStartFloor();
//    }

    public function callElevator(human $human)
    {
        if(empty($this->passengers)) {
            $this->floor = $human->getStartFloor();
        } else {

            $allFinishFloors = [];

            foreach ($this->passengers as $key=> $passInElevator) {
                $allFinishFloors[] = $passInElevator->getFinishFloor();
            }

            if (!in_array($human->getFinishFloor(), $allFinishFloors)) {
                $this->passengers[] = $human;
            }
            if (!in_array($human->getStartFloor(), $allFinishFloors)) {

                $human->setFinishFloor($human->getStartFloor());
                $human->setStartFloor($this->floor);
                $this->passengers[] = $human;

                print_r($this->passengers) . "<br>";
            }
        }
    }

    private function getDirection(human $human)
    {
        return $human->getStartFloor() < $human->getFinishFloor();
    }

    public function pushTheButton(human $human)
    {
        if (empty($this->passengers)) {
            $this->passengers[] = $human;
            $this->direction = $this->getDirection($human);
        } else {
            if (!$this->direction == $this->getDirection($human)) {
                $this->passengersInLine[] = $human;
            } else {
                $this->passengers[] = $human;
            }
        }
    }

    public function moveHuman($key, $human)
    {
        $this->floor = $human->getFinishFloor();

        $human->setStartFloor($this->floor);
        $human->setFinishFloor(null);

        unset($this->passengers[$key]);

        echo 'The elevator arrived at ' . $this->floor . ' floor.' . "<br>";
    }

    public function run()
    {
        if ($this->direction) {
            usort($this->passengers, function (human $a, human $b) {
                return $a->getFinishFloor() > $b->getFinishFloor() ? 1 : -1;
            });

            /** @var human $human */
            foreach ($this->passengers as $key => $human) {
                $this->moveHuman($key, $human);
            }

            usort($this->passengersInLine, function (human $a, human $b) {
                return $a->getFinishFloor() < $b->getFinishFloor() ? 1 : -1;
            });

            foreach ($this->passengersInLine as $key => $human) {
                $this->moveHuman($key, $human);
            }
        } else {

            usort($this->passengers, function (human $a, human $b) {
                return $a->getFinishFloor() < $b->getFinishFloor() ? 1 : -1;
            });

            /** @var human $human */
            foreach ($this->passengers as $key => $human) {
                $this->moveHuman($key, $human);
            }

            usort($this->passengersInLine, function (human $a, human $b) {
                return $a->getFinishFloor() > $b->getFinishFloor() ? 1 : -1;
            });

            foreach ($this->passengersInLine as $key => $human) {
                $this->moveHuman($key, $human);
            }
        }
    }
}

