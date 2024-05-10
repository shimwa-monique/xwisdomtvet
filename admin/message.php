<?php 
    if(isset($_GET['error'])){
        ?>
        <div style="width: 90%; background: red; padding: 10px; color: white">
            <p> <?php echo $_GET['error'] ?></p>
        </div>
        <?php 
    }
    if(isset($_GET['success'])){
        ?>
        <div style="width: 90%; background: green; padding: 10px; color: white">
            <p> <?php echo $_GET['success'] ?></p>
        </div>
        <?php 
    }
    ?>