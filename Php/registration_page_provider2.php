<?php
    include 'header.inc.php';
    require './config.inc.php';
    require './connect.inc.php';
    $email = $_SESSION['views'];
    $query = "SELECT * FROM `provider_data` WHERE `email` = '$email'";
    $query_run = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($query_run);
    $user_id = $row ['id'];
    if(isset($_POST['tiffin_name']))
    {
        if((($_POST['kothrud']) || ($_POST['karvenagar']) ||($_POST['swargate']) ||($_POST['deccan']) ||($_POST['jmroad']) ||($_POST['bavdhan']) ||($_POST['lawcollegeroad']) ||($_POST['warje'])))
        {
            $tiffin_name = $_POST['tiffin_name'];
            $nonveg = 0;
            $kothrud = 0;
            $karvenagar = 0;
            $swargate = 0;
            $deccan = 0;
            $jmroad = 0;
            $bavdhan = 0;
            $lawcollegeroad = 0;
            $warje = 0;
            if(!empty($tiffin_name))
            {
                if(isset($_POST['non_veg']))
                {
                    $nonveg = 1;
                }
                if(isset($_POST['kothrud']))
                   {
                       $kothrud = 1;
                   }
                if(isset($_POST['karvenagar']))
                {
                    $karvenagar = 1;
                }
                if(isset($_POST['swargate']))
                {
                    $swargate = 1;
                }
                if(isset($_POST['deccan']))
                {
                    $deccan = 1;
                }
                if(isset($_POST['jmroad']))
                {
                    $jmroad = 1;
                }
                if(isset($_POST['bavdhan']))
                {
                    $bavdhan = 1;
                }
                if(isset($_POST['lawcollegeroad']))
                {
                    $lawcollegeroad = 1;
                }
                if(isset($_POST['warje']))
                {
                    $warje = 1;
                }
                $query1 = "INSERT INTO `delivery` VALUES('$user_id','$kothrud','$karvenagar','$swargate','$deccan','$jmroad','$bavdhan','$lawcollegeroad','$warje')";
                $query2 = "UPDATE `provider_data` SET `tiffin_name` = '$tiffin_name',`non-veg`='$nonveg' WHERE `id`='$user_id'";
                if($query_run1 = mysqli_query($db, $query1) && $query_run2 = mysqli_query($db, $query2))
                {
                    header('Location: login_provider.php');
                }
                else
                {
                    showMessage("Could not register at this moment!!");
                }
            }
                
            else
            {
                showMessage("Please enter Tiffin Name!!");
            }
        }
        else
        {
            showMessage("Select at least one area to deliver!!");
        }
    }
?>
<html>
    <style>
        
        
        h2
        {
            font-weight: bold;
            text-align: center;
            font-size: 40px;
        }
        h3
        {
            font-weight: bold;
            text-align: center;
            font-size: 30px;
        }
        h1
        {
            text-align: center;
            font-weight: bold;
            text-align: center; 
            font-size: 40px;
        }
        table
        {
            font-size: 30px;
            margin-left: -200px;
        }
        tr
        {
            padding-bottom: 30px;
        }
        .hh
        {
           padding-bottom: 30px;
           padding-right: 200px;
        }
        .hh1
        {
           padding-bottom: 30px;
           
        }
        .login
        {
            font-size: 50px;
            text-decoration: underline;
        }
        input.button
        {
            font-size: 30px;
            font-weight: bold;
            background-color: black;
            color: white;
        }
        .head1
        {
            padding-left: 380px;
        }
    </style>
    <body>
        <form action ="registration_page_provider2.php"  method ="POST">
            <div class="background" align="center">
                <div class="transbox" align="center">
                    <h1><u>Registration Provider</u></h1><br>
                    <h2>Other Details</h2>
                    <table align="center">
                        <tr>
                            <td class="hh1">
                                Tiffin Name: <input type="text" name="tiffin_name" value="">
                            </td>
                        </tr>
                        <tr>
                            <td class="hh">
                                 Non-veg <input type="checkbox" name="non_veg">
                            </td>
                        </tr>
                        <tr>
                            <td class="head1">
                            <h2>Delivery Details</h2>
                            </td>
                        </tr>
                        <tr>
                            <td class="head1">
                                <h3>Where would you like to deliver your tiffin?</h3>
                            </td>
                        </tr>
                        <br>                       
                        <tr>
                            <td class="hh">
                                 Kothrud <input type="checkbox" name="kothrud">
                            </td>
                            <td class="hh">
                                Karve Nagar <input type="checkbox" name="karvenagar">
                            </td>
                          
                        </tr>            
                        <tr>
                            <td class="hh">
                                Swargate <input type="checkbox" name="swargate">
                            </td>
                            <td class="hh">
                                Deccan <input type="checkbox" name="deccan">
                            </td>
                           
                        </tr>            
                        <tr>
                            <td class="hh">
                                J M Road <input type="checkbox" name="jmroad">
                            </td>
                            <td class="hh">
                                Bavdhan <input type="checkbox" name="bavdhan">
                            </td>
                          
                        </tr>            
                        <tr>
                            <td class="hh">
                                Law College Road <input type="checkbox" name="lawcollegeroad">
                            </td>
                            <td class="hh">
                                Warje <input type="checkbox" name="warje">
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="hh">
                                <input class="button" type="submit" value="Back">
                            </td>
                            <td class="hh">
                                <input class="button" type="submit" value="Register">
                            </td>
                          
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </body>
</html>>
            
            

