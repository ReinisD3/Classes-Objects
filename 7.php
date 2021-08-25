<?php
//The questions in this exercise all deal with a class Dog that you have to program from scratch.
//
//Create a class Dog. Dogs should have a name, and a sex.
//Make a class DogTest with a Main method in which you create the following Dogs:
//Max, male
//Rocky, male
//Sparky, male
//Buster, male
//Sam, male
//Lady, female
//Molly, female
//Coco, female
//Change the Dog class so that each dog has a mother and a father.
//Add to the main method in DogTest, so that:
//Max has Lady as mother, and Rocky as father
//Coco has Molly as mother, and Buster as father
//Rocky has Molly as mother, and Sam as father
//Buster has Lady as mother, and Sparky as father
//Change the dog class to include a method fathersName that return the name of the father. If the father reference is null, return "Unknown". Test in the DogTest main method that it works.
//referenceToCoco.FathersName() returns the string "Buster"
//referenceToSparky.FathersName() returns the string "Unknown"
//Change the dog class to include a method boolean HasSameMotherAs(Dog otherDog). The method should return true on the call
//referenceToCoco.HasSameMotherAs(referenceToRocky). Show that the new method works in the DogTest main method.


class Dog
{
    public string $name;
    public string $sex;
    public string $mother;
    public string $father;

    function __construct($name,$sex,$mother = 'Unknown',$father = 'Unknown')
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }
    public function fathersName():string
    {
        return $this->father ;
    }
    function HasSameMotherAs(Dog $otherDog):string
    {
        return $this->mother === $otherDog->mother ? "True" : 'False' ;
    }
}



class DogTest extends Dog
{
    public static function Main()
    {
       $referenceToMax = new Dog('Max','male','Lady','Rocky');
       $referenceToRocky = new Dog('Rocky','male','Molly','Sam');
       $referenceToBuster = new Dog('Buster','male','Lady','Sparky');
       $referenceToSam = new Dog('Sam','male');
       $referenceToSparky = new Dog('Sparky','male');
       $referenceToLady = new Dog('Lady','female');
       $referenceToMolly = new Dog('Molly','female');
       $referenceToCoco = new Dog('Coco','female','Molly','Buster');

       echo "should return 'Buster' --> ".$referenceToCoco->fathersName().PHP_EOL;
       echo "should return 'Unknown' -->".$referenceToSparky->fathersName().PHP_EOL;
       echo "checking if Coco has same mother as Rocky -- > ".$referenceToCoco->HasSameMotherAs($referenceToRocky).PHP_EOL;

    }
}
DogTest::Main();

