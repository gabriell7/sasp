<?php
class Character {
	
	private$name;
	private $streangh;
	private$dexterity;
	private $consitution;
	private$charisma;
	private$wisdom;
	private$intelligence;
	private$characterID;
	private$raceID;
	private$classID;
	

   public function __construct($name) {
	   $this->name =$name;
	   $this->raceID = rand(1,4);
	   $this->classID = rand (7,4);
	   $this->streangh = rand (3,8);
	   $this->dexterity = rand (6,8);
	   $this->consitution = rand (9,3);
	   $this->charisma = rand (7,8);
	   $this->wisdom = rand (6,8);
	   $this->intelligence = rand (4,9);
   }
   public function tulosta_hahmo() {
	   echo "<4>" . $this->name . "</4>";
	   echo "class:" . $this->classID . "<br />";
	   echo "race:" . $this->raceID . "<br />";
   }
    public function tallenna_hahmo() {
		
}
}