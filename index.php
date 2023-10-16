<?php
require_once __DIR__ . '/Book.php';
require_once __DIR__ . '/Customer.php';
// Instantiate a new book
$book1 = new Book(124325436, 'Dracula', 'Bram Stoker');
// Show details of the book
echo "Details of your requested book:<br>";
echo $book1 . "<br><br>";
// Try to get a copy of the book
echo "Number of copy available: {$book1->available}";
if($book1->getCopy()) echo "Here is your copy.";
else echo "<br><b>I am afraid that book is not available.</b><br><br>";

// Add 5 copies of the book
if($book1->addCopy(5)) echo "5 copies of the book has been added." ;
else echo "You are trying to assign negative number.";
echo "<br><br>";
// Show the details after setTitle function has been invoked
$book1->title = "The Dracula";
echo "Book details after some modification<br>";
echo $book1;
echo "<br>";

$book1->setTitle("Dracula");
echo "<br>";
echo $book1->title;
echo "<br>";
// Call a function which doesn't exist
echo $book1->getibn();
echo "<br>";
echo $book1;
echo "<br>";


//Customer
echo "<b> -----------------Customer-----------------</b><br>";
$customer1 = new Customer(12345, "Trent", "Bolt", "trentbolt@gmail.com");
echo $customer1;
echo "<br><br>";

$customer1->setEmail("bolt@gmail.com");
echo "<br><br>";
echo $customer1;
echo "<br><br>";
echo $customer1->getFullname();
?>