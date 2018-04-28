<?php
    require './header_user.inc.php';
    require './config.user.inc.php';
    require './connect.inc.php';
    
    $user_id_login = $_SESSION['id'];
    
    $query1 = "SELECT * FROM `user_data` WHERE `id` = $user_id_login";
    $query2 = "SELECT * FROM `tiffin_join` WHERE `user_id` = $user_id_login";
    
    $query1_run = mysqli_query($db, $query1);
    $query2_run = mysqli_query($db, $query2);
    
    $row1 = mysqli_fetch_assoc($query1_run);
    $row2 = mysqli_fetch_assoc($query2_run);
    
    $firstname = $row1 ['firstname'];
    $lastname = $row1 ['lastname'];
    $email = $row1 ['email'];
    $address = $row1 ['address'];
    $mobile = $row1 ['mobile'];
    $locality = $row1 ['locality'];
    $provider_id = $row2 ['provider_id'];
    $times = $row2 ['radio_1'];
    $full_half = $row2 ['full_half'];
    
    $query3 = "SELECT * FROM `provider_data` WHERE `id` = $provider_id";
    $query3_run = mysqli_query($db, $query3);
    $row3 = mysqli_fetch_assoc($query3_run);
    
    $email1 = $row3 ['email'];
    $mobile1 = $row3 ['mobile'];
    $tiffin_name = $row3 ['tiffin_name'];
    $nonveg = $row3 ['non-veg'];
    if($nonveg)
    {
        $nonveg = 'Veg and Non-Veg';
    }
    else
    {
        $nonveg = 'Only Veg';
    }
    if($full_half == 1)
    {
        $final2 = "Full Tiffin for";
    }
    else
    {
        $final2 = "Half Tiffin for";
    }
    if($times == 0)
    {
        
        $daynight = $row2 ['radio_2'];
        if($daynight == 1)
        {
            $final1 = "1 Time -> Lunch";
        }
        else if($daynight == 0)
        {
            $final1 = "1 Time -> Dinner";
        }
        $query4 = "SELECT * FROM `half_meal` WHERE `id` = $provider_id";
        $query5 = "SELECT * FROM `full_meal` WHERE `id` = $provider_id";
    }
    else
    {
        
        $final1 = "2 Time";
        $query5 = "SELECT * FROM `full_meal` WHERE `id` = $provider_id";
        $query4 = "SELECT * FROM `half_meal` WHERE `id` = $provider_id";
        
    }
    $query4_run = mysqli_query($db, $query4);
    $row4 = mysqli_fetch_assoc($query4_run);
    $query5_run = mysqli_query($db, $query5);
    $row5 = mysqli_fetch_assoc($query5_run);
    if($full_half == 1)
    {
        if($times == 0)
        {
            $price = $row5 ['half_price'];
        }
        else
        {
            $price = $row5 ['full_price'];
        }
        $roti = $row5 ['no_roti'];
        $sabji = $row5 ['no_sabji'];
        $rice = $row5 ['rice'];
        $salad = $row5 ['salad'];
        $sweet = $row5 ['sweet'];
    }
    else
    {
        if($times == 0)
        {
            $price = $row4 ['half_price'];
        }
        else
        {
            $price = $row4 ['full_price'];
        }
        $roti = $row4 ['no_roti'];
        $sabji = $row4 ['no_sabji'];
        $rice = $row4 ['rice'];
        $salad = $row4 ['salad'];
        $sweet = $row4 ['sweet'];
    }
    

    
    if($rice)
    {
        $rice = 'Yes';
    }
    else
    {
        $rice = 'No';
    }

    if($salad)
    {
        $salad = 'Yes';
    }
    else
    {
        $salad = 'No';
    }
    
    if($sweet)
    {
        $sweet = 'Yes';
    }
    else
    {
        $sweet = 'No';
    }
    
    $final = $final2.' '.$final1;
?>
<html>
    <style>
    .profile 
    {
        background-color: green;
    }

    div.background 
    {
        background: url(klematis.jpg) repeat;
        border: 2px solid black;
    }

    div.transbox 
    {
        margin: 30px;
        background-color: #ffffff;
        border: 1px solid black;
        opacity: 0.6;
        filter: alpha(opacity=60); /* For IE8 and earlier */
    }

    div.transbox table 
    {
        margin: 5%;
        font-weight: bold;
        color: #000000;
    }


    h1
    {
        text-decoration: underline;
        text-align: center;
        font-weight: bold;
        font-size: 40px;
    }
    h2
    {
        font-weight: bold;
        font-size: 35px;
    }
    h3
    {
        font-size: 30px;
    }

    tr
    {
        height: 30px;
    }

    td
    {
        width: 2000px;
    }
</style>
<body>
        <div class="background">
        <div class="transbox">
        <table align = "center">
        <tr>
            <td>
            <h1>Personal Details:</h1>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Name : <?php echo $firstname.' '.$lastname;?></h3>
        </tr>
        <tr>
            <td>
            <h3>Email-Id : <?php echo $email;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Mobile No : <?php echo $mobile;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Address : <?php echo $address;?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Locality : <?php echo $locality;?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h1>Tiffin Details:</h1>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Tiffin Name : <?php echo $tiffin_name;?></h3>
        </tr>
        <tr>
            <td>
            <h3>Email-Id : <?php echo $email1;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Mobile No : <?php echo $mobile1;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Tiffin Type : <?php
                                    $query = "SELECT `user_id` FROM `tiffin_join` WHERE `user_id`=$user_id_login";
                                    $query_run = mysqli_query($db, $query);
                                    if($query_run == 1)
                                        echo $nonveg.' , '.$final;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Tiffin Price : <?php echo $price;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>No of Roti : <?php echo $roti;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>No of Sabji : <?php echo $sabji;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Rice : <?php echo $rice;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Salad : <?php echo $salad;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Sweet : <?php echo $sweet;?></h3>
            </td>
        </tr>
        
        </table>
        </div>
        </div> 
    </body>
</html>
