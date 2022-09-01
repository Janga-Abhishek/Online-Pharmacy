<?php


$connect = new PDO('mysql:host=localhost;dbname=project', 'root', '');
$id = $_GET['orderId'];
echo $id;

if (isset($_POST["deliveryInstructions"])) {
    $query = " INSERT INTO `bookingOrderSlot`(orderId, deliveryInstructions, start_event, end_event) VALUES (:orderId, :deliveryInstructions, :start_event, :end_event)";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':orderId' => $_POST['orderId'],
            ':deliveryInstructions'  => $_POST['deliveryInstructions'],
            ':start_event' => $_POST['start'],
            ':end_event' => $_POST['end']
        )
    );

}
?>