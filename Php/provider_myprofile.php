<?php
    require './table_data.inc.php';
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
        margin-left: 400px;
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
            <h1>Tiffin Details:</h1>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Tiffin Name : <?php echo $tiffin_name;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>You provide : <?php echo $nonveg;?></h3>
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
            <h1>Delivery Details:</h1>
            </td>
        </tr>
         <tr>
            <td>
            <h2>You Deliver at : </h2>
            </td>
        </tr>
         <tr>
            <td>
            <h3>Kothrud : <?php echo $kothrud;?></h3>
            </td>
            <td>
            <h3>Karvenagar : <?php echo $karvenagar;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Swargate : <?php echo $swargate;?></h3>
            </td>
            <td>
            <h3>Deccan : <?php echo $deccan;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>J M Road : <?php echo $jmroad;?></h3>
            </td>
        
            <td>
            <h3>Bavdhan : <?php echo $bavdhan;?></h3>
            </td>
        </tr>
        <tr>
            <td>
            <h3>Law College Road : <?php echo $lawcollegeroad;?></h3>
            </td>
            <td>
            <h3>Warje : <?php echo $warje;?></h3>
            </td>
        </tr>
        </table>
        </div>
        </div> 
    </body>
</html>

