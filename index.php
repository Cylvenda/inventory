<?php require_once 'Config/conn.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G10 Inventory Management System</title>
    <link rel="stylesheet" href="./style/index.css">
</head>

<body>

    <div class="container-form">
        <div class="head">
            <h3>Welcome To G10 Inventory Management System</h3>


            <ul>
                <li>
                    <p>This is where we track and manage the stock and our suplliers details, </p>
                </li>
                <li>
                    <p>So You have to Login with the right cridentials fromyour system admin</p>
                </li>
            </ul>
        </div>
        <div class="form">
            <form action="Config/handlers.php" method="POST">
                <h3>G10 Login</h3>
                <?php 
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                <div class="form-content">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter Your Email..">
                </div>

                <div class="form-content">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter Your Password..">
                </div>

                <div class="check-box">
                    <label htmlFor="rememberMe">
                        <input type="checkbox" name="rememberMe"> Remember Me
                    </label>
                </div>

                <div class="button-container">
                    <button name="Login" value="Login" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>