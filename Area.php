<?php
class Area {
    private $id;
    private $address;
    private $description;
    private $facilities;
    
    public function __construct($id, $a, $d, $f) {
        $this-> id = $id;
        $this-> address = $a;
        $this-> description = $d;
        $this-> facilities = $f;
    }
    
    /* seeting up the get methods so they can be used in other classes */
    
    public function getID() { return $this->id; }
    public function getAddress() {return $this->address; } 
    public function getDescription() { return $this->description; }
    public function getFacilities() { return $this->facilities; }
}