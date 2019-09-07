<?php

    namespace app\model\dto;

    class Launch{

        private $id;
        private $flightNumber;
        private $date;
        private $rocket;
        private $mission;
        private $description;
        private $image;
    
        public function getId()
        {
                return $this->id;
        }
         
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getFlightNumber()
        {
                return $this->flightNumber;
        }

        public function setFlightNumber($flightNumber)
        {
                $this->flightNumber = $flightNumber;

                return $this;
        }
 
        public function getDate()
        {
                return $this->date;
        }

    
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }

        public function getRocket()
        {
                return $this->rocket;
        }
 
        public function setRocket($rocket)
        {
                $this->rocket = $rocket;

                return $this;
        }
 
        public function getMission()
        {
                return $this->mission;
        }
 
        public function setMission($mission)
        {
                $this->mission = $mission;

                return $this;
        }

        public function getDescription()
        {
                return $this->description;
        }
         
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        public function getImage()
        {
                return $this->image;
        }

        public function setImage($image)
        {
                $this->image = $image;

                return $this;
        }

        public function __toString() {
                return "### Launch <<<"
                    . " ID = " . $this->getId()
                    . " | FlightNumber = " . $this->getFlightNumber()
                    . " | Date = " . $this->getDate()->format('d-m-Y')
                    . " | ObjectRocket = " . $this->getRocket()
                    . " | ObjectMission = " . $this->getMission()
                    . " | Description = " . $this->getDescription()
                    . " | Image = " . $this->getImage() . " >>> ";
        }
    }

?>