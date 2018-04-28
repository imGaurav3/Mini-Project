<?php
    include 'header_user.inc.php';
    require './config.inc.php';
    require './connect.inc.php';
    $user_id_login = $_SESSION['user_id1'];
    $i = 0;
    $count = -1;
    $query = "SELECT `firstname` FROM `user_data` WHERE `id` = '$user_id_login'";
    $query_run = mysqli_query($db, $query);
    if(mysqli_num_rows($query_run)==1)
    {
        $row = mysqli_fetch_assoc($query_run);
        $firstname = $row ['firstname'];
    }
    if(isset($_GET['search']))
    {
        if($locality_final = ($_GET['locality']))
        {
            if(!empty($locality_final) && ($locality_final!="nothing"))
            {
                $query = "SELECT `id` FROM `delivery` WHERE `$locality_final` = 1";
                $query_run = mysqli_query($db, $query);
                if(($count = mysqli_num_rows($query_run))>=1)
                {
                    $_SESSION['counts'] = $count;
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                        $ids[$i] = $row ['id'];
                        $i++;
                    }
                    $i = 0;
                    foreach ($ids as $element)
                    {
                        $query1 = "SELECT * FROM `provider_data` WHERE `id` = '$element'";
                        $query2 = "SELECT * FROM `full_meal` WHERE `id` = '$element'";
                        $query3 = "SELECT * FROM `half_meal` WHERE `id` = '$element'";
                        if(($query_run1 = mysqli_query($db, $query1)) && ($query_run2 = mysqli_query($db, $query2)) && ($query_run3 = mysqli_query($db, $query3)))
                        {
                            $row1 = mysqli_fetch_assoc($query_run1);
                            $row2 = mysqli_fetch_assoc($query_run2);
                            $row3 = mysqli_fetch_assoc($query_run3);
                            $tiffin_name[$i] = $row1 ['tiffin_name'];
                            $nonveg[$i] = $row1 ['non-veg'];
                            if($nonveg[$i]==0)
                            {
                                $nonveg[$i]='Only Veg';
                            }
                            else
                            {
                                $nonveg[$i]='Veg and Non-Veg';
                            }
                            $full_2time[$i] = $row2 ['full_price'];
                            $full_1time[$i] = $row2 ['half_price'];
                            $half_2time[$i] = $row3 ['full_price'];
                            $half_1time[$i] = $row3 ['half_price'];  
                            $i++;
                        }

                    }
                }
                $ids[$i] = 0;

            }
            else
            {
                showMessage("Please select a locality first");

            }
        }
    }
?>
<html>
    <head>
        <style>
            
            .home
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
                font-size: 20px;
                margin-right: -200px;
            }

            tr
            {
                height: 10px;
            }

            td
            {
                width: 800px;
            }
            .textbox
            {
                font-size: 25px;
            }
            .button
            {
                background-color: black;
                font-size: 30px;
                color: white;
                border-radius: 7px;
                margin-left: -160px;
            }
            .delivery
            {
                padding-left: 250px;
                padding-top: 15px;
            }
            a
            {
                font-size: 30px;
            } 
            h4
            {
                font-size: 20px;
            }
            tr.bordered
            {
                border-bottom: 1px solid black;
            }
            select,option
            {
                font-size: 25px;
            }
        </style>
    </head>
    <body>
        <form action="home_user.php" method="GET">
            <div class="background">
            <div class="transbox">
            <table>
                <tr>
                    <td>
                        <h1>Welcome <?php
                                        echo $firstname;
                                        $last_page = $_SERVER['HTTP_REFERER'];
                                        if($last_page == "http://localhost:8000/searched_tiffin_details.php")
                                        {
                                            $provider_id = $_SESSION['providerid'];
                                            $query1 = "INSERT INTO `notifications` VALUES('$user_id_login','$provider_id',0,0)";
                                            $query_run1 = mysqli_query($db, $query1);
                                            $query = "SELECT `tiffin_name` FROM `provider_data` WHERE `id` = '$provider_id'";
                                            $query_run = mysqli_query($db, $query);
                                            $row1 = mysqli_fetch_assoc($query_run);
                                            $tiffin_name = $row1 ['tiffin_name'];
                                            showMessage("You have successfully joined ".$tiffin_name."!");
                                        }
                                    ?>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td class="delivery"><h2>Delivery Location</h2></td>
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
                    <td>
                        <input class="button" type="submit" name="search" value="Search">
                       
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>
                            <?php if($count>0)
                                {
                                    echo $count." Results Found for ".strtoupper($locality_final)." !!!" ;
                                    
                                }
                                else if($count == 0)
                                    {
                                        echo 'No results found';
                                        
                                    }
                            ?>
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td> <hr width="300%"></td>
                </tr>
                <?php
                    $i = 0;
                    while ($ids[$i]!=0)
                    {
                        $_SESSION['view'.$i] = $ids[$i];
                        echo "<tr></tr><tr></tr><tr></tr>";
                        echo '<td><h3><a href="?link='.$i.'"name="link'.$i.'">'.$tiffin_name[$i].'</a>';
                        echo "<td><h4>".$nonveg[$i]."</h4></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><h3>One-Time Tiffin</h3></td>";
                        echo "<td><h3>Two-Time Tiffin</h3></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><h3>Full-meal Price: ".$full_1time[$i]."</h3></td>";
                        echo "<td><h3>Full-meal Price: ".$full_2time[$i]."</h3></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><h3>Half-meal Price: ".$half_1time[$i]."</h3><br><hr width=\"300%\"></td>";
                        echo "<td><h3>Half-meal Price: ".$half_2time[$i]."</h3></td>";
                        echo "</tr>";
                        echo "<br>";
                        
                        $i++;
                    }
                    $i=0;
                    if(isset($_GET['link']))
                    {
                        $count = $_SESSION['counts'];
                        while($count>0)
                        {
                            $ids[$i] = $_SESSION['view'.$i];
                            $i++;
                            $count--;
                        }
                        $i = 0;
                        $link = $_GET['link'];
                        while ($ids[$i]!=0)
                        {
                            echo $ids[$i];
                            if($link==$i)
                            {
                                $_SESSION['search']=$ids[$i];
                                header('Location: searched_tiffin_details.php');
                                break;
                            }
                            $i++;
                        }
                    }
                   
                ?>
            </table>
            </div>
            </div>
        </form>
    </body>
</html>



