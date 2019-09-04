<?php
session_start();

if (!isset($_SESSION['insta_login'])) {
    header('location: index.php');
}
?>
<!doctype html>
<html>
    <head>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' type='text/css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js'></script>
    </head>
    <body>
        <div class='container'>
            <div class='row' style='margin-top: 20px;'>
                <div class='col-md-3'>
                    <img src='<?= $_SESSION['insta_login']->user->profile_picture ?>' >
                </div>
                <div class='col-md-9'>
                    <p>Username : <?= $_SESSION['insta_login']->user->username; ?></p>
                    <p>Full Name : <?= $_SESSION['insta_login']->user->full_name ?></p>
                    <p>Bio : <?= $_SESSION['insta_login']->user->bio ?></p>
                    <p>Website : <?= $_SESSION['insta_login']->user->website ?></p>
                </div>
            </div>
        </div>
    </body>
</html>