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
        <li class="<?php echo ($current_page === 'dashboard.php') ? 'active' : ''; ?>">
            <a href="dashboard.php">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <!-- Users -->
        <li class="<?php echo ($current_page === 'users.php') ? 'active' : ''; ?>">
            <a href="users.php">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">Users</span>
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
        <!-- Logout -->
        <li>

            <a href="../logout.php" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>