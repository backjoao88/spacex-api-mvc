<?php

    namespace app\model\dto;

    class Rocket{

        private $id;
        private $rocketId;
        private $name;
        private $description;
        private $firstFlight;
        private $height;
        private $diameter;
        private $mass;
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

        public function getRocketId()
        {
                return $this->rocketId;
        }
 
        public function setRocketId($rocketId)
        {
                $this->rocketId = $rocketId;

                return $this;
        }

        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;

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

        public function getFirstFlight()
        {
                return $this->firstFlight;
        }
 
        public function setFirstFlight($firstFlight)
        {
                $this->firstFlight = $firstFlight;

                return $this;
        }

        public function getHeight()
        {
                return $this->height;
        }

        public function setHeight($height)
        {
                $this->height = $height;

                return $this;
        }

        public function getDiameter()
        {
                return $this->diameter;
        }

        public function setDiameter($diameter)
        {
                $this->diameter = $diameter;

                return $this;
        }

        public function getMass()
        {
                return $this->mass;
        }

        public function setMass($mass)
        {
                $this->mass = $mass;

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
                return "### Rocket <<<"
                    . " ID = " . $this->getId()
                    . " | RocketID = " . $this->getRocketID()
                    . " | Name = " . $this->getName()
                    . " | Description = " . $this->getDescription()
                    . " | FirtsFlight = " . $this->getFirstFlight()->format('d-m-Y')
                    . " | Height = " . $this->getHeight()
                    . " | Diameter = " . $this->getDiameter()
                    . " | Mass = " . $this->getMass()
                    . " | Image = " . $this->getImage() . " >>> ";
        }
    }

?>