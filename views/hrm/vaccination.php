<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/vaccination_controller.php'); ?>
<?php
if (!isset($_SESSION["emp_id"]))
    header("location:../../views/login.php");

if (isset($_GET['edit'])) {
    $vaccination_id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "select last_dose.emp_id,employee.emp_code emp_code,vaccination_category.category_name category_name,last_dose.date_of_administration date_of_administration,last_dose.category_id category_id,last_dose.vaccination_id vaccination_id,last_dose.location location,last_dose.date_of_next_dose date_of_next_dose from employee join last_dose on employee.emp_id=last_dose.emp_id join vaccination_category on vaccination_category.category_id=last_dose.category_id where last_dose.vaccination_id=$vaccination_id");

    $n = mysqli_fetch_array($record);
    $emp_code = $n['emp_code'];
    $vaccination_id = $n['vaccination_id'];
    $emp_id = $n['emp_id'];
    $category = $n['category_id'];
    $dateofadministration = date('Y-m-d', strtotime($n['date_of_administration']));
    $location = $n['location'];
    $nextdose = date('Y-m-d', strtotime($n['date_of_next_dose']));

}
?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Favicon link-->
    <link rel="icon" type="image/x-icon" href="../../images/logo-no-name-circle.png">
    <title>Delta@STAAR | Add Vaccination</title>

    <link rel="stylesheet" href="../../css/sidebar.css">
    <link rel="stylesheet" href="../../css/form.css">
    <link rel="stylesheet" href="../../css/style1.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />

</head>

