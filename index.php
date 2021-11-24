<?php

include_once "include/config.php";

$state = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['btn1'])) {
        stateChange($_POST['btn1'], 1);
    } elseif (isset($_POST['btn2'])) {
        stateChange($_POST['btn2'], 2);
    } elseif (isset($_POST['btn3'])) {
        stateChange($_POST['btn3'], 3);
    } elseif (isset($_POST['btn4'])) {
        stateChange($_POST['btn4'], 4);
    } elseif (isset($_POST['inputBl'])) {
        $task = $_POST['task'];
        $person = $_POST['person'];
        $type = 1;
        $status = 1;

        addTask($task, $person, $type, $status);

    } elseif (isset($_POST['inputPending'])) {
        $task = $_POST['task'];
        $person = $_POST['person'];
        $type = 2;
        $status = 1;

        addTask($task, $person, $type, $status);

    } elseif (isset($_POST['inputProgress'])) {
        $task = $_POST['task'];
        $person = $_POST['person'];
        $type = 3;
        $status = 1;

        addTask($task, $person, $type, $status);

    } elseif (isset($_POST['inputComplete'])) {
        $task = $_POST['task'];
        $person = $_POST['person'];
        $type = 4;
        $status = 1;

        addTask($task, $person, $type, $status);

    }
}

