<?php


$connect = new PDO('mysql:host=localhost;dbname=project', 'root', '');
$id = $_GET['id'];
echo $id;

if (isset($_POST["deliveryInstructions"])) {
    $query = "
 INSERT INTO deliveryRequest 
 (id, deliveryInstructions, start_event, end_event) 
 VALUES (:id, :deliveryInstructions, :start_event, :end_event)
 ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST['id'],
            ':deliveryInstructions'  => $_POST['deliveryInstructions'],
            ':start_event' => $_POST['start'],
            ':end_event' => $_POST['end']
        )
    );


}
