 <?php
if(!isset($link1)){
    $link1 = "";
}
if(!isset($link2)){
    $link2 = "";
}
if(!isset($link3)){
    $link3 = "";
}
 ?>
 <!--==================== HEADER ====================-->
 <header class="header" id="header">
            <nav class="nav container">
                <a href="/index.php" class="nav-logo">Five Nights at Kw1c</a>

                <div class="nav-menu" id="nav-menu">
                    <ul class="nav-list grid">
                        <li class="nav-item">
                            <a href="index.php" class=<?php echo "\"nav-link ".$link1."\"" ?>>
                                <i class="uil uil-estate nav-icon"></i>Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#Info" class=<?php echo "\"nav-link ".$link2."\"" ?>>
                                <i class="uil uil-file-info-alt nav-icon"></i>Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="RegisterForm.php" class=<?php echo "\"nav-link ".$link3."\"" ?>>
                                <i class="uil uil-file-info-alt nav-icon"></i> Registreren</a
                            >
                        </li>
                    
                    </ul>
                    <i class="uil uil-times nav-close" id="nav-close"></i>
                </div>

                <div class="nav-btns">
                    <i class="uil uil-moon change-theme" id="theme-button"></i>
                    <div class="nav-toggle" id="nav-toggle">
                        <i class="uil uil-apps"></i>
                    </div>
                </div>
            </nav>
        </header>
