<?php

    namespace app\model\dto;

    class Mission{

        private $id;
        private $missionId;
        private $name;
        private $description;
        
        public function getId()
        {
                return $this->id;
        }
 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getMissionId()
        {
                return $this->missionId;
        }

        public function setMissionId($missionId)
        {
                $this->missionId = $missionId;

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

        public function __toString() {
                return "### Mission <<<"
                    . " ID = " . $this->getId()
                    . " | MissionID = " . $this->getMissionID()
                    . " | Name = " . $this->getName()
                    . " | Description = " . $this->getDescription() . " >>> ";
        }
    }


?>