<?php

$servername = "localhost";
$username = "root";
$password = "";
$db="queue";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$textnote=" ";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action= $_POST['btn'];
    

    if(isset($_POST['btn'])){
        $textnote=$_POST['btn'];
    }
    }

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livetech Work Queue</title>
    <link rel="icon" href="assets/image/logo.png" type="image/icon">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,600;1,700;1,900&display=swap"
        rel="stylesheet" />
    <!---------------Css------------>
    <link rel="stylesheet" href="css/style.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-----Bootstrap Bundle-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
    <section class="main bg-cl-pm px-5 pt-4">
        <div class="container-fluid">
            <div class="header d-flex justify-content-between align-items-center mb-5">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <img src="assets/image/logo.png" alt="">
                    </div>
                    <div>
                        <h5 class="cl-mat">Livetech</h5>
                    </div>
                </div>
                <div>
                    <h3>Work Queue</h3>  <?php echo " ".$textnote ?>
                </div>
                <div>
                    <form action="">
                        <div>
                            <!-- <small class="mb-5">Search a Responsible person</small> -->
                            <div class="d-flex">
                                <div class="dropdown bg-cl-blue me-2 rounded-3">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <small class="cl-white">Search Here</small>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">All</a></li>
                                        <li><a class="dropdown-item" href="#">Bipu</a></li>
                                        <li><a class="dropdown-item" href="#">Shawon</a></li>
                                        <li><a class="dropdown-item" href="#">Shampod</a></li>
                                        <li><a class="dropdown-item" href="#">Midon</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <button class="bg-cl-dark border-0 rounded-3 p-2 cl-white fw-light" type="submit"><i
                                            class="fas fa-search"></i> Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 backlog">
                    <h6 class="mb-3">Backlog <span class="bg-cl-light-blue cl-blue px-2 py-1 ms-2">14</span></h6>
                    <div class="divborder py-4 bg-white">
                        <div class="d-flex justify-content-center">
                            <form method="post">
                                <div class="divHeader d-flex px-1">
                                    <div class="d-flex mb-2">
                                        <div class="divHeaderInput">
                                            <input class="border-0 p-2 rounded-3 bg-cl-grey w-100" type="text"
                                                placeholder="Type Task Name Here">
                                        </div>
                                        <div class="dropdown bg-cl-dark fw-light rounded-3 mx-2">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-user-alt cl-white"></i>
                                            </button>
                                            <ul class="dropdown-menu divBodyHeadDropDown dropdown-menu-end  px-2">
                                                <div class="innerSearch w-100">
                                                    <input class="border-0 bg-white" list="browsers" name="browser"
                                                        id="browser" placeholder="type name here">
                                                    <datalist id="browsers">
                                                        <input class="bg-cl-grey w-100" type="text">
                                                        <option value="Bipu">
                                                        <option value="Shampod">
                                                        <option value="Privel Paul Titu">
                                                        <option value="Mehedi">
                                                        <option value="Manowar">
                                                        <option value="Ahona">
                                                        <option value="sakib">
                                                    </datalist>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="bg-cl-blue border-0 rounded-3 px-4 py-2 cl-white fw-light w-100"
                                            type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="cl-blue">
                        <div class="divBody">
                        <?php 
                                        $sql = "SELECT * FROM livetech where position='1' AND status='1'";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {   
                                                
                                        ?>
                            <div class="d-flex justify-content-center align-items-center mb-2 px-2 ">
                            
                                <div class="bg-cl-grey divborder1 px-3 py-2 rounded-3 w-100">
                                    <div class="mb-2 d-flex">
                                        <i class="fas fa-circle cl-blue me-1 mt-1 xsmall"></i>
                                        
                                        <h6 class="cl-mat fw-bold"><?php echo $row['task'] ?></h6>
                                    </div>
                                    <div class="divBodyBottom d-flex justify-content-between">
                                        <div class="d-flex align-items-center mb-1">
                                            <i class="fas fa-user-alt xsmall cl-grey me-1"></i><small
                                                class="cl-blue fw-light"><?php echo $row['person'] ?></small>
                                        </div>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        <div class="d-flex mb-1">
                                        
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="BackLog" onclick="location.href">
                                                <button class="border-0 bg-white" type="submit" name="btn" value="backlog"><img src="assets/image/icon1.png" alt=""></button>
                                            </div>
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="Pending">
                                                <button class="border-0 bg-white" type="submit" name="btn" value="pending"><img src="assets/image/icon2.png" alt=""></button>
                                            </div>
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="In Progress">
                                                <button class="border-0 bg-white" type="submit" name="btn" value="progress"><img src="assets/image/icon3.png" alt=""></button>
                                            </div>
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="Complete">
                                                <button class="border-0 bg-white" type="submit" name="btn" value="complete"><img src="assets/image/icon4.png" alt=""></button>
                                            </div>
                                            <div
                                                class="divContentTooltip cursor bg-cl-green cl-white d-flex justify-content-center align-items-center rounded-3 mx-1">
                                                <button class="border-0 bg-cl-green cl-white" type="submit" name="btn" value="edit"><i class="fas fa-pencil-alt xsmall"></i></button>
                                            </div>
                                            <div
                                                class="divContentTooltip cursor bg-cl-red cl-white d-flex justify-content-center align-items-center rounded-3 mx-1"  data-bs-toggle="modal" data-bs-target="#popUp">
                                                <i class="fas fa-trash-alt xsmall"></i>
                                            </div>
                                        
                                            
                                        </div> </form>
                                    </div>

                                    
                                </div>
                            </div>
                            <?php
                                            }
                                        }
                                    ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 pending">
                    <h6 class="mb-3">Pending <span class="bg-cl-light-red cl-blue px-2 py-1 ms-2">14</span></h6>
                    <div class="divborder py-4 bg-white">
                        <div class="d-flex justify-content-center">
                            <form action="">
                                <div class="divHeader d-flex px-1">
                                    <div class="d-flex mb-2">
                                        <div class="divHeaderInput">
                                            <input class="border-0 p-2 rounded-3 bg-cl-grey w-100" type="text"
                                                placeholder="Type Task Name Here">
                                        </div>
                                        <div class="dropdown bg-cl-dark fw-light rounded-3 mx-2">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-user-alt cl-white"></i>
                                            </button>
                                            <ul class="dropdown-menu divBodyHeadDropDown dropdown-menu-end  px-2">
                                                <div class="innerSearch w-100">
                                                    <input class="border-0 bg-white" list="browsers" name="browser"
                                                        id="browser" placeholder="type name here">
                                                    <datalist id="browsers">
                                                        <input class="bg-cl-grey w-100" type="text">
                                                        <option value="Bipu">
                                                        <option value="Shampod">
                                                        <option value="Privel Paul Titu">
                                                        <option value="Mehedi">
                                                        <option value="Manowar">
                                                        <option value="Ahona">
                                                        <option value="sakib">
                                                    </datalist>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="bg-cl-blue border-0 rounded-3 px-4 py-2 cl-white fw-light w-100"
                                            type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="cl-blue">
                        <div class="divBody">
                        <?php 
                                        $sql = "SELECT * FROM livetech where position='2' AND status='1'";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {   
                                                
                                        ?>
                            <div class="d-flex justify-content-center align-items-center mb-2 px-2 ">
                                <div class="bg-cl-grey divborder2 px-3 py-2 rounded-3 w-100" >
                                    <div class="mb-2 d-flex">
                                        <i class="fas fa-circle cl-blue me-1 mt-1 xsmall"></i>
                                        <h6 class="cl-mat fw-bold"><?php echo $row['task'] ?>
                                            </h6> 
                                    </div>
                                    <div class="divBodyBottom d-flex justify-content-between">
                                        <div class="d-flex align-items-center mb-1">
                                            <i class="fas fa-user-alt xsmall cl-grey me-1"></i><small
                                                class="cl-blue fw-light"><?php echo $row['person'] ?></small>
                                        </div>
                                        <div class="d-flex mb-1">
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="BackLog">
                                                <img src="assets/image/icon1.png" alt="">
                                            </div>
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="Pending">
                                                <img src="assets/image/icon2.png" alt="">
                                            </div>
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="In Progress">
                                                <img src="assets/image/icon3.png" alt="">
                                            </div>
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="Complete">
                                                <img src="assets/image/icon4.png" alt="">
                                            </div>
                                            <div
                                                class="divContentTooltip cursor bg-cl-green cl-white d-flex justify-content-center align-items-center rounded-3 mx-1">
                                                <i class="fas fa-pencil-alt xsmall"></i>
                                            </div>
                                            <div
                                                class="divContentTooltip cursor bg-cl-red cl-white d-flex justify-content-center align-items-center rounded-3 mx-1"  data-bs-toggle="modal" data-bs-target="#popUp">
                                                <i class="fas fa-trash-alt xsmall"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                                                }
                                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-------------------------in progress --------------------------->
                <div class="col-lg-3 inprogress">
                    <h6 class="mb-3">In Progress <span class="bg-cl-light-yellow cl-blue px-2 py-1 ms-2">14</span></h6>
                    <div class="divborder py-4 bg-white">
                        <div class="d-flex justify-content-center">
                            <form action="">
                                <div class="divHeader d-flex px-1">
                                    <div class="d-flex mb-2">
                                        <div class="divHeaderInput">
                                            <input class="border-0 p-2 rounded-3 bg-cl-grey w-100" type="text"
                                                placeholder="Type Task Name Here">
                                        </div>
                                        <div class="dropdown bg-cl-dark fw-light rounded-3 mx-2">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-user-alt cl-white"></i>
                                            </button>
                                            <ul class="dropdown-menu divBodyHeadDropDown dropdown-menu-end  px-2">
                                                <div class="innerSearch w-100">
                                                    <input class="border-0 bg-white" list="browsers" name="browser"
                                                        id="browser" placeholder="type name here">
                                                    <datalist id="browsers">
                                                        <input class="bg-cl-grey w-100" type="text">
                                                        <option value="Bipu">
                                                        <option value="Shampod">
                                                        <option value="Privel Paul Titu">
                                                        <option value="Mehedi">
                                                        <option value="Manowar">
                                                        <option value="Ahona">
                                                        <option value="sakib">
                                                    </datalist>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="bg-cl-blue border-0 rounded-3 px-4 py-2 cl-white fw-light w-100"
                                            type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="cl-blue">
                        <div class="divBody">
                        <?php 
                                        $sql = "SELECT * FROM livetech where position='3' AND status='1'";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {   
                                                
                                        ?>
                            <!-------------------------  card in progress --------------------------->
                            <div class="d-flex justify-content-center align-items-center mb-2 px-2 ">
                                <div class="bg-cl-grey divborder3 px-3 py-2 rounded-3 w-100">
                                    <div class="mb-2 d-flex">
                                        <i class="fas fa-circle cl-blue me-1 mt-1 xsmall"></i>
                                        <h6 class="cl-mat fw-bold"><?php echo $row['task'] ?></h6>
                                    </div>
                                    <div class="divBodyBottom d-flex justify-content-between">
                                        <div class="d-flex align-items-center mb-1">
                                            <i class="fas fa-user-alt xsmall cl-grey me-1"></i><small
                                                class="cl-blue fw-light"><?php echo $row['person'] ?></small>
                                        </div>
                                        <div class="d-flex mb-1">
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="BackLog">
                                                <img src="assets/image/icon1.png" alt="">
                                            </div>
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="Pending">
                                                <img src="assets/image/icon2.png" alt="">
                                            </div>
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="In Progress">
                                                <img src="assets/image/icon3.png" alt="">
                                            </div>
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="Complete">
                                                <img src="assets/image/icon4.png" alt="">
                                            </div>
                                            <div
                                                class="divContentTooltip cursor bg-cl-green cl-white d-flex justify-content-center align-items-center rounded-3 mx-1">
                                                <i class="fas fa-pencil-alt xsmall"></i>
                                            </div>
                                            <div
                                                class="divContentTooltip cursor bg-cl-red cl-white d-flex justify-content-center align-items-center rounded-3 mx-1"  data-bs-toggle="modal" data-bs-target="#popUp">
                                                <i class="fas fa-trash-alt xsmall"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------  card in progress --------------------------->

                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-------------------------in progress --------------------------->

                <div class="col-lg-3 completed">
                    <h6 class="mb-3">completed <span class="bg-cl-light-green cl-blue px-2 py-1 ms-2">14</span></h6>
                    <div class="divborder py-4 bg-white">
                        <div class="d-flex justify-content-center">
                            <form action="">
                                <div class="divHeader d-flex px-1">
                                    <div class="d-flex mb-2">
                                        <div class="divHeaderInput">
                                            <input class="border-0 p-2 rounded-3 bg-cl-grey w-100" type="text"
                                                placeholder="Type Task Name Here">
                                        </div>
                                        <div class="dropdown bg-cl-dark fw-light rounded-3 mx-2">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-user-alt cl-white"></i>
                                            </button>
                                            <ul class="dropdown-menu divBodyHeadDropDown dropdown-menu-end  px-2">
                                                <div class="innerSearch w-100">
                                                    <input class="border-0 bg-white" list="browsers" name="browser"
                                                        id="browser" placeholder="type name here">
                                                    <datalist id="browsers">
                                                        <input class="bg-cl-grey w-100" type="text">
                                                        <option value="Bipu">
                                                        <option value="Shampod">
                                                        <option value="Privel Paul Titu">
                                                        <option value="Mehedi">
                                                        <option value="Manowar">
                                                        <option value="Ahona">
                                                        <option value="sakib">
                                                    </datalist>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="bg-cl-blue border-0 rounded-3 px-4 py-2 cl-white fw-light w-100"
                                            type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="cl-blue">
                        <div class="divBody">
                        <?php 
                                        $sql = "SELECT * FROM livetech where position='4' AND status='1'";
                                        $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {   
                                                
                                        ?>
                        
                            <div class="d-flex justify-content-center align-items-center mb-2 px-2 ">
                                <div class="bg-cl-grey divborder4 px-3 py-2 rounded-3 w-100">
                                    <div class="mb-2 d-flex">
                                        <i class="fas fa-circle cl-blue me-1 mt-1 xsmall"></i>
                                        <h6 class="cl-mat fw-bold"><?php echo $row['task'] ?></h6>
                                    </div>
                                    <div class="divBodyBottom d-flex justify-content-between">
                                        <div class="d-flex align-items-center mb-1">
                                            <i class="fas fa-user-alt xsmall cl-grey me-1"></i><small
                                                class="cl-blue fw-light"><?php echo $row['person'] ?></small>
                                        </div>
                                        <div class="d-flex mb-1">
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="BackLog">
                                                <img src="assets/image/icon1.png" alt="">
                                            </div>
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="Pending">
                                                <img src="assets/image/icon2.png" alt="">
                                            </div>
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="In Progress">
                                                <img src="assets/image/icon3.png" alt="">
                                            </div>
                                            <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                data-toggle="tooltip" data-placement="bottom" title="Complete">
                                                <img src="assets/image/icon4.png" alt="">
                                            </div>
                                            <div
                                                class="divContentTooltip cursor bg-cl-green cl-white d-flex justify-content-center align-items-center rounded-3 mx-1">
                                                <i class="fas fa-pencil-alt xsmall"></i>
                                            </div>
                                            <div
                                                class="divContentTooltip cursor bg-cl-red cl-white d-flex justify-content-center align-items-center rounded-3 mx-1"  data-bs-toggle="modal" data-bs-target="#popUp">
                                                <i class="fas fa-trash-alt xsmall"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                        }
                                    }
                            ?>
                        </div>
                    </div>
                </div>
                <!-----------------------Modal------------------>
                <div class="modal fade" id="popUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content py-4">
                            <div class="modal-body d-flex justify-content-center">
                                Are you sure to delete this?
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btnModalYes px-5 py-2 me-2 bg-cl-red cl-white border-0 rounded-3"
                                    data-bs-dismiss="modal">Yes</button>
                                <button type="button" class="btnModalNo px-5 py-2 bg-cl-green cl-white border-0 rounded-3">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>

</html>