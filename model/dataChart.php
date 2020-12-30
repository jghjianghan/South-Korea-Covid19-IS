<?php
    class DataChart{
        public $date;
        public $newCases;

        public function __construct($date,$newCases)
        {
            $this->date = $date;
            $this->newCases = $newCases;            
        }
        
        public function getDate()
        {
            return $this->date;
        }

        public function getNewCases()
        {
            return $this->newCases;
        }
    }
?>