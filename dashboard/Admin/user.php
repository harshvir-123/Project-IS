<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Users</h2>
                        <a href="http://localhost/phpmyadmin/index.php?route=/sql&db=admin&table=users&pos=0" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>id</td>
                                <td>Firstname</td>
                                <td>Lastname</td>
                                <td>Email</td>
                                <td>Status</td>
                                <td>Add</td>
                                <td>Delete</td>
                            </tr>
                        </thead>

                        <tbody>
                     <!--------><?php
                //a php block
                //echo  "wad";
                //db connecntiom
                require_once('config/db.php');
                //2. select the query
                $sql = "SELECT * FROM users";
                //3.execute the query
                $result = $conn->query($sql);
                //4. check if there are any resutls
                if($result->num_rows > 0):
                    //4.1 show the data
                //[
                // ['id'=>1, 'name'=>'John']
                 // ['id'=>2, 'name'=>'kohn']
                  // ['id'=>3, 'name'=>'cohn']
                  while($row = $result->fetch_assoc()):
                    //4.2 assign the data to variables
                    $id = $row['id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    $status = $row['status'];
                    //4.3 create the html
                    echo "<tr>";
                    //id
                    echo "<td>$id</td>";
                    //photo
                   
                    //name
                    echo "<td>$first_name</td>";
                    echo "<td>$last_name</td>";
                    //email
                    echo "<td>$email</td>";
                    echo "<td>$status</td>";
                    echo " <td><a href='http://localhost/phpmyadmin/index.php?route=/sql&db=admin&table=users&pos=0&id=$id'>Edit</a></td>";
                    echo "<td><a href='http://localhost/phpmyadmin/index.php?route=/sql&db=admin&table=users&pos=0&id=$id' class= 'btn' >Delete</a></td>";

                   
                    
                   





                  endwhile;
                
                
                //]



                else:

                echo ' ';

                endif;

                   



               ?>
                        </tbody>
                    </table>
                </div>
</body>
</html>