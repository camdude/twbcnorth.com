<?php $title = "Contact" ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php include 'include/head.php'; ?>
    </head>
    <body>
        <div class="contact-wrapper">
            <?php include 'include/header.php' ?>

            <?php
                if ($_GET['m'] == "sent") {
                    ?>
                    <div class="notice">
                        <h2>Your message has been sent</h2>
                        <p>We will try and get back to you soon.</p>
                    </div>
                    <?php
                }
            ?>

            <div class="contact-details">
                <!-- <img src="resources/images/twbc_logo.svg" alt="TWBC logo"> -->
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="142px" height="54px" viewBox="0 0 1420 540" preserveAspectRatio="xMidYMid meet">
                    <g id="layer101" fill="rgb(71, 172, 190)" stroke="none">
                        <path d="M680 455 c0 -84 0 -85 -25 -85 -14 0 -25 -1 -25 -3 0 -2 7 -27 16 -56 8 -29 13 -55 11 -58 -3 -2 -8 9 -12 26 -4 17 -13 31 -21 31 -19 0 -18 -11 7 -107 l22 -83 72 0 72 0 22 83 c25 96 26 107 7 107 -8 0 -17 -14 -21 -31 -4 -17 -9 -28 -12 -26 -2 3 3 29 11 58 9 29 16 54 16 56 0 2 -11 3 -25 3 -25 0 -25 1 -25 85 0 78 -2 85 -20 85 -17 0 -20 -8 -23 -87 l-3 -88 -2 88 c-2 80 -4 87 -22 87 -18 0 -20 -7 -20 -85z"/>
                        <path d="M1168 489 c-16 -9 -18 -30 -18 -217 0 -149 3 -211 12 -220 17 -17 229 -17 246 0 9 9 12 71 12 220 0 195 -1 208 -19 218 -25 13 -211 13 -233 -1z m140 -162 l3 -107 32 0 c41 0 62 -13 54 -34 -4 -11 -19 -16 -46 -16 -38 0 -40 -2 -43 -32 -2 -25 -8 -33 -23 -33 -15 0 -21 8 -23 32 -3 30 -6 32 -45 35 -34 2 -42 7 -42 23 0 16 8 21 43 23 l42 3 0 103 c0 106 3 119 30 114 12 -3 16 -23 18 -111z"/>
                        <path d="M169 456 c-54 -40 -81 -75 -113 -148 -23 -53 -60 -187 -53 -194 2 -2 27 5 55 16 91 35 173 20 248 -43 18 -15 35 -27 39 -27 10 0 -4 197 -16 236 -5 17 -28 48 -49 68 -38 35 -45 53 -41 104 2 31 -16 27 -70 -12z"/>
                        <path d="M698 99 c-27 -15 -24 -75 3 -90 36 -19 69 3 69 45 0 47 -34 68 -72 45z"/>
                    </g>
                </svg>
                <h2>Contact Info</h2>
                <p>Phone: <a href="tel:0422 926 053">0422 926 053</a><br>
                    E-Mail: <a href="mailto:twbcnorth@outlook.com">twbcnorth@outlook.com</a></p><br>
                <a href="https://www.facebook.com/twbcn/"><img class="icon" src="resources/images/icons/facebook.png" alt="Facebook"/></a><br>
            </div>
            <div class="contact-form">
                <form class="" action="./mail.php" method="post">
                    <ul>
                        <li>
                            <label for="name">Name:</label>
                            <input type="text" name="name" required>
                        </li>
                        <li>
                            <label for="email">Email:</label>
                            <input type="email" name="email" required>
                        </li>
                        <li>
                            <label for="message">Message:</label>
                            <textarea name="message" required></textarea>
                        </li>
                        <li>
                            <input class="main-button" type="submit" name="contact" value="Submit" disabled>
                            <p>Form currently disabled. Please send an email instead.</p>
                        </li>
                    </ul>
                </form>
            </div>
            <?php include 'include/footer.php' ?>
        </div>
    </body>
</html>
