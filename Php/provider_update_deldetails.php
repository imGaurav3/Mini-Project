<?php
    require './table_data.inc.php';
    
    if(isset($_POST['update']))
    {
        $kothrud1 = 0;
        $karvenagar1 = 0;
        $swargate1 = 0;
        $deccan1 = 0;
        $jmroad1 = 0;
        $bavdhan1 = 0;
        $lawcollegeroad1 = 0;
        $warje1 = 0;

        if(isset($_POST['kothrud']))
        {
               $kothrud1 = 1;
               $kothrud = 'Yes';
        }
        else
        {
            $kothrud = 'No';
        }
        if(isset($_POST['karvenagar']))
        {
            $karvenagar1 = 1;
            $karvenagar = 'Yes';
        }
        else
        {
            $karvenagar = 'No';
        }
        if(isset($_POST['swargate']))
        {
            $swargate1 = 1;
            $swargate = 'Yes';
        }
        else
        {
            $swargate = 'No';
        }
        if(isset($_POST['deccan']))
        {
            $deccan1 = 1;
            $deccan = 'Yes';
        }
        else
        {
            $deccan = 'No';
        }
        if(isset($_POST['jmroad']))
        {
            $jmroad1 = 1;
            $jmroad = 'Yes';
        }
        else
        {
            $jmroad = 'No';
        }
        if(isset($_POST['bavdhan']))
        {
            $bavdhan1 = 1;
            $bavdhan = 'Yes';
        }
        else
        {
            $bavdhan = 'No';
        }
        if(isset($_POST['lawcollegeroad']))
        {
            $lawcollegeroad1 = 1;
            $lawcollegeroad = 'Yes';
        }
        else
        {
            $lawcollegeroad = 'No';
        }
        if(isset($_POST['warje']))
        {
            $warje1 = 1;
            $warje = 'Yes';
        }
        else
        {
            $warje = 'No';
        }
        $query = "UPDATE `delivery` SET `kothrud`='$kothrud1',`karvenagar`='$karvenagar1',`swargate`='$swargate1',`deccan`='$deccan1',`jmroad`='$jmroad1',`bavdhan`='$bavdhan1',`lawcollegeroad`='$lawcollegeroad1',`warje`='$warje1' WHERE `id`='$user_id_login'";
        if($query_run = mysqli_query($db, $query))
        {
            showMessage("Details updated!!!");
        }
    }   
?>

<html>
    <head>
        <style>
            .edit
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
                margin-left: 40px;
                margin-top: 15px;
                font-weight: bold;
                font-size: 40px;
            }
            .button
            {
                font-size: 30px;
                background-color: black;
                color: white;
            }
            
            h2
            {
                font-weight: bold;
                font-size: 40px;
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
                width: 500px;
            }
            
            .full_salad,.full_sweet,.half_salad,.half_sweet
            {
                size: 25px;
            }
        </style>
    </head>
    <body>
        
        <form action="provider_update_deldetails.php" method="POST"> 
            <br>
       <div class="background">
        <div class="transbox">
            <h1>Edit your delivery details here</h1>
            <table align="center">
                <tr>
                    <td>
                        <h3><input type="checkbox" name="kothrud" <?php if($kothrud=="Yes"){echo 'checked';}?>> Kothrud</h3>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <h3><input type="checkbox" name="karvenagar" <?php if($karvenagar=="Yes"){echo 'checked';}?>> Karvenagar</h3>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h3><input type="checkbox" name="swargate" <?php if($swargate=="Yes"){echo 'checked';}?>> Swargate</h3>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <h3><input type="checkbox" name="deccan" <?php if($deccan=="Yes"){echo 'checked';}?>> Deccan</h3>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h3><input type="checkbox" name="jmroad" <?php if($jmroad=="Yes"){echo 'checked';}?>> J M Road</h3>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <h3><input type="checkbox" name="bavdhan" <?php if($bavdhan=="Yes"){echo 'checked';}?>> Bavdhan</h3>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h3><input type="checkbox" name="lawcollegeroad" <?php if($lawcollegeroad=="Yes"){echo 'checked';}?>> Law College Road</h3>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <h3><input type="checkbox" name="warje" <?php if($warje=="Yes"){echo 'checked';}?>> Warje</h3>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="button" type="submit" name="update" value="Update">
                    </td>
                </tr>
            </table>
        </div>
       </div> 
    </form>  
    </body>
</html>