<body class="b ma2">

    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <a class="navbar-brand mb-2" href="#" style="padding: 8px;">
            <img src="../../images/logo-no-name-circle.png" height="120px" alt="Deltin Logo" class="">
        </a>

        <ul class="nav flex-column p-4" id="nav_accordion" style="--bs-nav-link-hover-color: #f8f9fa;">

            <li class="nav-item has-submenu">
                <a class="nav-link border-dark border-bottom" href="#">
                    <i class="bi bi-building"></i>
                    Accommodation
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="submenu collapse">
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../accomodation/accomodation.php">
                            Add Accommodation
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../accomodation/accomodation_table.php">
                            Accommodation Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../accomodation/rooms.php">
                            Add Rooms
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../accomodation/room_table.php">
                            Rooms Table
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link border-dark border-bottom" href="#">
                    <i class="bi bi-file-text"></i> Complaints <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="submenu collapse">
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../complaint/complaint.php">
                            Raise A Complaint
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../complaint/complaint_table.php">
                            Complaint Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../config/complaint_type.php">
                            Add Complaint Type
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../config/complaint_type_table.php">
                            Complaint Type Table
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link border-dark border-bottom" href="#">
                    <i class="bi bi-person"></i> HRM <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="submenu collapse">
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../config/emp_desig.php">
                            Add Designation Details
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../config/emp_desig_table.php">
                            Employees Designation Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="employee.php">
                            Add Employee Details
                        </a>
                    </li>

                    <li>
                        <a class="nav-link border-dark border-bottom" href="employee_table.php">
                            Employees Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="roles.php">
                            Add Role </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="roles_table.php">
                            Roles Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="security_table.php">
                            Security Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="technician_table.php">
                            Technician Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="#">
                            Add Vacination Details
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="vaccination_table.php">
                            Vacination Table
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link border-dark border-bottom" href="#">
                    <i class="bi bi-shield"></i> Security <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="submenu collapse">
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../security/employee_outing.php">
                            Add Employee Outing
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../security/employee_outing_table.php">
                            Employee Outings Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../security/tanker.php">
                            Add Tanker Entry
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../security/tanker_table.php">
                            Tanker Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../security/visitor_log.php">
                            Visitor Log Form
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../security/visitor_log_table.php">
                            Visitor Log Table
                        </a>
                    </li>
                </ul>
            </li>

            <!--
            <li class="nav-item">
                <a class="nav-link" href="#"> Other link </a>
            </li>
            -->
        </ul>

    </div>

    <!-- Navbar -->
    <nav class="navbar  navbar-expand-lg navbar-dark f4 lh-copy pa3 fw4">
        <div class="container-fluid">
            <button class="openbtn" onclick="openNav()">&#9776; Menu</button>
            <a class="navbar-brand" href="#">
                <img src="../../images/logo-no-name.png" height="50px" alt="Deltin Logo"
                    class="d-inline-block align-text-top" style="border-radius: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: #fff;">Delta@STAAR</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../dashboard.php">Home</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link active1" id="adminlogin" onmouseover="this.style.cursor='pointer'"
                                onclick=history.back()>Back</a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h1 class="f2 lh-copy tc" style="color: white;">Enter Vaccination Details</h1>
                        <form class="requires-validation f3 lh-copy" novalidate
                            action="../../controllers/vaccination_controller.php" method="post">

                            <?php if (!$update) { ?>
                                <div class="col-md-12 pa2">
                                    <label for="empcode">Employee Code</label>
                                    <select class="form-select mt-3" name="emp_id" required>
                                        <option selected disabled value="" name="employee_code">Select Employee Code
                                        </option>
                                        <?php
                                        $emp_code = mysqli_query($conn, "SELECT * FROM employee");

                                        foreach ($emp_code as $row) { ?>
                                            <option name="employee_code" value="<?= $row["emp_id"] ?>">
                                                <?= $row["emp_code"]; ?>
                                            </option>
                                        <?php
                                        }

                                        ?>
                                    </select>

                                    <div class="invalid-feedback">Please select an option!</div>
                                </div>
                                <div class="col-md-12 pa2">
                                    <label for="category">Vaccination Category</label>
                                    <select class="form-select mt-3" name="cat_id" required>
                                        <option selected disabled value="">Select Category</option>
                                        <?php
                                        $vac_cat = mysqli_query($conn, "SELECT * FROM vaccination_category");

                                        foreach ($vac_cat as $row1) { ?>
                                            <option name="category_name" value="<?= $row1["category_id"] ?>">
                                                <?= $row1["category_name"]; ?>
                                            </option>
                                        <?php
                                        }

                                        ?>
                                    </select>

                                    <div class="invalid-feedback">Please select an option!</div>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-12 pa2">
                                    <input class="form-control" type="hidden" name="emp_id" value="<?php echo $emp_id ?>">

                                    <label for="empcode">Employee Code</label>

                                    <input class="form-control" type="text" name="emp_code" value="<?php echo $emp_code ?>"
                                        disabled>



                                </div>
                                <div class="col-md-12 pa2">
                                    <label for="category">Vaccination Category</label>
                                    <select class="form-select mt-3" name="cat_id" required>
                                        <option selected disabled value="">Select Category</option>
                                        <?php
                                        $vac_cat = mysqli_query($conn, "select * from vaccination_category where category_id not in (select category_id from vaccination where emp_id = '$emp_id')");

                                        foreach ($vac_cat as $row1) { ?>
                                            <option name="category_name" value="<?= $row1["category_id"] ?>">
                                                <?= $row1["category_name"]; ?>
                                            </option>
                                        <?php
                                        }

                                        ?>
                                    </select>

                                    <div class="invalid-feedback">Please select an option!</div>
                                </div>
                            <?php } ?>



                            <div class="col-md-12 pa2">
                                <label for="date_of_administration">Date of Administration</label>
                                <input class="form-control" type="date" name="doa"
                                    value="<?php echo $dateofadministration ?>" required>
                                <div class="valid-feedback">field is valid!</div>
                                <div class="invalid-feedback">field cannot be blank!</div>
                            </div>

                            <div class="col-md-12 pa2">
                                <label for="date_of_next_dose">Date of Next Dose</label>
                                <input class="form-control" type="date" name="dond" value="<?php echo $nextdose ?>"
                                    required>
                                <div class="valid-feedback">field is valid!</div>
                                <div class="invalid-feedback">field cannot be blank!</div>
                            </div>

                            <div class="col-md-12 pa2">
                                <label for="location">Location</label>
                                <input class="form-control" type="text" name="loc" value="<?php echo $location ?>"
                                    placeholder="Location" required>
                                <div class="valid-feedback">field is valid!</div>
                                <div class="invalid-feedback">field cannot be blank!</div>
                            </div>



                            <div class="form-button mt-3 tc">
                                <?php if ($update == true): ?>
                                    <button id="submit" name="update" value="update" type="submit"
                                        class="btn btn-warning f3 lh-copy" style="color: white;">Update</button>
                                <?php else: ?>
                                    <button id="submit" name="submit" value="sumbit" type="submit"
                                        class="btn btn-warning f3 lh-copy" style="color: white;">Submit</button>
                                <?php endif ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="tc f3 lh-copy mt4">Copyright &copy; 2022 Delta@STAAR. All Rights Reserved</footer>

    <!-- Script files -->
    <script src="../../js/form.js"></script>
    <script src="../../js/Sidebar/sidebar.js"></script>
    <script src="https://kit.fontawesome.com/319379cac6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>