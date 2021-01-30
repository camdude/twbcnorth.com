<?php $title = "Home" ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php include 'include/head.php'; ?>
</head>

<body>
    <div class="home-wrapper">
        <?php include 'include/header.php'; ?>
        <div class="featured">
            <h1>TWBC North in 2021</h1>
            <p>This year's conference won't be happening however, TWBC South is happening on March 20 and they have a live stream.</p>
            <p>Why not get a group of friends together and attend in person or in your own home?</p>
            <p>More information and registration <a href="https://twbcsouth.com/conference">here</a>.</p>
            <!-- <a href="https://twbcsouth.com/conference"><img class="confimg" src="resources/images/featured.png" alt="TWBC South 2021"></a> -->
        </div>
        <div id="card1" class="card">
            <h1>Register</h1>
            <p>Register for this years conference.</p><br>
            <a class="main-button" href="register.php">Register</a>
        </div>
        <div id="card2" class="card">
            <h1>Conference</h1>
            <p>Find out all the infomation for this years conference and also download the talks from previous years.</p><br>
            <a class="main-button" href="2019.php">Conferences</a>
        </div>
        <div id="card3" class="card">
            <h1>Contact</h1>
            <p>Contact us, with questions you have regarding the conference.</p><br>
            <a class="main-button" href="contact.php">Contact Us</a>
        </div>
        <?php include 'include/footer.php' ?>
    </div>
</body>

</html>