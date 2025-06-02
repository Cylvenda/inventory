<?php require_once '../Config/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('../include/cssheader.php'); ?>

<body>
    <?php include '../include/header.php';
    require_once '../include/Nav.php'; ?>

    <main>
        <!-- url container -->
        <div class="url">
            <span>
                <a href="Dashboard">Home</a> / <a href="Profile">Profile</a>
            </span>

            <span>
                <h2><?php echo $_SESSION['name'] ?> Profile Management</h2>
            </span>
        </div>

        <div class="main-container">
            <div class="profile-container">
                <div id="msg-edit" class="new"></div>
            <form class="profile-form" >
                    <div class="customer-details">
                        <h3>Profile Details</h3>
                        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" id="user-id-edit">
                        <div class="form-inputs">
                            <label for="uname">Client Name</label>
                            <input type="text" id="edit-name">
                        </div>

                        <div class="form-inputs">
                            <label for="email">Client Email</label>
                            <input type="email" id="edit-email" >
                        </div>

                        <div class="form-inputs">
                            <label for="phone">Client Phonenumber</label>
                            <input type="tel" id="edit-phone" >
                        </div>

                    </div>

                    <div class="button-container">
                                <div class="delete-button">
                                    <button class="update" type="button" onclick="updateUser()">Update</button>
                                    <button type="button" class="close-form-btn">Cancel</button>
                                </div>
                            </div>
            </form>
            </div>
        </div>
    </main>

    <?php include '../include/Footer.php'; ?>