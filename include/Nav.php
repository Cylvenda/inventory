<?php require_once '../Config/conn.php'; ?>
<nav id="nav-bar">
    <div class="dash">
        <div class="a">
            <img class="admin" src="../img/icons/inventory.svg" alt=""> <span>
                <?php
                if ($_SESSION['role'] == 'admin') {
                    echo 'Admin';
                } elseif ($_SESSION['role'] == 'owner') {
                    echo 'Owner';
                } elseif ($_SESSION['role'] == 'manager') {
                    echo 'Manager';
                } else {
                    $_SESSION['error'] = '<div class="msg"><span>System doesnt recognize you as a Owner or Manager</span></div>';
                    header('Location: ../');
                }
                ?>
                Dashboard</span>
        </div>
        <button class="large-media-width" onclick="menuClose()"><img src="../img/icons/close.svg" alt="Menu"></button>
        <button class="small-media-width" onclick="menuShowSmall()"><img src="../img/icons/close.svg"
                alt="Menu"></button>
    </div>
    <div class="nav-links">
        <ul>
            <li>
                <a href="Dashboard">
                    <div class="link-container">
                        <img src="../img/icons/home..svg" alt=""><span>Home</span>
                    </div>
                </a>
            </li>


            <li>
                <a href="Brand"> <img src="../img/icons/package.svg" alt=""><span>Brand</span></a>
            </li>


            <li>
                <a href="Category"> <img src="../img/icons/shopping_bag.svg" alt=""><span>Category</span> </a>
            </li>

            <li>
                <a href="Products"> <img src="../img/icons/product.svg" alt=""><span>Products</span></a>

            </li>

            <li>
                <a href="Orders"> <img img src="../img/icons/orders_b.svg" alt=""><span>Orders</span> </a>
            </li>


            <li>
                <a href="Suppliers"> <img img src="../img/icons/person_bl.svg" alt=""><span>Suppliers</span> </a>
            </li>

            <li>
                <a href="Employees"> <img img src="../img/icons/group_manage.svg" alt=""><span>Employees</span> </a>
            </li>

            <li>
                <a href="../Config/logout?auth=<?php echo $_SESSION['user_id']; ?>">
                    <img src="../img/icons/logout_b.svg"> <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</nav>