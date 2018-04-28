<?php
    include 'header_user.inc.php';
    require './config.inc.php';
    require './connect.inc.php';
    $user_id_login = $_SESSION['id'];
    $provider_id = $_SESSION['search'];
    
    $query1 = "SELECT * FROM `provider_data` WHERE `id` = $provider_id";
    $query3 = "SELECT * FROM `full_meal` WHERE `id` = $provider_id";
    $query4 = "SELECT * FROM `half_meal` WHERE `id` = $provider_id";
    
    $query1_run = mysqli_query($db, $query1);
    $query3_run = mysqli_query($db, $query3);
    $query4_run = mysqli_query($db, $query4);
    
    $row1 = mysqli_fetch_assoc($query1_run);
    $row3 = mysqli_fetch_assoc($query3_run);
    $row4 = mysqli_fetch_assoc($query4_run);
    
    $firstname = $row1 ['firstname'];
    $lastname = $row1 ['lastname'];
    $email = $row1 ['email'];
    $address = $row1 ['address'];
    $mobile = $row1 ['mobile'];
    $tiffin_name = $row1 ['tiffin_name'];
    $nonveg = $row1 ['non-veg'];
    
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

<html>
    <style>
    .home
    {
        background-color: green;
    }           
    .button
    {
        margin-left: 550px;
        background-color: black;
        font-size: 40px;
        color: white;
        border-radius: 7px;
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
        font-size: 30px;
    }
    h3
    {
        font-size: 30px;
    }
    h4
    {
        font-size: 35px;
        color: red;
    }
    tr
    {
        height: 30px;
    }

    td
    {
        width: 2000px;
    }
    label:after 
    { 
        content: ""; 
        display: block;
    }
    .radio-2 
    {
      margin-left: 20px;
      opacity: .7;
      pointer-events: none;
    }
    input:checked + label + .radio-2 
    {
        opacity: 1;
        pointer-events: all;
    }
    .rad
    {
        height: 30px;
        width: 30px;
    }
    .thinker
    {
        font-size: 30px;
    }
    .big
    {
        margin-left: 400px;
    }
</style>
    <body>
        <form action="searched_tiffin_details.php" method="POST">
        <div class="background">
        <div class="transbox">
        <table align = "center">
        
        <tr>
            <td>
                <h1 class="big"><?php echo $tiffin_name;?></h1>
            </td>
        </tr>
        <tr>
            <td>
               <?php
               if(isset($_POST['join']))
               {
                    $query = "SELECT * FROM `tiffin_join` where `user_id` = $user_id_login";
                    $query_run = mysqli_query($db, $query);
                    if(mysqli_num_rows($query_run) == 1)
                    {
                        echo '<h4>You have already joined another tiffin!<h4>';
                    }
                    else
                    {
                        $value2 = $_POST['full_half'];
                        if(($value = $_POST['radio-1']) == 1)
                        {
                            $query = "INSERT INTO `tiffin_join` VALUES('$user_id_login','$provider_id','$value',2,'$value2')";
                            if((($query_run = mysqli_query($db, $query)) == 1))
                            {
                                header('Location: home_user.php');
                            }
                        }
                        else
                        {
                            $value1 = $_POST['radio-2'];
                            $query = "INSERT INTO `tiffin_join` VALUES('$user_id_login','$provider_id','$value','$value1','$value2')";
                            if((($query_run = mysqli_query($db, $query)) == 1))
                            {
                                header('Location: home_user.php');
                            }
                        }
                        
                        $_SESSION['providerid'] = $provider_id;
                    }
                }
               ?>
            </td>
        </tr>
        <tr>
            <td>
            <h3>We provide : <?php echo $nonveg;?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h2>Full Tiffin</h2>
            </td>
            <td>
                <h2>Half Tiffin</h2>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Price(2 Time) : <?php echo $full_2time;?></h3>
            </td>
            <td>
                <h3>Price(2 Time) : <?php echo $half_2time;?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Price(1 Time) : <?php echo $full_1time;?></h3>
            </td>
            <td>
                <h3>Price(1 Time) : <?php echo $half_1time;?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h3>No of Roti : <?php echo $full_roti;?></h3>
            </td>
            <td>
                <h3>No of Roti : <?php echo $half_roti;?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h3>No of Sabji : <?php echo $full_sabji;?></h3>
            </td>
            <td>
                <h3>No of Sabji : <?php echo $half_sabji;?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Rice : <?php echo $full_rice;?></h3>
            </td>
            <td>
                <h3>Rice : <?php echo $half_rice;?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Salad : <?php echo $full_salad;?></h3>
            </td>
            <td>
                <h3>Salad : <?php echo $half_salad;?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Sweet : <?php echo $full_sweet;?></h3>
            </td>
            <td>
                <h3>Sweet : <?php echo $half_sweet;?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <hr width="155%">
            </td>
        </tr>
        <tr>
            <td>
                <h1 class="big">Plan your tiffin - </h1>
            </td>
        </tr> 
        <tr class="thinker">
            <td>
                <input class="rad" type="radio" id="r-1" name="radio-1" value="1" checked><label for="r-1">2 Time Tiffin</label>
            </td>
            <td>
                <input class="rad" type="radio" name="full_half" value ="1" checked>Full Tiffin
            </td>
        </tr>
        <tr class="thinker">
            <td>
                <input class="rad" type="radio" id="r-2" name="radio-1" value="0"><label for="r-2">1 Time Tiffin</label>

            <div class="radio-2">

                <input class="rad" type="radio" id="r-3" name="radio-2" value="1" checked><label for="r-3">Lunch</label>

                <input class="rad" type="radio" id="r-4" name="radio-2" value="0"><label for="r-4">Dinner</label>

            </div>
            </td>
            <td>
                <input class="rad" type="radio" name="full_half" value ="0">Half Tiffin
            </td>
        </tr>
        <td>
            <input class="button" type="submit" value="Join" name="join">
        </td>
        </tr>
        </table>
        </div>
        </div>
        </form>
    </body>
</html>

