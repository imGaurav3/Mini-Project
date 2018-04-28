<?php
    require './header_user.inc.php';
    require './config.user.inc.php';
    require './connect.inc.php';
    
    $user_id_login = $_SESSION['id'];
    $query1 = "SELECT * FROM `notifications` WHERE `user_id`=$user_id_login";
    $query1_run = mysqli_query($db, $query1);
    $row1 = mysqli_fetch_assoc($query1_run);
    $provider_cancel = $row1 ['provider_cancel'];
    $provider_id = $row1 ['provider_id'];
    $query2 = "SELECT * FROM `todays_menu` WHERE `id`=$provider_id";
    $query2_run = mysqli_query($db, $query2);
    $row2 = mysqli_fetch_assoc($query2_run);
    $l_roti = $row2 ['l_roti'];
    $d_roti = $row2 ['d_roti'];
    $l_sabji1 = $row2 ['l_sabji1'];
    $d_sabji1 = $row2 ['d_sabji1'];
    $l_sabji2 = $row2 ['l_sabji2'];
    $d_sabji2 = $row2 ['d_sabji2'];
    $l_rice = $row2 ['l_rice'];
    $d_rice = $row2 ['d_rice'];
    $l_salad = $row2 ['l_salad'];
    $d_salad = $row2 ['d_salad'];
    $l_sweet = $row2 ['l_sweet'];
    $d_sweet = $row2 ['d_sweet'];
    
    if(isset($_POST['canceltiffin']))
    {
        $query = "UPDATE `notifications` SET `user_cancel`= 1 WHERE `user_id`=$user_id_login";
        if($query_run = mysqli_query($db, $query))
            showMessage ("Your tiffin for today is cancelled !!");
    }
    if(empty($l_roti) && empty($d_roti) && empty($l_sabji1) && empty($d_sabji1) && empty($l_sabji2) && empty($d_sabji2) && empty($l_rice) && empty($d_rice) &&empty($l_salad) && empty($d_salad) &&empty($d_sweet) &&empty($d_sweet) && ($provider_cancel==0))
    {
        echo '<h2>Today\'s Menu is not updated yet!!!</h2>';
    }
    if($provider_cancel == 1 )
    {
        echo '<h4>Today\'s tiffin is canceled by provider</h4>';
    }
?>
<html>
    <style>
    .notification
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
    h4
    {
        font-weight: bold;
        font-size: 35px;
        color: red;
    }
    tr
    {
        height: 30px;
    }

    td
    {
        width: 350px;
        padding-left: 100px;
    }
    .hh
    {
        padding-left: 430px;
    }
    .button
    {
        background-color: black;
        font-size: 30px;
        color: white;
        border-radius: 7px;
        margin-left: -250px;
    }
</style>
<body>
    <form action="user_notifications.php" method="POST">
        <div class="background">
        <div class="transbox">
        <table align = "center">
        <tr>
            <td class="hh">
                <h1>Today's Menu:</h1><br><br>
            </td>
        </tr>
        <tr>
            <td>
                <h2>Lunch :</h2>
            </td>
            <td>
                <h2>Dinner :</h2>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Type of Roti : <?php echo $l_roti;?></h3>
            </td>
            <td>
            <h3>Type of Roti : <?php echo $d_roti;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Sabji 1 : <?php echo $l_sabji1;?></h3>
            </td>
            <td>
            <h3>Sabji 1 : <?php echo $d_sabji1;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Sabji 2 : <?php echo $l_sabji2;?></h3>
            </td>
            <td>
            <h3>Sabji 2 : <?php echo $d_sabji2;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Rice : <?php echo $l_rice;?></h3>
            </td>
            <td>
            <h3>Rice : <?php echo $d_rice;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Salad : <?php echo $l_salad;?></h3>
            </td>
            <td>
            <h3>Salad : <?php echo $d_salad;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Sweet (if any): <?php echo $l_sweet;?></h3>
            </td>
            <td>
            <h3>Sweet (if any): <?php echo $d_sweet;?></h3>
            </td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td>
                <h3>Want to cancel your tiffin for today?</h3>
                </td>
            <td>
                <input type="submit" name="canceltiffin" class="button" value="Cancel Tiffin">
            </td>
        </tr>
        </table>
        </div>
        </div> 
    </form>
    </body>
</html>
