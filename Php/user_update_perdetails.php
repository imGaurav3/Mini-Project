<?php
    require './header_user.inc.php';
    require './config.user.inc.php';
    require './connect.inc.php';
    
    $user_id_login = $_SESSION['id'];
    
    $query = "SELECT * FROM `user_data` WHERE `id` = $user_id_login";
    
    $query_run = mysqli_query($db, $query);
    
    $row1 = mysqli_fetch_assoc($query_run);
    
    $firstname = $row1 ['firstname'];
    $lastname = $row1 ['lastname'];
    $email = $row1 ['email'];
    $address = $row1 ['address'];
    $mobile = $row1 ['mobile'];
    $locality = $row1 ['locality'];
    $password = $row1 ['password'];
    if(isset($_POST['update']))
    {
        mysqli_autocommit($db, FALSE);
        mysqli_begin_transaction();
        if( isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['mobile_no'])  && isset($_POST['address']) && isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['new_password_again']) && isset($_POST['locality']))
        {
            $query_run1 = TRUE;
            $query_run2 = TRUE;
            $query_run3 = TRUE;
            $query_run4 = TRUE;
            $query_run5 = TRUE;
            $query_run6 = TRUE;
            $query_run7 = TRUE;

            if($firstname!=$_POST['first_name'])
            {
                $firstname = $_POST['first_name'];
                $query1 = "UPDATE `user_data` SET `firstname`='$firstname' WHERE `id`=$user_id_login";
                $query_run1 = mysqli_query($db, $query1);
            }

            if($lastname!=$_POST['last_name'])
            {
                $lastname=$_POST['last_name'];
                $query2 = "UPDATE `user_data` SET `lastname`='$lastname' WHERE `id`=$user_id_login";
                $query_run2 = mysqli_query($db, $query2);
            }

            if($email!=$_POST['email'])
            {
                $email=$_POST['email'];
                $query3 = "UPDATE `user_data` SET `email`='$email' WHERE `id`=$user_id_login";
                $query_run3 = mysqli_query($db, $query3);
            }

            if($mobile!=$_POST['mobile_no'])
            {
                $mobile=$_POST['mobile_no'];
                $query4 = "UPDATE `user_data` SET `mobile`='$mobile' WHERE `id`=$user_id_login";
                $query_run4 = mysqli_query($db, $query4);
            }

            if($address!=$_POST['address'])
            {
                $address=$_POST['address'];
                $query5 = "UPDATE `user_data` SET `address`='$address' WHERE `id`=$user_id_login";
                $query_run5 = mysqli_query($db, $query5);
            }
            $old_password=$_POST['old_password'];
            $new_password=$_POST['new_password'];
            $new_password_again=$_POST['new_password_again'];
            if(!empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['new_password_again']))
            {
                $password_md5 = md5($old_password);
                if($password_md5 == $password)
                {
                    if($new_password == $new_password_again)
                    {
                        $new_password_md5 = md5($new_password);
                        $query6 = "UPDATE `user_data` SET `password`='$new_password_md5' WHERE `id`=$user_id_login";
                        $query_run6 = mysqli_query($db, $query6);
                    }
                    else
                    {
                        showMessage("New passwords do not match!!");
                        $query_run6 = FALSE;
                    }
                }
                else
                {
                    showMessage("Your old password is incorrect!!");
                    $query_run6 = FALSE;
                }
            }
            if($locality!=$_POST['locality'])
            {
                $locality=$_POST['locality'];
                $query7 = "UPDATE `user_data` SET `locality`='$locality' WHERE `id`=$user_id_login";
                $query_run7 = mysqli_query($db, $query7);
            }
            if($query_run1 && $query_run2 && $query_run3 && $query_run4 && $query_run5 && $query_run6 && $query_run7)
            {
                mysqli_commit($db);
                showMessage("Data is Updated!!");
            }
            else
            {
                mysqli_rollback($db);
                showMessage("Could not update data!!");
            }
        }
    }
?>
<html>
    <style>
    .personal_details
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
    h2
    {
        font-weight: bold;
        text-align: center;
        font-size: 30px;
    }
    a
    {
        color: black;
    }
    h1
    {
        margin-left: 40px;
        margin-top: 15px;
        font-weight: bold;
        font-size: 40px;
    }
    table
    {
        font-size: 30px;
    }
    textarea
    {
        font-size: 18px;
    }
    tr,td
    {
        padding-bottom: 30px;
    }

    input.button
    {
        font-size: 30px;
        font-weight: bold;
        background-color: black;
        color: white;
    }
    
</style>
<body>
    <form action="user_update_perdetails.php" method="POST">
        <div class="background">
        <div class="transbox">
        <table align = "center">
            <tr>
            <h1><u>Edit your Personal Details here - </u></h1>
            </tr>
            <tr>
                <td>
                    First Name:
                </td>
                <td>
                    <input type = "text" name = "first_name" value="<?php echo $firstname?>" maxlength="20">
                </td>
            </tr>
            <tr>
                <td>
                    Last Name:
                </td>
                <td>
                    <input type="text" name="last_name" value="<?php echo $lastname?>" maxlength="20"> 
                </td>
            </tr>
            <tr>
                <td>
                    Email-id:
                </td>
                <td>
                    <input type="email" name="email" value="<?php echo $email?>" maxlength="50">  
                </td>
            </tr>
            <tr>
                <td>
                    Mobile No:
                </td>
                <td>
                    <input type="tel" name="mobile_no" value="<?php echo $mobile?>" maxlength="10">
                </td>
            </tr>
            <tr>
                <td>
                    Old Password:
                </td>
                <td>
                   <input type="password" name="old_password" placeholder="old password" maxlength="20" minlength="8">
                </td>
            </tr>
            <tr>
                <td>
                    New Password :
                </td>
                <td>
                    <input type="password" name="new_password" placeholder="new password" maxlength="20" minlength="8">        
                </td>
            </tr>
            <tr>
                <td>
                    New Password again :
                </td>
                <td>
                    <input type="password" name="new_password_again" placeholder="new password again" maxlength="20" minlength="8">        
                </td>
            </tr>
            <tr>
                <td>
                    Address:
                </td>
                <td>
                    <textarea rows="3" cols="21" name="address"><?php echo $address?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Locality:
                </td>
                <td>
                    <input type="text" name="locality" value="<?php echo $locality?>" placeholder="please specify area" maxlength="30">
                </td>
            </tr>
            <tr>
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