function addTask($task, $person, $type, $status)
{ //-----------------------add task
    include "include/config.php";

    $sqlAdd = "INSERT INTO livetech (task, person, position, status)
        VALUES ('$task', '$person', '$type', '$status')";

    if ($conn->query($sqlAdd) === true) {

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function findTotal($status)
{ //--------------------------------find total number
    include "include/config.php";

    $sql = "SELECT * FROM livetech where position='$status' AND status='1'";

    if ($result = mysqli_query($conn, $sql)) {
        // Return the number of rows in result set
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }

}

function stateChange($taskId, $position)
{ //-----------------------change state
    include "include/config.php";

    $sqlUpdate = "UPDATE livetech SET position='$position' WHERE id=$taskId";
    $result = mysqli_query($conn, $sqlUpdate);

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
                    <h3>Work Queue System</h3>
                </div>
                <div>
                    <form action="search.php" method="post">
                        <div>
                            <!-- <small class="mb-5">Search a Responsible person</small> -->
                            <div class="d-flex align-items-center">
                                <!-- <div class="dropdown bg-cl-blue me-2 rounded-3">
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
                                </div> -->
                                <div class="me-2">
                                    <div class="selector divSelect">
                                        <select class="form-select form-select-lg color-grey"
                                            aria-label=".form-select-lg example" name="incharge">
                                            <option value="0" selected> All</option>
                                            <option value="Rifat Shampod">Rifat Shampod</option>
                                            <option value="Samiul Islam Midon">Samiul Islam Midon</option>
                                            <option value="Antu Shamitra">Antu Shamitra</option>
                                            <option value="Privel Paul Titu">Privel Paul Titu</option>
                                            <option value="Rafsan Hossain">Rafsan Hossain</option>
                                            <option value="Tonmoy Mandal">Tonmoy Mandal</option>
                                            <option value="Tonu Tahmid">Tonu Tahmid</option>
                                            <option value="Sheikh Mehedi">Sheikh Mehedi</option>
                                            <option value="Manowar Haider">Manowar Haider</option>
                                            <option value="Arif Bipu">Arif Bipu</option>
                                            <option value="Ahona Yesmin">Ahona Yesmin</option>
                                            <option value="Iftekhar sakib">Iftekhar sakib</option>
                                            <option value="Gulsaba Fiha">Gulsaba Fiha</option>
                                            <option value="Shawon Islam">Shawon Islam</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <button class="bg-cl-dark border-0 rounded-3 p-2 cl-white fw-light" type="submit" name="searchbtn"><i
                                            class="fas fa-search" ></i> Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 backlog">
                    <h6 class="mb-3">Backlog <span class="bg-cl-light-blue cl-blue px-2 py-1 ms-2"><?php echo findTotal(1); ?></span></h6>
                    <div class="divborder py-4 bg-white">
                        <div class="d-flex justify-content-center">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="divHeader d-flex px-1">
                                    <div class="d-flex mb-2">
                                        <div class="divHeaderInput">
                                            <input class="border-0 p-2 rounded-3 bg-cl-grey w-100" type="text"
                                                placeholder="Type Task Name Here" name="task">
                                        </div>
                                        <div class="dropdown bg-cl-dark fw-light rounded-3 mx-2">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-user-alt cl-white"></i>
                                            </button>
                                            <ul class="dropdown-menu divBodyHeadDropDown dropdown-menu-end  px-2">
                                                <div class="innerSearch w-100">
                                                    <input class="border-0 bg-white" list="browsers" name="person"
                                                        id="browser" placeholder="type name here">
                                                    <datalist id="browsers">
                                                        <input class="bg-cl-grey w-100" type="text">
                                                        <option value="Rifat Shampod">
                                                        <option value="Samiul Islam Midon">
                                                        <option value="Antu Shamitra">
                                                        <option value="Privel Paul Titu">
                                                        <option value="Rafsan Hossain">
                                                        <option value="Tonmoy Mandal">
                                                        <option value="Tonu Tahmid">
                                                        <option value="Sheikh Mehedi">
                                                        <option value="Manowar Haider">
                                                        <option value="Arif Bipu">
                                                        <option value="Ahona Yesmin">
                                                        <option value="Iftekhar sakib">
                                                        <option value="Gulsaba Fiha">
                                                        <option value="Shawon Islam">
                                                    </datalist>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="bg-cl-blue border-0 rounded-3 px-4 py-2 cl-white fw-light w-100"
                                            type="submit" name="inputBl">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="cl-blue">
                        <div class="divBody">
                            <?php
$sql = "SELECT * FROM livetech where position='1' AND status='1' ORDER BY id desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

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
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                            <div class="d-flex mb-1">

                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                    data-toggle="tooltip" data-placement="bottom" title="BackLog" onclick="location.href">
                                                    <button class="border-0 bg-white" type="submit" name="btn1" value="<?php echo $row['id'] ?>"><img src="assets/image/icon1.png" alt=""></button>
                                                </div>
                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                    data-toggle="tooltip" data-placement="bottom" title="Pending">
                                                    <button class="border-0 bg-white" type="submit" name="btn2" value="<?php echo $row['id'] ?>"><img src="assets/image/icon2.png" alt=""></button>
                                                </div>
                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                    data-toggle="tooltip" data-placement="bottom" title="In Progress">
                                                    <button class="border-0 bg-white" type="submit" name="btn3" value="<?php echo $row['id'] ?>"><img src="assets/image/icon3.png" alt=""></button>
                                                </div>
                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                    data-toggle="tooltip" data-placement="bottom" title="Complete">
                                                    <button class="border-0 bg-white" type="submit" name="btn4" value="<?php echo $row['id'] ?>"><img src="assets/image/icon4.png" alt=""></button>
                                                </div>
                                                <div
                                                    class="divContentTooltip cursor bg-cl-green cl-white d-flex justify-content-center align-items-center rounded-3 mx-1">
                                                    <button class="border-0 bg-cl-green cl-white" type="submit" name="btn" value="edit" ><i class="fas fa-pencil-alt xsmall"></i></button>
                                                </div>
                                                <div
                                                    class="divContentTooltip cursor bg-cl-red cl-white d-flex justify-content-center align-items-center rounded-3 mx-1">
                                                    <button class="border-0 bg-cl-red cl-white" type="button" class="btn btn-danger" data-id="<?php echo $row['id']; ?>" onclick="confirmDelete(this);"> <i class="fas fa-trash-alt xsmall"></i> </button>
                                                </div>


                                            </div>
                                        </form>
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
                    <h6 class="mb-3">Pending <span class="bg-cl-light-red cl-blue px-2 py-1 ms-2"><?php echo findTotal(2); ?></span></h6>
                    <div class="divborder py-4 bg-white">
                        <div class="d-flex justify-content-center">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="divHeader d-flex px-1">
                                    <div class="d-flex mb-2">
                                        <div class="divHeaderInput">
                                            <input class="border-0 p-2 rounded-3 bg-cl-grey w-100" type="text"
                                                placeholder="Type Task Name Here" name="task">
                                        </div>
                                        <div class="dropdown bg-cl-dark fw-light rounded-3 mx-2">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-user-alt cl-white"></i>
                                            </button>
                                            <ul class="dropdown-menu divBodyHeadDropDown dropdown-menu-end  px-2">
                                                <div class="innerSearch w-100">
                                                    <input class="border-0 bg-white" list="browsers" name="person"
                                                        id="browser" placeholder="type name here">
                                                    <datalist id="browsers">
                                                        <input class="bg-cl-grey w-100" type="text">
                                                        <option value="Rifat Shampod">
                                                        <option value="Antu Shamitra">
                                                        <option value="Privel Paul Titu">
                                                        <option value="Samiul Islam Midon">
                                                        <option value="Rafsan Hossain">
                                                        <option value="Tonmoy Mandal">
                                                        <option value="Tonu Tahmid">
                                                        <option value="Sheikh Mehedi">
                                                        <option value="Manowar Haider">
                                                        <option value="Arif Bipu">
                                                        <option value="Ahona Yesmin">
                                                        <option value="Iftekhar sakib">
                                                        <option value="Gulsaba Fiha">
                                                        <option value="Shawon Islam">
                                                    </datalist>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="bg-cl-blue border-0 rounded-3 px-4 py-2 cl-white fw-light w-100"
                                            type="submit" name="inputPending">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="cl-blue">
                        <div class="divBody">
                        <?php
$sql = "SELECT * FROM livetech where position='2' AND status='1' ORDER BY id desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

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
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                            <div class="d-flex mb-1">

                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                        data-toggle="tooltip" data-placement="bottom" title="BackLog" onclick="location.href">
                                                        <button class="border-0 bg-white" type="submit" name="btn1" value="<?php echo $row['id'] ?>"><img src="assets/image/icon1.png" alt=""></button>
                                                    </div>
                                                    <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                        data-toggle="tooltip" data-placement="bottom" title="Pending">
                                                        <button class="border-0 bg-white" type="submit" name="btn2" value="<?php echo $row['id'] ?>"><img src="assets/image/icon2.png" alt=""></button>
                                                    </div>
                                                    <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                        data-toggle="tooltip" data-placement="bottom" title="In Progress">
                                                        <button class="border-0 bg-white" type="submit" name="btn3" value="<?php echo $row['id'] ?>"><img src="assets/image/icon3.png" alt=""></button>
                                                    </div>
                                                    <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                        data-toggle="tooltip" data-placement="bottom" title="Complete">
                                                        <button class="border-0 bg-white" type="submit" name="btn4" value="<?php echo $row['id'] ?>"><img src="assets/image/icon4.png" alt=""></button>
                                                    </div>
                                                    <div
                                                        class="divContentTooltip cursor bg-cl-green cl-white d-flex justify-content-center align-items-center rounded-3 mx-1">
                                                        <button class="border-0 bg-cl-green cl-white" type="submit" name="btn" value="edit"><i class="fas fa-pencil-alt xsmall"></i></button>
                                                    </div>
                                                    <div
                                                        class="divContentTooltip cursor bg-cl-red cl-white d-flex justify-content-center align-items-center rounded-3 mx-1">
                                                        <button class="border-0 bg-cl-red cl-white" type="button" class="btn btn-danger" data-id="<?php echo $row['id']; ?>" onclick="confirmDelete(this);"> <i class="fas fa-trash-alt xsmall"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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
                    <h6 class="mb-3">In Progress <span class="bg-cl-light-yellow cl-blue px-2 py-1 ms-2"><?php echo findTotal(3); ?></span></h6>
                    <div class="divborder py-4 bg-white">
                        <div class="d-flex justify-content-center">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="divHeader d-flex px-1">
                                    <div class="d-flex mb-2">
                                        <div class="divHeaderInput">
                                            <input class="border-0 p-2 rounded-3 bg-cl-grey w-100" type="text"
                                                placeholder="Type Task Name Here" name="task">
                                        </div>
                                        <div class="dropdown bg-cl-dark fw-light rounded-3 mx-2">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-user-alt cl-white"></i>
                                            </button>
                                            <ul class="dropdown-menu divBodyHeadDropDown dropdown-menu-end  px-2">
                                                <div class="innerSearch w-100">
                                                    <input class="border-0 bg-white" list="browsers" name="person"
                                                        id="browser" placeholder="type name here">
                                                    <datalist id="browsers">
                                                        <input class="bg-cl-grey w-100" type="text">
                                                        <option value="Rifat Shampod">
                                                        <option value="Antu Shamitra">
                                                        <option value="Privel Paul Titu">
                                                        <option value="Samiul Islam Midon">
                                                        <option value="Rafsan Hossain">
                                                        <option value="Tonmoy Mandal">
                                                        <option value="Tonu Tahmid">
                                                        <option value="Sheikh Mehedi">
                                                        <option value="Manowar Haider">
                                                        <option value="Arif Bipu">
                                                        <option value="Ahona Yesmin">
                                                        <option value="Iftekhar sakib">
                                                        <option value="Gulsaba Fiha">
                                                        <option value="Shawon Islam">
                                                    </datalist>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="bg-cl-blue border-0 rounded-3 px-4 py-2 cl-white fw-light w-100"
                                            type="submit" name="inputProgress">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="cl-blue">
                        <div class="divBody">
                        <?php
$sql = "SELECT * FROM livetech where position='3' AND status='1' ORDER BY id desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

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
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                            <div class="d-flex mb-1">

                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                    data-toggle="tooltip" data-placement="bottom" title="BackLog" onclick="location.href">
                                                    <button class="border-0 bg-white" type="submit" name="btn1" value="<?php echo $row['id'] ?>"><img src="assets/image/icon1.png" alt=""></button>
                                                </div>
                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                    data-toggle="tooltip" data-placement="bottom" title="Pending">
                                                    <button class="border-0 bg-white" type="submit" name="btn2" value="<?php echo $row['id'] ?>"><img src="assets/image/icon2.png" alt=""></button>
                                                </div>
                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                    data-toggle="tooltip" data-placement="bottom" title="In Progress">
                                                    <button class="border-0 bg-white" type="submit" name="btn3" value="<?php echo $row['id'] ?>"><img src="assets/image/icon3.png" alt=""></button>
                                                </div>
                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                    data-toggle="tooltip" data-placement="bottom" title="Complete">
                                                    <button class="border-0 bg-white" type="submit" name="btn4" value="<?php echo $row['id'] ?>"><img src="assets/image/icon4.png" alt=""></button>
                                                </div>
                                                <div
                                                    class="divContentTooltip cursor bg-cl-green cl-white d-flex justify-content-center align-items-center rounded-3 mx-1">
                                                    <button class="border-0 bg-cl-green cl-white" type="submit" name="btn" value="edit"><i class="fas fa-pencil-alt xsmall"></i></button>
                                                </div>
                                                <div
                                                    class="divContentTooltip cursor bg-cl-red cl-white d-flex justify-content-center align-items-center rounded-3 mx-1">
                                                    <button class="border-0 bg-cl-red cl-white" type="button" class="btn btn-danger" data-id="<?php echo $row['id']; ?>" onclick="confirmDelete(this);"> <i class="fas fa-trash-alt xsmall"></i> </button>
                                                </div>


                                            </div>
                                        </form>
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
                    <h6 class="mb-3">completed <span class="bg-cl-light-green cl-blue px-2 py-1 ms-2"><?php echo findTotal(4); ?></span></h6>
                    <div class="divborder py-4 bg-white">
                        <div class="d-flex justify-content-center">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="divHeader d-flex px-1">
                                    <div class="d-flex mb-2">
                                        <div class="divHeaderInput">
                                            <input class="border-0 p-2 rounded-3 bg-cl-grey w-100" type="text"
                                                placeholder="Type Task Name Here" name="task">
                                        </div>
                                        <div class="dropdown bg-cl-dark fw-light rounded-3 mx-2">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-user-alt cl-white"></i>
                                            </button>
                                            <ul class="dropdown-menu divBodyHeadDropDown dropdown-menu-end  px-2">
                                                <div class="innerSearch w-100">
                                                    <input class="border-0 bg-white" list="browsers" name="person"
                                                        id="browser" placeholder="type name here">
                                                    <datalist id="browsers">
                                                        <input class="bg-cl-grey w-100" type="text">

                                                        <option value="Rifat Shampod">
                                                        <option value="Antu Shamitra">
                                                        <option value="Privel Paul Titu">
                                                        <option value="Samiul Islam Midon">
                                                        <option value="Rafsan Hossain">
                                                        <option value="Tonmoy Mandal">
                                                        <option value="Tonu Tahmid">
                                                        <option value="Sheikh Mehedi">
                                                        <option value="Manowar Haider">
                                                        <option value="Arif Bipu">
                                                        <option value="Ahona Yesmin">
                                                        <option value="Iftekhar sakib">
                                                        <option value="Gulsaba Fiha">
                                                        <option value="Shawon Islam">
                                                    </datalist>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="bg-cl-blue border-0 rounded-3 px-4 py-2 cl-white fw-light w-100"
                                            type="submit" name="inputComplete">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="cl-blue">
                        <div class="divBody">
                        <?php
$sql = "SELECT * FROM livetech where position='4' AND status='1' ORDER BY id desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        ?>

                            <div class="d-flex justify-content-center align-items-center mb-2 px-2 ">
                                <div class="bg-cl-grey divborder4 px-3 py-2 rounded-3 w-100">
                                    <div class="mb-2 d-flex">
                                        <i class="fas fa-circle cl-blue me-1 mt-1 xsmall"></i>
                                        <h6 class="cl-mat fw-bold" id="taskname"><?php echo $row['task'] ?></h6>
                                    </div>
                                    <div class="divBodyBottom d-flex justify-content-between">
                                        <div class="d-flex align-items-center mb-1">
                                            <i class="fas fa-user-alt xsmall cl-grey me-1"></i><small
                                                class="cl-blue fw-light"><?php echo $row['person'] ?></small>
                                        </div>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                            <div class="d-flex mb-1">

                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                    data-toggle="tooltip" data-placement="bottom" title="BackLog" onclick="location.href">
                                                    <button class="border-0 bg-white" type="submit" name="btn1" value="<?php echo $row['id'] ?>"><img src="assets/image/icon1.png" alt=""></button>
                                                </div>
                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                    data-toggle="tooltip" data-placement="bottom" title="Pending">
                                                    <button class="border-0 bg-white" type="submit" name="btn2" value="<?php echo $row['id'] ?>"><img src="assets/image/icon2.png" alt=""></button>
                                                </div>
                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                    data-toggle="tooltip" data-placement="bottom" title="In Progress">
                                                    <button class="border-0 bg-white" type="submit" name="btn3" value="<?php echo $row['id'] ?>"><img src="assets/image/icon3.png" alt=""></button>
                                                </div>
                                                <div class="divContentTooltip cursor bg-white d-flex justify-content-center align-items-center mx-1"
                                                    data-toggle="tooltip" data-placement="bottom" title="Complete">
                                                    <button class="border-0 bg-white" type="submit" name="btn4" value="<?php echo $row['id'] ?>"><img src="assets/image/icon4.png" alt=""></button>
                                                </div>
                                                <div
                                                    class="divContentTooltip cursor bg-cl-green cl-white d-flex justify-content-center align-items-center rounded-3 mx-1" id="editicon">
                                                    <button class="border-0 bg-cl-green cl-white editbtn" type="button" name="btn" data-id="<?php echo $row['id']; ?>" data-task="<?php echo $row['task']; ?>" onclick="confirmEdit(this);"><i class="fas fa-pencil-alt xsmall"></i></button>
                                                </div>
                                                <div
                                                    class="divContentTooltip cursor bg-cl-red cl-white d-flex justify-content-center align-items-center rounded-3 mx-1">
                                                    <button class="border-0 bg-cl-red cl-white" type="button" class="btn btn-danger" data-id="<?php echo $row['id']; ?>" onclick="confirmDelete(this);"> <i class="fas fa-trash-alt xsmall"></i> </button>
                                                </div>


                                            </div>
                                        </form>
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
                <!-----------------------Delete Modal------------------>
                 <div class="modal fade" id="myModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content py-4">
                            <div class="modal-body d-flex justify-content-center">
                                Are you sure to delete this?
                            </div>

                            <div class="d-flex justify-content-center">
                                <form method="POST" action="action.php" id="form-delete-user">
                                    <input type="hidden" name="id">
                                <button  type="submit" class="btnModalYes px-5 py-2 me-2 bg-cl-red cl-white border-0 rounded-3" name="deleteBtn"
                                    >Yes</button>
                                    </form>
                                <button type="button" class="btnModalNo px-5 py-2 bg-cl-green cl-white border-0 rounded-3" data-bs-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-----------------------Edit Modal------------------>
                <div class="modal fade" id="editModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content py-4">
                            <div class="modal-body d-flex justify-content-center">
                                Edit the task
                            </div>

                            <div class="d-flex justify-content-center">
                                <form method="POST" action="action.php" id="form-edit-user">
                                    <div>
                                    <div class="mb-2">
                                    <input type="hidden" id="id" name="id">
                                    <input type="text" id="task" name="task" placeholder="Task Name">
                                    <select
                                            aria-label=".form-select-lg example" name="incharge">
                                            <option value="0" selected> All</option>
                                            <option value="Rifat Shampod">Rifat Shampod</option>
                                            <option value="Samiul Islam Midon">Samiul Islam Midon</option>
                                            <option value="Antu Shamitra">Antu Shamitra</option>
                                            <option value="Privel Paul Titu">Privel Paul Titu</option>
                                            <option value="Rafsan Hossain">Rafsan Hossain</option>
                                            <option value="Tonmoy Mandal">Tonmoy Mandal</option>
                                            <option value="Tonu Tahmid">Tonu Tahmid</option>
                                            <option value="Sheikh Mehedi">Sheikh Mehedi</option>
                                            <option value="Manowar Haider">Manowar Haider</option>
                                            <option value="Arif Bipu">Arif Bipu</option>
                                            <option value="Ahona Yesmin">Ahona Yesmin</option>
                                            <option value="Iftekhar sakib">Iftekhar sakib</option>
                                            <option value="Gulsaba Fiha">Gulsaba Fiha</option>
                                            <option value="Shawon Islam">Shawon Islam</option>
                                        </select>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                <button  type="submit" class="btnModalYes px-5 py-2 me-2 bg-cl-green cl-white border-0 rounded-3" name="editBtn"
                                    >Edit</button>
                                    </form>
                                <button type="button" class="btnModalNo px-5 py-2  bg-cl-red cl-white border-0 rounded-3" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <script>

        function confirmDelete(self) {
            var id = self.getAttribute("data-id");

            document.getElementById("form-delete-user").id.value = id;
            $("#myModal").modal("show");
        };


        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        function confirmEdit(self){
            var x1 = self.getAttribute("data-id");
            var x2 = self.getAttribute("data-task");
            document.getElementById("id").value = x1;
            document.getElementById("task").value = x2;
                $('#editModal').modal('show');
        };

        
    </script>

</body>

</html>