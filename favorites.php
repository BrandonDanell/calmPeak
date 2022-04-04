
<?php
    session_start();
    require_once 'Dao.php';
    require_once './components/favoritesHead.php';
?>

<body>
    <h1 class="page-title"><strong>Tapped In</strong></h1>

    <!-- php calls head and navbar here -->
    <?php 
    
    require_once './components/navbar.php';
    ?>

    <div class="location-box">
        <div class="location-box-title">
                <span><strong>Favorites</strong></span>
        </div>

        <!-- results list -->
        <ol id="result-list">
            <?php 
                $dao = new Dao();
                $i = 0;
                $userFavorites = $dao->getFavorites($_SESSION['user-email']);
                echo "<button class='location-button' id='" . $i . "' onclick=\"changeFrame('" . $userFavorites['url'] . "');\">" . $userFavorites['location'] . "</button>";
                
            ?>
            
        </ol>
    </div>

    <div class="tap-list-container">
        <div class="tap-list-title">
            <span><strong>Tap List</strong></span>
        </div>
        <iframe class="tap-list" id="tap-list"></iframe>
    </div>
</body>
</html>