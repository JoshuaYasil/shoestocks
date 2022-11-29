<?php

    session_start();

    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }

    require_once '../tools/variables.php';
    $page_title = 'ShoeStocks | Show Shoe Brands';
    $brand = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading">
                <h3 class="table-title">Shoe Brands</h3>
                <?php
                    if($_SESSION['user_type'] == 'admin'){
                ?>
                    <a href="addbrand.php" class="button">Add New Brand</a>
                <?php
                    }
                ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Brand Name</th>
                        <th>Country of Origin</th>
                        <th>Brand Status</th>
                        <th>Quantity</th>
                        <th>size</th>
                        <?php
                            if($_SESSION['user_type'] == 'admin'){
                        ?>
                            <th class="action">Action</th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once '../classes/brand.class.php';

                        $brand = new Brand();

                        $i = 1;

                        foreach ($brand->show() as $value){
                    ?>
                        <tr>

                            <td><?php echo $i ?></td>
                            <td><?php echo $value['brandname'] ?></td>
                            <td><?php echo $value['origin'] ?></td>
                            <td><?php echo $value['size'] ?></td>
                            <td><?php echo $value['quantity'] ?></td>
                            <td><?php echo $value['status'] ?></td>
                            <?php
                                if($_SESSION['user_type'] == 'admin'){
                            ?>
                                <td>
                                    <div class="action">
                                        <a class="action-edit" href="editbrand.php?id=<?php echo $value['id'] ?>">Edit</a>
                                        <a class="action-delete" href="deletebrand.php?id=<?php echo $value['id'] ?>">Delete</a>
                                    </div>
                                </td>
                            <?php
                                }
                            ?>
                        </tr>
                    <?php
                        $i++;
                    //end of loop
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>

<div id="delete-dialog" class="dialog" title="Delete Brand">
    <p><span>Are you sure you want to delete the selected record?</span></p>
</div>

<script>
    $(document).ready(function() {
        $("#delete-dialog").dialog({
            resizable: false,
            draggable: false,
            height: "auto",
            width: 400,
            modal: true,
            autoOpen: false
        });
        $(".action-delete").on('click', function(e) {
            e.preventDefault();
            var theHREF = $(this).attr("href");

            $("#delete-dialog").dialog('option', 'buttons', {
                "Yes" : function() {
                    window.location.href = theHREF;
                },
                "Cancel" : function() {
                    $(this).dialog("close");
                }
            });

            $("#delete-dialog").dialog("open");
        });
    });
</script>