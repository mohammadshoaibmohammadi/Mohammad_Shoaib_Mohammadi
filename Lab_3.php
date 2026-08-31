<?php



// Task 1
//  Create and Use a Class Constant
// I create class by the name of libarary
class Library
{
    // "const" is used to create a constant.
    // MAX_BOOKS is the name of the constant.
    // The value of MAX_BOOKS is 3.
    // This value is fixed and cannot normally be changed.
    const MAX_BOOKS = 3;
}

// "echo" is used to display information on the screen.
echo "Maximum books allowed: " . Library::MAX_BOOKS;
echo "<br>";

// MAX_BOOKS is a constant because the maximum number of books allowed is fixed and should not change.
// const MAX_BOOKS = 3;


// Task 2: Create a Static Property and Static Method
//  we Create a class named StudentCounter.
class StudentCounter
{
    // "public" means this property can be accessed from outside the class.
    // "static" means the property belongs to the class itself,
    // $count is the name of the property.
    // Its initial value is 0.
    public static $count = 0;


    // Create a static method named addStudent().
    // "public" means the method can be accessed from outside the class.
    // "static" means we can call the method without creating an object.
    public static function addStudent()
    {
        // "self" refers to the current class, StudentCounter.
        // "::" is used to access a static property or method.
        // "++" increases the value by 1.
        self::$count++;
    }
}


// Call the addStudent() method for the first time.
// We do not need to create an object because the method is static.
StudentCounter::addStudent();

// Call the addStudent() method for the second time.
// The value of count changes from 1 to 2.
StudentCounter::addStudent();

// Call the addStudent() method for the third time.
// The value of count changes from 2 to 3.
StudentCounter::addStudent();


// Display the final value of count.
// StudentCounter::$count accesses the static property.
echo "Total students: " . StudentCounter::$count;
echo "<br>";


// Task 3: Create an Abstract Class and Abstract Method

// "abstract class" creates a parent/base class.
// The class is named Vehicle.
// An abstract class is designed to be inherited by child classes.
abstract class Vehicle
{
    // This is an abstract method.
    // It has no implementation in the parent class.
    // Every child class must implement this method.
    abstract public function start();
}


// Create a class named Car.
// "extends Vehicle" means Car inherits from Vehicle.
class Car extends Vehicle
{
    // This method implements the abstract start() method
    // required by the Vehicle class.
    public function start()
    {
        // Display a message when the car starts.
        echo "Car engine started.<br>";
    }
}


// Create a class named Bike.
// Bike also inherits from Vehicle.
class Bike extends Vehicle
{
    // Implement the start() method required by Vehicle.
    public function start()
    {
        // Display a message when the bike starts.
        echo "Bike started.<br>";
    }
}


// Create an object of the Car class.
// "new" is used to create an object.
$car = new Car();


// Create an object of the Bike class.
$bike = new Bike();


// Call the start() method of the Car object.
// "->" is used to access a method or property of an object.
$car->start();


// Call the start() method of the Bike object.
$bike->start();

?>