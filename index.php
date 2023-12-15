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
       
        <svg class="blobCont">
            <image href="./assets/img/Backround.png" mask="url(#mask)" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" />
            <defs>
                <filter id="gooey" height="130%">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="15" result="blur" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                </filter>
            </defs>
            <mask id="mask" x="0" y="0">
            <g style="filter: url(#gooey)">
                <!-- Add circles -->
                  <circle class="blob" cx="10%" cy="10%" r="80" fill="white" stroke="white"/>
                  <circle class="blob" cx="50%" cy="10%" r="40" fill="white" stroke="white"/>
                  <circle class="blob" cx="17%" cy="15%" r="70" fill="white" stroke="white"/>
                  <circle class="blob" cx="90%" cy="20%" r="120" fill="white" stroke="white"/>
                  <circle class="blob" cx="30%" cy="25%" r="30" fill="white" stroke="white"/>
                  <circle class="blob" cx="50%" cy="60%" r="80" fill="white" stroke="white"/>
                  <circle class="blob" cx="70%" cy="90%" r="10" fill="white" stroke="white"/>
                  <circle class="blob" cx="90%" cy="60%" r="90" fill="white" stroke="white"/>
                  <circle class="blob" cx="30%" cy="90%" r="80" fill="white" stroke="white"/>
                  <circle class="blob" cx="10%" cy="10%" r="80" fill="white" stroke="white"/>
                  <circle class="blob" cx="50%" cy="10%" r="20" fill="white" stroke="white"/>
                  <circle class="blob" cx="17%" cy="15%" r="70" fill="white" stroke="white"/>
                  <circle class="blob" cx="40%" cy="20%" r="120" fill="white" stroke="white"/>
                  <circle class="blob" cx="30%" cy="25%" r="30" fill="white" stroke="white"/>
                  <circle class="blob" cx="80%" cy="60%" r="80" fill="white" stroke="white"/>
                  <circle class="blob" cx="17%" cy="10%" r="100" fill="white" stroke="white"/>
                  <circle class="blob" cx="40%" cy="60%" r="90" fill="white" stroke="white"/>
                  <circle class="blob" cx="10%" cy="50%" r="80" fill="white" stroke="white"/>
                </g>
            </mask>
        </svg>
        <!-- ... -->
        
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
