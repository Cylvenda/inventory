<?php require_once '../Config/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('../include/cssheader.php'); ?>

<body>
    <?php include '../include/header.php';
    require_once '../include/userNav.php' ?>

    <main>
        <!-- url container -->
        <div class="url">
            <span>
                <a href="Dashboard">Home</a> / <a href="Profile">Profile</a> / <a href="Password">Password</a>
            </span>

            <span>
                <h2><?php echo $_SESSION['name'] ?> Password Management</h2>
            </span>
        </div>

        <div class="main-container">
            <div class="profile-container">
                <div id="msg-edit" class="new"></div>
            <form class="profile-form-user" >

                    <div class="customer-details">
                        <h3>Profile Details</h3>
                         <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" id="user-id-edit">
                        <div class="form-inputs">
                            <label for="opass">Old Password:</label>
                            <input type="text" id="opass" placeholder="Enter Your Old Password...">
                            <span class="form-error" id="form-error-oldPass"></span>
                        </div>

                        <div class="form-inputs">
                            <label for="npass">New Password:</label>
                            <input type="password" id="npass" placeholder="Enter Your New Password...">
                            <span class="form-error" id="form-error-newPass"></span>
                        </div>

                        <div class="form-inputs">
                            <label for="phone">Comfirm New Password:</label>
                            <input type="password" id="cpass" placeholder="Comfirm Your New Password...">
                            <span class="form-error" id="form-error-comfrmNewPass"></span>
                        </div>
                    </div>
                     <div class="button-container">
                                <div class="delete-button">
                                    <button class="update" type="button" onclick="changePassword()">Update</button>
                                    <button type="button" class="close-form-btn">Cancel</button>
                                </div>
                            </div>
                </from>
            </div>
        </div>
     
    </main>

    <?php include '../include/Footer.php'; ?>