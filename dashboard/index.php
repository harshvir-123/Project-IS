<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="Admin/style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Dashboard Panel</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="assets/_.jpeg" alt="">
            </div>
            <span class="logo_name">Mental health</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="content.html">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Content</span>
                </a></li>
                <li><a href="analytics.html">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Like</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Comment</span>
                </a></li>
                <li><a href="../dashboard/Admin/index.php">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Admin</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>
                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total Likes</span>
                        <span class="number">50,120</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Comments</span>
                        <span class="number">20,120</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total Share</span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>
            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>
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
                            </tr>
                        </thead>

                        <tbody>
                     <!--------><?php
                //a php block
                //echo  "wad";
                //db connecntiom
                require_once('Admin/config/db.php');
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
                   
                    
                   





                  endwhile;
                
                
                //]



                else:

                echo ' ';

                endif;

                   



               ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>