<?php
    include 'header_user.inc.php';
    require './config.inc.php';
    require './connect.inc.php';
    $provider_id = $_SESSION['search'];
    $user_id_login = $_SESSION['id'];
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
    body
    {
        background-image: url("t3.jpeg");

        background-attachment: fixed;
        height: 100%;
        background-position: center;
        background-size: cover;
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
        margin-left: -300px;
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
        font-size: 30px;
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

</style>
    <body>
        <form action="user_final_join.php" method="POST">
        <div class="background">
        <div class="transbox">
        <table align = "center">
            <tr>
                <td>
                    <h1>Plan your tiffin - </h1>
                </td>
            </tr> 
            <tr>
                <td>
                    <input type="radio" id="r-1" name="radio-1"><label for="r-1">2 Time Tiffin</label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="radio" id="r-2" name="radio-1"><label for="r-2">1 Time Tiffin</label>
                
                <div class="radio-2">
                
                    <input type="radio" id="r-3" name="radio-2"><label for="r-3">Lunch</label>
               
                    <input type="radio" id="r-4" name="radio-2"><label for="r-4">Dinner</label>
                
                </div>
                </td>
            </tr>
                    
                    
                      
                      
                    
            <tr>
            <td>
                <input class="button" type="submit" value="Join" name="join">
            </td>
        </table>
        </div>
        </div>
        </form>
    </body>
</html>