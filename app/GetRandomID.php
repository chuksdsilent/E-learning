<?php

namespace App;

class GetRandomID {
    
    protected $random_id = "";
    /**
     * Class constructor.
     */
    
    public function __construct($random_id = null)
    {
        $this->random_id = $random_id;
    }    

    public function getID(){
        return $this->random_id;
    }
}
