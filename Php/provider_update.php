<?php
    include 'header2.inc.php';
    require './config.inc.php';
    require './connect.inc.php';
?>
<?php
    if(isset($_POST['proceed']))
    {
        header('Location: provider_update2.php');
    }
?>
<html>
    <head>
        <style>
            select
            {
                background-color: black;
                color: white;
                font-size: 20px;
            }
            textarea
            {
                font-size: 20px;
            }
            h1,h2,h3
            {
                font-weight: bold;
            }
            .button
            {
                font-size: 30px;
                background-color: black;
                color: white;
            }
        </style>
    </head>
    
    <body>
        <form action="provider_update.php" method="POST">
            <br><br><br>
            <h1>
                <u>What type of Food do you server?   </u>
                <select>
                    <option value="Konkani">Konkani</option>
                    <option value="Nagpuri">Nagpuri</option>
                    <option value="Punjabi">Punjabi</option>
                    <option value="South Indian">South Indian</option>
                    <option value="Gujarati">Gujarati</option>
                    <option value="North Indian">North Indian</option>
                </select>
            </h1>

            <br>

            <h1>
                <u>What's on your Menu?</u>
            </h1>
            <br><br>
            <h2>Categories: </h2>

            <table>

                <tr>
                    <td width="300">
                        <h3>Roti:</h3>  
                    </td>
                    <td width="300">
                        <h3>Sabji:</h3>
                    </td>
                    <td width="300">
                        <h3>Dal:</h3>
                    </td>
                    <td width="300">
                        <h3>Rice:</h3>
                    </td>
                    <td width="300">
                        <h3>Desserts:</h3>
                    </td>
                </tr>

                <tr>
                    <td width="300">
                        <textarea rows="15" cols="20" name="roti"></textarea>
                    </td>
                    <td width="300">
                        <textarea rows="15" cols="20" name="sabji"></textarea>
                    </td>
                    <td width="300">
                        <textarea rows="15" cols="20" name="dal"></textarea>
                    </td>
                    <td width="300">
                        <textarea rows="15" cols="20" name="rice"></textarea>
                    </td>
                    <td width="300">
                        <textarea rows="15" cols="20" name="desserts"></textarea>
                    </td>
                </tr>
            </table>

            <br><br><br>

            <input class="button" type="submit" name="proceed" value="Proceed">
        </form>
    </body>
</html>

