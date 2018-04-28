<?php
    require './table_data.inc.php';
    $user_id_login = $_SESSION['views'];
    if(isset($_POST['full_1time']) && isset($_POST['half_1time']) && isset($_POST['full_2time']) && isset($_POST['half_2time']) && isset($_POST['full_roti']) && isset($_POST['half_roti']) && isset($_POST['full_sabji']) && isset($_POST['half_sabji']))
    {
        $full_1time = $_POST['full_1time'];
        $half_1time = $_POST['half_1time'];
        $full_2time = $_POST['full_2time'];
        $half_2time = $_POST['half_2time'];
        $full_roti = $_POST['full_roti'];
        $half_roti = $_POST['half_roti'];
        $full_sabji = $_POST['full_sabji'];
        $half_sabji = $_POST['half_sabji'];
        $full_rice = 0;
        $half_rice = 0;
        $full_salad = 0;
        $half_salad = 0;
        $full_sweet = 0;
        $half_sweet = 0;
        if(!empty($full_1time) && !empty($half_1time) && !empty($full_2time) && !empty($half_2time) && !empty($full_roti) && !empty($half_roti) && !empty($full_sabji) && !empty($half_sabji))
        {
          if(isset($_POST['full_rice']))
           {
               $full_rice = 1;
           }
           if(isset($_POST['half_rice']))
           {
               $half_rice = 1;
           }
           if(isset($_POST['full_salad']))
           {
               $full_salad = 1;
           }
           if(isset($_POST['half_salad']))
           {
               $half_salad = 1;
           }
           if(isset($_POST['full_sweet']))
           {
               $full_sweet = 1;
           }
           if(isset($_POST['half_sweet']))
           {
               $half_sweet = 1;
           }
           $query = "SELECT `id` FROM `full_meal` WHERE `id`=$user_id_login";
           $query_run = mysqli_query($db, $query);
           if(mysqli_num_rows($query_run) == 1)
           {
               $flag = 0;
               $query1 = "UPDATE `full_meal` SET `full_price`='$full_2time',`half_price`='$full_1time',`no_roti`='$full_roti',`no_sabji`='$full_sabji',`rice`='$full_rice',`salad`='$full_salad',`sweet`='$full_sweet' WHERE `id`=$user_id_login";
               $query2 = "UPDATE `half_meal` SET `full_price`='$half_2time',`half_price`='$half_1time',`no_roti`='$half_roti',`no_sabji`='$half_sabji',`rice`='$half_rice',`salad`='$half_salad',`sweet`='$half_sweet' WHERE `id`=$user_id_login";
           }
           else
           {
               $flag = 1;
               $query1 = "INSERT INTO `full_meal` VALUES('$user_id_login','$full_2time','$full_1time','$full_roti','$full_sabji','$full_rice','$full_salad','$full_sweet')";
               $query2 = "INSERT INTO `half_meal` VALUES('$user_id_login','$half_2time','$half_1time','$half_roti','$half_sabji','$half_rice','$half_salad','$half_sweet')";
           }
           if($query_run1 = mysqli_query($db, $query1) && $query_run2 = mysqli_query($db, $query2))
           {
               if(!$flag)
                   showMessage ("Data Updated!!");
               else
                   showMessage ("Data Saved!!");
           }
           else
           {
               showMessage("Could not save at this moment!!");
           }
            $full_1time = NULL;
            $half_1time = NULL;
            $full_2time =NULL;
            $half_2time = NULL;
            $full_roti = NULL;
            $half_roti = NULL;
            $full_sabji = NULL;
            $half_sabji = NULL;
        }
        else
        {
            showMessage("All fields are compulsory!!");
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
                width: 40px;
            }
            
            .full_salad,.full_sweet,.half_salad,.half_sweet
            {
                size: 25px;
            }
        </style>
    </head>
    <body>
        <form action="provider_update_tiffindetails.php" method="POST"> 
            <br>
       <div class="background">
                <div class="transbox">
                    <h1>Edit your tiffin details here</h1>
            <table align="center">
                    <td>
                        <h2>Full Tiffin</h2>
                    </td>
                    <td>

                    </td>
                    <td></td>
                    <td>
                        <h2>Half Tiffin</h2>
                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>One-Time Price: </h3>
                    </td>
                    <td>
                        <input type="text" name="full_1time" value="<?php echo $full_1time?>">
                    </td>
                    <td></td>
                    <td>
                        <h3>One-Time Price:</h3>
                    </td>
                    <td>
                        <input type="text" name="half_1time" value="<?php echo $half_1time?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Two-Time Price: </h3>
                    </td>
                    <td>
                        <input type="text" name="full_2time" value="<?php echo $full_2time?>">
                    </td>
                    <td></td>
                    <td>
                        <h3>Two-Time Price: </h3>
                    </td>
                    <td>
                        <input type="text" name="half_2time" value="<?php echo $half_2time?>">
                    </td>
                </tr>

                <tr></tr>

                <tr>
                    <td>
                        <h3>No. of Roti:</h3>
                    </td>
                    <td>
                        <input type="number" name="full_roti" min="1" value="<?php echo $full_roti?>" >
                    </td>
                    <td></td>
                    <td>
                        <h3>No. of Roti:</h3>
                    </td>
                    <td>
                        <input type="number" name="half_roti" min="1" value="<?php echo $half_roti?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>No. of Sabji:</h3>
                    </td>
                    <td>
                        <input type="number" name="full_sabji" min="1" value="<?php echo $full_sabji?>">
                    </td>
                    <td></td>
                    <td>
                        <h3>No. of Sabji:</h3>
                    </td>
                    <td>
                        <input type="number" name="half_sabji" min="1" value="<?php echo $half_sabji?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Rice <input type="checkbox" name="full_rice" <?php if($full_rice=="Yes"){echo 'checked';}?>></h3>
                    </td>
                    <td>                        
                    </td>
                    <td></td>
                    <td>
                        <h3>Rice <input type="checkbox" name="half_rice" <?php if($half_rice=="Yes"){echo 'checked';}?>></h3>                        
                    </td>
                    <td>                        
                    </td>
                </tr>

                <tr></tr>

                <tr>
                    <td>
                        <h3>Accompainments:</h3>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <h3>Accompainments:</h3>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h3><input type="checkbox" name="full_salad" <?php if($full_salad=="Yes"){echo 'checked';}?>> Salad</h3>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <h3><input type="checkbox" name="half_salad" <?php if($half_salad=="Yes"){echo 'checked';}?>> Salad</h3>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h3><input type="checkbox" name="full_sweet" <?php if($full_sweet=="Yes"){echo 'checked';}?>> Sweet</h3>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <h3><input type="checkbox" name="half_sweet" <?php if($half_sweet=="Yes"){echo 'checked';}?>> Sweet</h3>
                    </td>
                    <td></td>
                </tr>

                <tr></tr>
                <tr></tr>

                <tr>
                    <td>
                        <input class="button" type="submit" name="proceed" value="Save">
                    </td>
                </tr>
            </table>
                </div>
            </div> 
        </form>  
    </body>
</html>


