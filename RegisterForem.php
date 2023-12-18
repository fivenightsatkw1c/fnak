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
    <?php include 'header.php'; ?>
     <!-- Main content -->
    <main class="main">
       
        
        <!-- ... -->
         <!--==================== RegisterForm ====================-->
         <section class="RegisterForm section" id="Register">
                <h2 class="section-title">Register Me</h2>
                <span class="section-subtitle">Get in touch</span>

                <div class="Register-container container">
                    <form class="Register-form grid">
                        <div class="Register-inputs grid">
                            <div class="Register-content">
                                <label for="name" class="Register-label">Name</label>
                                <input type="text" class="Register-input" id="name" />
                            </div>
                            <div class="Register-content">
                                <label for="email" class="Register-label">Email</label>
                                <input type="email" class="Register-input" id="email" />
                            </div>
                        </div>

                        <div class="Register-content">
                            <label for="project" class="Register-label">Project</label>
                            <input type="text" class="Register-input" id="project" />
                        </div>

                        <div class="Register-content">
                            <label for="message" class="Register-label">Message</label>
                            <textarea
                                name="message"
                                id="message"
                                cols="0"
                                rows="7"
                                class="Register-input"
                            ></textarea>
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
