<?php
    class DataAggregate
    {
        public $tested;
        public $confirmed;
        public $negative;
        public $released;
        public $deceased;

        public function __construct($confirmed,$tested,$negative,$released,$deceased)
        {
            $this->confirmed = $confirmed;
            $this->tested = $tested;
            $this->negative = $negative;
            $this->released = $released;
            $this->deceased = $deceased;
        }

        public function getTested()
        {
            return $this->tested;
        }
        public function getConfirmed()
        {
            return $this->confirmed;
        }
        public function getNegative()
        {
            return $this->negative;
        }
        public function getReleased()
        {
            return $this->released;
        }
        public function getDeceased()
        {
            return $this->deceased;
        }
    }
?>