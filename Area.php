<?php
class Area {
    private $id;
    private $name;
    private $description;
    private $facilities;
    private $noOfProperties;
    
    public function __construct($id, $n, $d, $f, $nP) {
        $this-> id = $id;
        $this-> name = $n;
        $this-> description = $d;
        $this-> facilities = $f;
        $this-> noOfProperties = $nP;
    }
    
    /* seeting up the get methods so they can be used in other classes */
    
    public function getID() { return $this->id; }
    public function getName() {return $this->name; } 
    public function getDescription() { return $this->description; }
    public function getFacilities() { return $this->facilities; }
    public function getNoOfProperties() { return $this->noOfProperties; }
}