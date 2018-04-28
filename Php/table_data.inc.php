<?php

    include './header2.inc.php';
    require './config.inc.php';
    require './connect.inc.php';
    
    $user_id_login = $_SESSION['views'];
    $query1 = "SELECT * FROM `provider_data` WHERE `id` = $user_id_login";
    $query2 = "SELECT * FROM `delivery` WHERE `id` = $user_id_login";
    $query3 = "SELECT * FROM `full_meal` WHERE `id` = $user_id_login";
    $query4 = "SELECT * FROM `half_meal` WHERE `id` = $user_id_login";
    
    $query1_run = mysqli_query($db, $query1);
    $query2_run = mysqli_query($db, $query2);
    $query3_run = mysqli_query($db, $query3);
    $query4_run = mysqli_query($db, $query4);
    
    $row1 = mysqli_fetch_assoc($query1_run);
    $row2 = mysqli_fetch_assoc($query2_run);
    $row3 = mysqli_fetch_assoc($query3_run);
    $row4 = mysqli_fetch_assoc($query4_run);
    
    $firstname = $row1 ['firstname'];
    $lastname = $row1 ['lastname'];
    $email = $row1 ['email'];
    $address = $row1 ['address'];
    $mobile = $row1 ['mobile'];
    $tiffin_name = $row1 ['tiffin_name'];
    $nonveg = $row1 ['non-veg'];
    $password = $row1 ['password'];
    
    $kothrud = $row2 ['kothrud'];
    $karvenagar = $row2 ['karvenagar'];
    $swargate = $row2 ['swargate'];
    $deccan = $row2 ['deccan'];
    $jmroad = $row2 ['jmroad'];
    $bavdhan = $row2 ['bavdhan'];
    $lawcollegeroad = $row2 ['lawcollegeroad'];
    $warje = $row2 ['warje'];
    
    $full_2time = $row3 ['full_price'];
    $full_1time = $row3 ['half_price'];
    $full_roti = $row3 ['no_roti'];
    $full_sabji = $row3 ['no_sabji'];
    $full_rice = $row3 ['rice'];
    $full_salad = $row3 ['salad'];
    $full_sweet = $row3 ['sweet'];
    
    $half_2time = $row4 ['full_price'];
    $half_1time = $row4 ['half_price'];
    $half_roti = $row4 ['no_roti'];
    $half_sabji = $row4 ['no_sabji'];
    $half_rice = $row4 ['rice'];
    $half_salad = $row4 ['salad'];
    $half_sweet = $row4 ['sweet'];
    
    if($kothrud)
    {
        $kothrud = 'Yes';
    }
    else
    {
        $kothrud = 'No';
    }
    if($karvenagar)
    {
        $karvenagar = 'Yes';
    }
    else
    {
        $karvenagar = 'No';
    }
    if($swargate)
    {
        $swargate = 'Yes';
    }
    else
    {
        $swargate = 'No';
    }
    if($deccan)
    {
        $deccan = 'Yes';
    }
    else
    {
        $deccan = 'No';
    }
    if($jmroad)
    {
        $jmroad = 'Yes';
    }
    else
    {
        $jmroad = 'No';
    }
    if($bavdhan)
    {
        $bavdhan = 'Yes';
    }
    else
    {
        $bavdhan = 'No';
    }
    if($lawcollegeroad)
    {
        $lawcollegeroad = 'Yes';
    }
    else
    {
        $lawcollegeroad = 'No';
    }
    if($warje)
    {
        $warje = 'Yes';
    }
    else
    {
        $warje = 'No';
    }
    if($nonveg)
    {
        $nonveg = 'Veg and Non-Veg';
    }
    else
    {
        $nonveg = 'Only Veg';
    }
    if($full_rice)
    {
        $full_rice = 'Yes';
    }
    else
    {
        $full_rice = 'No';
    }
    if($half_rice)
    {
        $half_rice = 'Yes';
    }
    else
    {
        $half_rice = 'No';
    }
    if($full_salad)
    {
        $full_salad = 'Yes';
    }
    else
    {
        $full_salad = 'No';
    }
    if($half_salad)
    {
        $half_salad = 'Yes';
    }
    else
    {
        $half_salad = 'No';
    }
    if($full_sweet)
    {
        $full_sweet = 'Yes';
    }
    else
    {
        $full_sweet = 'No';
    }
    if($half_sweet)
    {
        $half_sweet = 'Yes';
    } 
    else
    {
        $half_sweet = 'No';
    }
?>