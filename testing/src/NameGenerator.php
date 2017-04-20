<?php

    Class NameGenerator
    {
        public $length;
        public $characters =  [ 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z' ];
        public $name;


        public function __construct($length, $characters = null)
        {
            if (! is_null($characters)) {
               $this->characters = $characters;
            }
            $this->length = $length;
        }

        public function generateName(){

            $name = '';
            for ($i = 0; $i < $this->length; $i++) {
                $name .= $this->characters[rand(0,count($this->characters)-1)];
            }
            return $name;
        }

        public function upperFirstLetter()
        {
            $this->name[0] = strtoupper($this->name[0]);
        }

        public function setCharacters($characters){
            $this->characters = $characters;
        }

        public function addAlias()
        {
            $this->setLength(3);
            $alias = $this->generateName();
            $this->name .= ' a.k.a. '. $alias;
        }


        public function setName($name)
        {
            $this->name = $name;
        }

        public function getName($name)
        {
            return $this->name;
        }


        public function setLength($length)
        {
            if (is_numeric($length)){
                $this->length = $length;
            } else {
                throw new NotANumberException('Shiiiiiit');
            }
        }

        public function getLength()
        {
           return $this->length();
        }




    }