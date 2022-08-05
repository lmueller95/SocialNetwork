<?php

include 'includes/header.php';
?>
<div class="user_detail column">
    <a href="'">
        <img src="<?php
        echo $user['profil_pic'] ?>">
    </a>
    <div class="user_details_left_right">
        <a href="'">
            <?php
            echo $user['name'] . " " . $user['lastName'];
            ?>
        </a>
        <br>
        <?php
        echo "Posts: " . $user['num_posts'] . "<br>";
        echo "Likes: " . $user['num_likes'];
        ?>
    </div>

</div>

</div>
</body>
</html>

