<?php
    include 'header.inc.php';
 
    require './connect.inc.php';
    require './config.inc.php';
    if( isset($_GET['first_name']) && isset($_GET['last_name']) && isset($_GET['email']) && isset($_GET['mobile_no']) && isset($_GET['password']) && isset($_GET['password_again']) && isset($_GET['address']) && isset($_GET['locality']))
    {
        $firstname = $_GET['first_name'];
        $lastname = $_GET['last_name'];
        $email = $_GET['email'];
        $password_register_user = $_GET['password'];
        $password_again = $_GET['password_again'];
        $address = $_GET['address'];
        $mobile = $_GET['mobile_no'];
        $locality_final = $_GET['locality'];
        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($mobile) && !empty($password_register_user) && !empty($password_again) && !empty($address) && !empty($locality_final) && ($locality_final!="nothing"))
        {
            if(($password_register_user == $password_again))
            {
                if((strlen($mobile)==10))
                {
                    if(mysqli_num_rows(mysqli_query($db,"SELECT * FROM `user_data` WHERE `email` = '$email';"))==0)
                    {
                        $md_pass = md5($password_register_user);
                        $query = "INSERT INTO `user_data` VALUES (NULL,'$firstname','$lastname','$email','$md_pass','$address','$locality','$mobile')";
                        if($query_run = mysqli_query($db, $query))
                        {
                            showMessage("You have been successfully registered!!");
                            header('Location: login_user.php');
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
                    $password_register_user=NULL;
                    $password_again=NULL;
                    $locality=NULL;
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
    <head>
        <style>
            
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
            table
            {
                font-size: 30px;
                font-weight: bold;
            }
            tr
            {
                height: 70px;
            }
            
            td
            {
                width: 300px;
            }
            input.button
            {
                font-size: 30px;
                font-weight: bold;
                background-color: black;
                color: white;
            }
        </style>
    </head>
    <body>
        <form action ="registration_page_user.php"  method ="GET">
            
            <div class="background" align="center">
                
                <div class="transbox" align="center">
                    <h1><u>User Registration</u></h1>
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
                                Delivery Address:
                            </td>
                            <td>
                                <input type="text" rows="6" cols="30" name="address" value="<?php echo $address?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Locality:
                            </td>
                            <td>
                                <select name="locality">
                                    <option value="nothing">---</option>
                                    <option value="kothrud">Kothrud</option>
                                    <option value="karvenagar">Karve Nagar</option>
                                    <option value="swargate">Swargate</option>
                                    <option value="deccan">Deccan</option>
                                    <option value="jmroad">J M Road</option>
                                    <option value="bavdhan">Bavdhan</option>
                                    <option value="lawcollegeroad">Law College Road</option>
                                    <option value="warje">Warje</option>
                                </select>
                        
                            </td>
                        </tr>
                        <tr>
                            <td>

                                <input class="button" type="submit" value="Register">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </body>
</html>

