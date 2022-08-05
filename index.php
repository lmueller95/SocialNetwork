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
<div class="main_column column" id="column">
    <form class="post_form" action="index.php" method="POST">
        <textarea name="post_text" id="post_text" placeholder="Got something to say?"></textarea>
        <input type="submit" name="post" id="post_button" value="Post">
        <hr>
    </form>

</div>

</div>
</body>
</html>

