<?php

    include_once('include/config.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['deleteBtn'])){        //deleteBtn

            $taskId=$_POST['id'];

            $sql= "UPDATE livetech set status=0 WHERE id='$taskId'";

            if ($conn->query($sql) === TRUE) {
                header("location:index.php");
              } else {
                echo "Error deleting record: " . $conn->error;
              }

        }

        if(isset($_POST['editBtn'])){        //editBtn

            $taskId=$_POST['id'];
            $taskName=$_POST['task'];
            $taskPerson=$_POST['incharge'];

            $sqlEdit= "UPDATE livetech set task='$taskName', person='$taskPerson' WHERE id='$taskId'";

            if ($conn->query($sqlEdit) === TRUE) {
                header("location:index.php");
              } else {
                echo "Error deleting record: " . $conn->error;
              }

        }

    }
?>