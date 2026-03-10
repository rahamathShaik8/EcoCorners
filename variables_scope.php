<?php
    echo "data types (8) - string ,integer,boolean ,float ,null,resource,array,object";
    $name ="rahamath";
    $age=19;
    $is_student=true;
    $grade=8.6;
    $address=null;
    $subjects=array("WT","IOR","CD","DSP","COA");
    echo "<br>";
    echo "Name: ".$name."<br>"."data type of name is ".gettype($name)."<br>";
    echo "Age: ".$age."<br>"."data type of age is ".gettype($age)."<br>";
    echo "Is Student: ".$is_student."<br>"."data type of is_student is ".gettype($is_student)."<br>";
    echo "Grade: ".$grade."<br>"."data type of grade is ".gettype($grade)."<br>";
    echo "Address: ".$address."<br>"."data type of address is ".gettype($address)."<br>";
    echo "Subjects: ".implode(", ",$subjects)."<br>"."data type of subjects is ".gettype($subjects)."<br>";
    class student{
        public $sname;
        public $sid;
        function display(){
            return "Student Name: ".$this->sname."<br>"."Student ID: ".$this->sid."<br>";
        }
    }
    $s1=new student;
    $s1->sname="habeeba";
    $s1->sid=1;
    echo $s1->display();
    echo "data type of s1 is ".gettype($s1)."<br>";
    $file=fopen("variables_scope.php","r");
    echo "data type of file is ".gettype($file)."<br>";
    fclose($file);
    echo "<br>Scopes of variables:local,global,static<br>";
    echo "hello world<br>";
    $name="rehana";#global variable
    function greet()
    {
       // $name=" rehana";#local variable 
        //echo "hello".'$name';  ,o/p :hello$name
       // echo "hello"."$name"; o/p :hello rehana
       global $name;
       echo "hello"." $name";    
    }
    greet();
    function incr()
    {
       static $age=19; //static variable
        $age++;
        print "<br> age is : $age"; //we can use print/echo 
    }
    incr();
    incr();
    incr();
    echo "<br>the type of variable is:".gettype($name);
    //var_dump() can't be concatenated
    echo "<br>The type of varaible is :";
    var_dump($name);
?>
     
