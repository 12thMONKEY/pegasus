<?php
        if(!defined('__ROOT__'))
        {
                 define('__ROOT__', dirname(dirname(__FILE__)));
        }
        require_once(__ROOT__ ."/utils/functions.php");
        selectUserData();


        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $full_name = $first_name . ' ' . $last_name;
?>
<div class="mainContent">
        <header class="pageHeader">
                <div class="navAccount">
                        <a href="#" class="profileLink">
                                <?php
                                        echo '<img src="http://www.inigral.com/eduweb/images/thumbs/placeholder.gif" alt="Profilbild" height="50" width="50">';
                                        echo '<span class="userName">'.$full_name.'</span>';
                                ?>
                        </a>
                        <ul class="navAccountMenu">
                                <li>
                                        <a href="#" class="profile">Profil</a>
                                </li>
                                <li>
                                        <a href="#" class="logout">Logout</a>
                                </li>
                        </ul>
                </div>
        </header>
        <nav class="pageSidebar">
                <ul>
                        <li>
                                <a href="content/user_home.php">Home</a>
                        </li>
                        <li>
                                <a href="content/user_calendar.php">Termine</a>
                        </li>
                        <li>
                                <a href="content/user_notice.php">Notizen</a>
                        </li>
                        <li>
                                <a href="content/user_tasks.php">Aufgaben</a>
                        </li>
                        <li>
                                <a href="content/user_profile.php">Profil</a>
                        </li>
                </ul>
        </nav>
        <section class="pageContent">
                <?php include('user_home.php'); ?>
        </section>

</div>

<?php ?>