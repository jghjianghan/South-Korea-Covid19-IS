<?php
    class ContohUser{
        //atribut
        protected $id;
        
        //constructor
        public function __construct($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }
    }
?>
