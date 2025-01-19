<?php

$current_page = basename($_SERVER['PHP_SELF']); //PHP_SELF:
?>

<section id="sidebar">
    <a href="#" class="brand" style="text-decoration:none">
        <i class='bx bxs-smile'></i>
        <span class="text">Youdemy</span>
    </a>
    <ul class="side-menu top">
        <!-- Dashboard -->
        <li class="<?php echo ($current_page === 'index.php') ? 'active' : ''; ?>">
            <a href="index.php" style="text-decoration:none">
                <i class='bx bxs-dashboard' ></i>
                <span class="text1">Dashboard</span>
            </a>
        </li>
        
        <li class="<?php echo ($current_page === 'Mycours.php') ? 'active' : ''; ?>">
            <a href="Mycours.php" style="text-decoration:none">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">Mes Cours</span>
            </a>
        </li>
        
    </ul>
    <ul class="side-menu">
        <li>
            <a href="../logout.php" class="logout" style="text-decoration:none">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>