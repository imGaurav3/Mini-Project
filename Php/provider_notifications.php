<?php
    require './connect.inc.php';
    require './config.inc.php';
    require './header2.inc.php';
    
    $provider_id = $_SESSION['views'];
    $query = "SELECT `user_id` FROM `notifications` WHERE `provider_id`=$provider_id AND `user_cancel`=1";
    $query_run = mysqli_query($db, $query);
    
    $i=0;
    if(($count = mysqli_num_rows($query_run))>=1)
    {
        $_SESSION['counts'] = $count;
        while($row = mysqli_fetch_assoc($query_run))
        {
            $ids[$i] = $row ['user_id'];
            $i++;
        }
    }
    $i = 0;
    foreach ($ids as $element)
    {
        $query1 = "SELECT * FROM `user_data` WHERE `id` = '$element'";
        
        if(($query_run1 = mysqli_query($db, $query1))==1)
        {
            $row1 = mysqli_fetch_assoc($query_run1);
            $firstname[$i] = $row1 ['firstname'];
            $lastname[$i] = $row1 ['lastname'];
            $address[$i] = $row1 ['address'];
            $i++;
        }

    }
    $ids[$i] = 0;
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
       width: 1300px;
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
        <form action="home_user.php" method="GET">
            <div class="background">
            <div class="transbox">
            <table>
                
                <tr>
                    <td>
                        <h3>
                            <?php 
                                $count = $_SESSION['counts'];
                                if($count>0)
                                {
                                    echo "<tr>";
                                    echo "<td><h1>Following Users have cancelled Today's Tiffin :</h1></td>";
                                    echo "</tr>" ;
                                    $i = 0;
                                    while ($ids[$i]!=0)
                                    {
                                        
                                        echo '<tr><td><br><br><hr width=\"300%\"></td></tr>';
                                        echo "<tr>";
                                        echo "<td><h3>Name : ".$firstname[$i]." ".$lastname[$i]."</h3></td>";
                                        echo "</tr>" ;
                                        echo "<tr>";
                                        echo "<td><h3>Address : ".$address[$i]."</h3></td>";
                                        echo "</tr>" ;
                                        
                                        $i++;
                                    }
                                    echo '<tr><td><hr width=\"300%\"></td></tr>';
                                    $i=0;
                                }
                                else if($count == 0)
                                {
                                    echo '<h1>No Notifications to show !!!</h1>';
                                }
                            ?>
                        </h3>
                    </td>
                </tr>
                
                
            </table>
            </div>
            </div>
        </form>

    </body>
    </html>