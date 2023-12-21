<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--==================== SWIPER CSS ====================-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- GOOGLE FONT POPPIN -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/img/favicon.png" type="image/png">
    <!--==================== CSS ====================-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Koning Willem 1</title>
</head>
<body>
    <!-- Header content -->
    <?php $link3="active-link"; include 'header.php'; ?>
     <!-- Main content -->
    <main class="main">
       
        
        <!-- ... -->
         <!--==================== RegisterForm ====================-->
         <section class="RegisterForm section" id="Register">
                <h2 class="section-title">Register Hier</h2>
                <span class="section-subtitle"></span>

                <div class="Register-container container">
                    <form class="Register-form grid">
                        <div class="Register-inputs grid">
                            <div class="Register-content">
                                <label for="team" class="Register-label">TeamNaam</label>
                                <input type="text" class="Register-input" id="name" />
                            </div>
                            <div class="Register-content">
                                <label for="email" class="Register-label">Tijd</label>
                                <select name="time" class="Register-input">
                                    <option value="08:00">8:00 AM</option>
                                    <option value="09:00">9:00 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                </select>
                            </div>
                        </div>

                        <div class="Register-content">
                            <label for="leden" class="Register-label">Leden</label>
                            <input type="text" class="Register-input" id="leden" />
                        </div>

                        <div>
                            <a href="#Register" class="button button--flex">
                                Send Message
                                <i class="uil uil-message button-icon"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </section>
        </main>

    </main>
    <!-- Footer content -->
    <?php include 'footer.php'; ?>

    <!--==================== SWIPER JS ====================-->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!--==================== SCROLL REVEAL JS ====================-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--==================== MAIN JS ====================-->
    <script src="assets/js/main.js"></script>
</body>
</html>
