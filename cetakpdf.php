<?php   
    $type = $_GET['type'];

    //ternary
    $param = isset($_GET['param'])?$_GET['param']:null;

    if($type == 'krs')
    {
        header("Location: krsmhs.php?nim=".$param);
    }
    elseif($typw == 'krm')
    {
        header("Location: krm.php?npp=".$param);
    }
    else
    {
        echo "operasi tidak dapat dilakukan";
    }