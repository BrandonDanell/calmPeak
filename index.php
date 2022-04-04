<?php
    session_start();
    $locations = array();
    if (isset($_SESSION['locations'])) {
      $locations = $_SESSION['locations'];
    } 

    require_once 'Dao.php';
    require_once('./components/indexHead.php');

    
?>

<body>
    <h1 class="page-title"><strong id="title">Tapped In</strong></h1>

    <!-- call head and navbar here -->
    <?php
    require_once './components/navbar.php';
    ?>

    <!-- search box -->
    <div class="search-box-container">
        <label class="search-box" for="user-search-box"> Search:</label>
        <input type="text" id="user-search-box" placeholder="City, State">
        <button class="search-box-submit" onclick="search();">Search</button>
    </div>
    

    <div class="location-box">
        
        <div class="location-box-title">
                <span><strong>Taps Near You</strong></span>
        </div>

        <!-- results list -->
        <div>
        <ol id="result-list">
            <?php
                if($locations != null) {
                    $i = 0;
                    foreach($locations as $location) {
                        echo "<button class='location-button' id='" . $i . "' onclick=\"changeFrame('" . $location['link'] . "');\">" . $location['title'] . "</button>";
                        $i++;
                    }
                }
            ?>
        </ol>
        </div>
    </div>

    <div class="tap-list-container">
        <div class="tap-list-title">
            <span><strong>Tap List</strong></span>
        </div>
        <iframe class="tap-list" id="tap-list" src=""></iframe>
    </div>
</body>
</html>