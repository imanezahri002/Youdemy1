<?php

$current_page = basename($_SERVER['PHP_SELF']); //PHP_SELF:
?>

<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Youdemy</span>
    </a>
    <ul class="side-menu top">
        <!-- Dashboard -->
        <li class="<?php echo ($current_page === 'index.php') ? 'active' : ''; ?>">
            <a href="index.php">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <!-- Users -->
        <li class="<?php echo ($current_page === 'Mycours.php') ? 'active' : ''; ?>">
            <a href="Mycours.php">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">Mes Cours</span>
            </a>
        </li>
        <!-- Cours -->
        <li class="<?php echo ($current_page === 'cours.php') ? 'active' : ''; ?>">
            <a href="cours.php">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Cours</span>
            </a>
        </li>
        <!-- Categories -->
        <li class="<?php echo ($current_page === 'categories.php') ? 'active' : ''; ?>">
            <a href="categories.php">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Categories</span>
            </a>
        </li>
        <!-- Tags -->
        <li class="<?php echo ($current_page === 'tags.php') ? 'active' : ''; ?>">
            <a href="tags.php">
                <i class='bx bxs-group' ></i>
                <span class="text">Tags</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <!-- Settings -->
        <li class="<?php echo ($current_page === 'settings.php') ? 'active' : ''; ?>">
            <a href="settings.php">
                <i class='bx bxs-cog' ></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <!-- Logout -->
        <li>

            <a href="../logout.php" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>