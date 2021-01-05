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

        /**
         * mengurangi nilai semua atribut object ini dengan objek DataAggregate yang lain
         * @param other object DataAggregate sebagai pengurang
         */
        public function subtract($other){
            if (!is_null($this->tested) && !is_null($other->tested)) $this->tested -= $other->tested;
            if (!is_null($this->confirmed) && !is_null($other->confirmed)) $this->confirmed -= $other->confirmed;
            if (!is_null($this->negative) && !is_null($other->negative)) $this->negative -= $other->negative;
            if (!is_null($this->released) && !is_null($other->released)) $this->released -= $other->released;
            if (!is_null($this->deceased) && !is_null($other->deceased)) $this->deceased -= $other->deceased;
        }
    }
?>