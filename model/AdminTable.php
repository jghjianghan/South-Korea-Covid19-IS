<?php
    class AdminTable{
        public $date;
        public $newCase;
        public $confirmed;
        public $released;
        public $deceased;

        public function __construct($date,$newCase,$confirmed,$released,$deceased)
        {
            $this->date = $date;
            $this->newCase = $newCase;
            $this->confirmed = $confirmed;
            $this->released = $released;
            $this->deceased = $deceased;
        }

        public function getDate()
        {
            return $this->date;
        }
        public function getNewCase()
        {
            return $this->newCase;
        }
        public function getConfirmed()
        {
            return $this->confirmed;
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