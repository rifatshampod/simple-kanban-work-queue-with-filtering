<?php

    include_once('include/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['deleteBtn'])){

            $taskId=$_POST['id'];

            $sql= "UPDATE livetech set status=0 WHERE id='$taskId'";

            if ($conn->query($sql) === TRUE) {
                header("location:index.php");
              } else {
                echo "Error deleting record: " . $conn->error;
              }

        }

    }
?>