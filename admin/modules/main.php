<div class="clear"></div>
<div class="main">
    <?php
    if (isset($_GET['action']) && $_GET['query']) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }
    if ($tam == 'qldm' && $query == 'them') {
        include("modules/qldm/add.php");
        include("modules/qldm/list.php");
    } elseif ($tam == 'qldm' && $query == 'sua') {
        include("modules/qldm/edit.php");

    } elseif ($tam == 'qlsp' && $query == 'them') {
        include("modules/qlsp/add.php");
        include("modules/qlsp/list.php");

    } elseif ($tam == 'qlsp' && $query == 'sua') {
        include("modules/qlsp/edit.php");

    } elseif ($tam == 'qldh' && $query == 'lietke') {
        include("modules/qldh/lietke.php");

    } elseif ($tam == 'qldh' && $query == 'xemdonhang') {
        include("modules/qldh/xemdonhang.php");

    } elseif ($tam == 'qldmbv' && $query == 'them') {
        include("modules/qldmbv/add.php");
        include("modules/qldmbv/list.php");

    } elseif ($tam == 'qldmbv' && $query == 'sua') {
        include("modules/qldmbv/edit.php");

    } elseif ($tam == 'qlbv' && $query == 'them') {
        include("modules/qlbv/add.php");
        include("modules/qlbv/list.php");

    } elseif ($tam == 'qlbv' && $query == 'sua') {
        include("modules/qlbv/edit.php");

    } else {
        include("modules/dashboard.php");
    }

    ?>
</div>