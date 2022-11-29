<?php

    require_once '../tools/functions.php';
    require_once '../classes/supplier.class.php';

    session_start();

    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }

    $suppliers = new Suppliers();

    if(isset($_POST['save'])){

        $suppliers->firstname = htmlentities($_POST['fn']);
        $suppliers->lastname = htmlentities($_POST['ln']);
        $suppliers->email = htmlentities($_POST['email']);
        $suppliers->company_position = $_POST['position'];
        $suppliers->company_name = $_POST['company_name'];
        if(isset($_POST['company_address'])){
            $suppliers->company_address = $_POST['company_address'];
        }
        if(isset($_POST['status'])){
            $suppliers->status = $_POST['status'];
        }
        if(validate_add_supplier($_POST)){
            if($suppliers->add()){

                header('location: supplier.php');
            }
        }
    }

    require_once '../tools/variables.php';
    $page_title = 'ShoeStocks | Add Supplier';
    $suppliers = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New Supplier</h3>
                <a class="back" href="supplier.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="addsupplier.php" method="post">
                    <label for="fn">First Name</label>
                    <input type="text" id="fn" name="fn" required placeholder="Enter first name" value="<?php if(isset($_POST['fn'])) { echo $_POST['fn']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_first_name($_POST)){
                    ?>
                                <p class="error">First name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="ln">Last Name</label>
                    <input type="text" id="ln" name="ln" required placeholder="Enter last name" value="<?php if(isset($_POST['ln'])) { echo $_POST['ln']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_last_name($_POST)){
                    ?>
                                <p class="error">Last name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_email($_POST)){
                    ?>
                                <p class="error">Email is invalid. Use only @wmsu.edu.ph</p>
                    <?php
                        }
                    ?>
                    <label for="position">Company Position</label>
                    <select name="position" id="position">
                        <option value="None" <?php if(isset($_POST['position'])) { if ($_POST['position'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
                        <option value="Manager" <?php if(isset($_POST['position'])) { if ($_POST['position'] == 'Manager') echo ' selected="selected"'; } ?>>Manager</option>
                        <option value="Asst. Manager" <?php if(isset($_POST['position'])) { if ($_POST['position'] == 'Asst. Manager') echo ' selected="selected"'; } ?>>Asst. Manager</option>
                        <option value="Asso. Secretary" <?php if(isset($_POST['position'])) { if ($_POST['position'] == 'Asso. Secretary') echo ' selected="selected"'; } ?>>Asso. Secretary</option>
                        <option value="Supervisor" <?php if(isset($_POST['position'])) { if ($_POST['position'] == 'Supervisor') echo ' selected="selected"'; } ?>>Supervisor</option>
                    </select>
                    <?php
                        if(isset($_POST['save']) && !validate_position($_POST)){
                    ?>
                                <p class="error">Please select a position from the dropdown.</p>
                    <?php
                        }
                    ?>
                    <label for="company_name">Company Name</label>
                    <select name="company_name" id="company_name">
                        <option value="None" <?php if(isset($_POST['company_name'])) { if ($_POST['company_name'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
                        <option value="BBCtech" <?php if(isset($_POST['company_name'])) { if ($_POST['company_name'] == 'BBCtech') echo ' selected="selected"'; } ?>>BBCtech</option>
                        <option value="Digicel" <?php if(isset($_POST['company_name'])) { if ($_POST['company_name'] == 'Digicel') echo ' selected="selected"'; } ?>>Digicel</option>
                    </select>
                    <?php
                        if(isset($_POST['save']) && !validate_company_name($_POST)){
                    ?>
                                <p class="error">Please select a company name from the dropdown.</p>
                    <?php
                        }
                    ?>
                    <div>
                        <label for="company_address">Company Address</label><br>
                        <label class="container" for="admin">Normal Road
                            <input type="radio" name="company_address" id="admin" value="Normal Road Baliwasan" <?php if(isset($_POST['company_address'])) { if ($_POST['company_address'] == 'Normal Road Baliwasan') echo ' checked'; } ?>>
                            <span class="checkmark"></span>
                        </label>
                        <label class="container" for="interviewer">Tulungatung
                            <input type="radio" name="company_address" id="tulungatung" value="tulungatung" <?php if(isset($_POST['company_address'])) { if ($_POST['company_address'] == 'tulungatung') echo ' checked'; } ?>>
                            <span class="checkmark"></span>
                        </label>

                    </div>
                    <?php
                        if(isset($_POST['save']) && !validate_company_address($_POST)){
                    ?>
                                <p class="error">Please select Company Address.</p>
                    <?php
                        }
                    ?>
                    <label for="status">Is Status of Employee Active?</label><br>
                    <label class="container" for="status">Yes
                        <input type="checkbox" name="status" id="status" value="Active Employee" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Active Employee') echo ' checked'; } ?>>
                        <span class="checkbox"></span>
                    </label>
                    <input type="submit" class="button" value="Save Supplier" name="save" id="save">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>