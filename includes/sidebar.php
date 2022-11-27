<div class="side-bar">
    <div class="logo-details" title="Forecast">
        <i class='bx bxl-stripe'></i>
        <span class="logo-name">Shoe Stock System</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="../admin/dashboard.php" class="<?php echo $dashboard; ?>" title="Dashboard">
                <i class='bx bx-grid-alt' ></i>
                <span class="links-name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#" class="<?php echo $brands; ?>" title="Brands">
                <i class='bx bx-bitcoin'></i>
                <span class="links-name">Brands</span>
            </a>
        </li>
        <li>
            <a href="#" class="<?php echo $category; ?>" title="Category">
                <i class='bx bx-category-alt'></i>
                <span class="links-name">Category</span>
            </a>
        </li>
        <li>
        <a href="../products/product.php" class="<?php echo $products; ?>" title="Products">
                <i class='bx bx-shopping-bag'></i>
                <span class="links-name">Products</span>
            </a>
        </li>
        <li>
            <a href="#" class="<?php echo $orders; ?>" title="Orders">
                <i class='bx bx-cart-add'></i>
                <span class="links-name">Orders</span>
            </a>
        </li>
        <li>
            <a href="../suppliers/supplier.php" class="<?php echo $suppliers; ?>" title="Supplier">
                <i class='bx bx-group' ></i>
                <span class="links-name">Suppliers</span>
            </a>
        </li>
        <li>
            <a href="#" class="<?php echo $settings; ?>" title="Settings">
                <i class='bx bx-cog'></i>
                <span class="links-name">Settings</span>
            </a>
        </li>
        <hr class="line">
        <li id="logout-link">
            <a class="logout-link" href="../login/logout.php" title="Logout">
                <i class='bx bx-log-out'></i>
                <span class="links-name">Logout</span>
            </a>
        </li>
    </ul>
</div>

<div id="logout-dialog" class="dialog" title="Logout">
    <p><span>Are you sure you want to logout?</span></p>
</div>

<script>
    $(document).ready(function() {
        $("#logout-dialog").dialog({
            resizable: false,
            draggable: false,
            height: "auto",
            width: 400,
            modal: true,
            autoOpen: false
        });
        $(".logout-link").on('click', function(e) {
            e.preventDefault();
            var theHREF = $(this).attr("href");

            $("#logout-dialog").dialog('option', 'buttons', {
                "Yes" : function() {
                    window.location.href = theHREF;
                },
                "No" : function() {
                    $(this).dialog("close");
                }
            });

            $("#logout-dialog").dialog("open");
        });
    });
</script>