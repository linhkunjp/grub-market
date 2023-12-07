<div>
    <?php
    if (isset($_GET['quanly'])) {
        $tam = $_GET['quanly'];
    } else {
        $tam = '';
    }
    if ($tam == 'recommendation') {
        include("recommendation/index.php");
    }
    ?>
</div>