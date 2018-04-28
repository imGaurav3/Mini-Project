<?php
    include 'header.inc.php';
    require 'connect.inc.php';
    require './config.inc.php';
    $previous_page = $_SERVER['HTTP_REFERER'];
    
    if( isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['mobile_no']) && isset($_POST['password']) && isset($_POST['password_again']) && isset($_POST['address']))
    {
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $email = $_POST['email'];
        $password_register_provider = $_POST['password'];
        $password_again = $_POST['password_again'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile_no'];
        
        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($mobile) && !empty($password_register_provider) && !empty($password_again) && !empty($address))
        {
            if(($password_register_provider == $password_again))                  
            {   
                if((strlen($mobile)==10))
                {
                    if(mysqli_num_rows(mysqli_query($db,"SELECT * FROM `provider_data` WHERE `email` = '$email';"))==0)
                    {
                        $md_pass = md5($password_register_provider);
                        if($previous_page == 'http://localhost:8000/registration_page_provider2.php')
                        {
                            $query = "UPDATE `provider_data` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$md_pass',`address`='$address',`mobile`='$mobile')";
                        }
                        else
                        {
                            $query = "INSERT INTO `provider_data` VALUES(NULL,'$firstname','$lastname','$email','$md_pass','$address','$mobile','tiffin',0)";
                        }
                        if($query_run = mysqli_query($db, $query))
                        {
                            $_SESSION['views']=$email;
                            header('Location: registration_page_provider2.php');
                        }
                        else
                        {
                            showMessage("You cannot be registered at the moment.Please try again later!!");
                        }
                    }
                    else
                    {
                        showMessage("Email-id already exists!!");
                    }
                    $firstname=NULL;
                    $lastname=NULL;
                    $email=NULL;
                    $password_register_provider=NULL;
                    $password_again=NULL;
                    $address=NULL;
                    $mobile=0;
                }
                else
                {
                    showMessage("Mobile no should be 10 digit long!!");
                }
            }
            else 
            {
                showMessage("Passwords do not match!!");
            }
        }
        else
        {
            showMessage("All fields are compulsory!!");
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
        h1
        {
            font-weight: bold;
            text-align: center;
            font-size: 50px;
        }
        table
        {
            font-size: 30px;
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
        .login
        {
            font-size: 50px;
            text-decoration: underline;
        }
        input
        {
            background-color: mintcream;
        }
        textArea
        {
            background-color: mintcream;
        }
    </style>
    <body>
        
        <form action ="registration_page_provider.php"  method ="POST">
            <br>
            <div class="background" align="center">
                <div class="transbox" align="center">
                    <h1><u>Registration Provider</u></h1>
                    <h2>Personal Details</h2>
                    <br>
                    <table align="center">
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
                            Password:
                        </td>
                        <td>
                           <input type="password" name="password" placeholder="password" maxlength="20" minlength="8"> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password again:
                        </td>
                        <td>
                            <input type="password" name="password_again" placeholder="password" maxlength="20" minlength="8">        
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Address:
                        </td>
                        <td>
                            <textarea rows="4" cols="32" name="address" ><?php echo $address?></textarea>
                       </td>
                    </tr>
                    <tr>
                        <td>

                            <input class="button" type="submit" value="Proceed">
                        </td>
                    </tr>
                    </table>
                </div>
            </div>
        </form>
    </body>
</html>

