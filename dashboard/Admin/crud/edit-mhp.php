<?php
session_start();

//access control
if (!isset($_SESSION['name'])) {
    //redirect them back to the login page
    header('Location:login.php?msg=login');
}else{
    //get the id of mhp
  
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    //sanitize the parameter
    //make sure it is a number
    $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
   // echo $id; 
    //db connection
    require_once 'php/db.php';
    //2. query 
    $sql = "SELECT * FROM mhp where id=$id";
    $result = $conn->query($sql);
    //4. check if there are any resutls
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $photo = $row['photo'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $occupation = $row['occupation'];
        $license_number = $row['license_number'];
        $experience = $row['experience'];
        $location = $row['location'];
        $records = $row['records'];
        //a,b,c,d
       $location_array = explode(',',$location); 
        $county = strtolower($location_array[2]);

        $county_value = explode(' ',$county)[0];
        $county_value;
        $county_value; 
        $town = $location_array[1];
        $house = $location_array[0];
   


    }else{
        header('location:manage-mhp.php');
    }

    }else{
        header('location:manage-mhp.php');
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit MHP - BrighterDays Admin Dashboard</title>
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="./assets/compiled/css/table-datatable-jquery.css">
    <link rel="stylesheet" href="./assets/compiled/css/app.css">
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css">
</head>

<body>
    <script src="assets/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html"><img src="./assets/images/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item ">
                            <a href="dashboard.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>


                        </li>

                        <li class="sidebar-item  active">
                            <a href="manage-mhp.php" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Edit MHP</span>
                            </a>


                        </li>



                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class='layout-navbar navbar-fixed'>
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">

                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?php echo ucwords($_SESSION['name']); ?></h6>
                                            <p class="mb-0 text-sm text-gray-600"><?php echo ucwords($_SESSION['role']); ?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="./assets/compiled/jpg/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?php echo $_SESSION['name']; ?>!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="php/logout.php"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Edit Mental Health Professionals</h3>
                            </div>

                        </div>
                    </div>
                    <section class="section">
                        <div class="card">

                            <div class="card-body">

                                <form class="form" action="php/process-edit-mhp.php" method="post" enctype="multipart/form-data">  
                                    <input type="hidden" value="<?=$id?>" name="id"/>
                                    <div class="row">


                                    
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Title">Title</label>
                                                <select name="name" required id="name" class="form-control">
                                                    <option value="1">DR</option>
                                                    <option value="2">mrs</option>
                                                    <option value="3">miss</option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name">Image</label>
                                                <img  style="width: 10%;"   src='<?=$photo?>'>
                                               <br>
                                                Upload profile  Picture?   
                                                <input   class="form-check-input"   type="checkbox" id="editPhoto" name='editPhoto'>
                                                <input type="file" accept="image/*"   ="name-column" class="form-control" placeholder="Photo" disabled  name="photo" id="photo">
                                            </div>
                                        </div>



                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                               
                                                <img  style="width: 10%;"   src='<?=$photo?>'>
                                               <br>
                                                Upload profile  Picture?   
                                                <input   class="form-check-input"   type="checkbox" id="editPhoto" name='editPhoto'>
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12"> 
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text"  value="<?=$name?>"  id="name-column" class="form-control" placeholder="Name" name="name" id="name required">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" value="<?=$email?>" id="email" class="form-control" placeholder="Email" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="phone-number">Phone number</label>
                                                <input type="text" value="<?=$license_number?>" id="Phone-number" class="form-control" name="phone" placeholder="Phone number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="occupation">Occupation</label>
                                                <input type="text" value="<?=$occupation?>" id="occupation" class="form-control" name="occupation" placeholder="Occupation" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="license">Licensce-number</label>
                                                <input type="text" value="<?=$license_number?>" id="license" class="form-control" name="license_number" placeholder="license">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="experience">Experience</label>
                                                <input type="number" value="<?=$experience?>" id="experience" class="form-control" name="experience" placeholder="Experience">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="location">County</label>
                                                <select id="county" value="<?=$county?>" name="county" class="form-control" required>
                                                    <option value="">Please click to select</option>
                                                    <option value="baringo">Baringo</option>
                                                    <option value="bomet">Bomet</option>
                                                    <option value="bungoma">Bungoma</option>
                                                    <option value="busia">Busia</option>
                                                    <option value="elgeyo marakwet">Elgeyo Marakwet</option>
                                                    <option value="embu">Embu</option>
                                                    <option value="garissa">Garissa</option>
                                                    <option value="homa bay">Homa Bay</option>
                                                    <option value="isiolo">Isiolo</option>
                                                    <option value="kajiado">Kajiado</option>
                                                    <option value="kakamega">Kakamega</option>
                                                    <option value="kericho">Kericho</option>
                                                    <option value="kiambu">Kiambu</option>
                                                    <option value="kilifi">Kilifi</option>
                                                    <option value="kirinyaga">Kirinyaga</option>
                                                    <option value="kisii">Kisii</option>
                                                    <option value="kisumu">Kisumu</option>
                                                    <option value="kitui">Kitui</option>
                                                    <option value="kwale">Kwale</option>
                                                    <option value="laikipia">Laikipia</option>
                                                    <option value="lamu">Lamu</option>
                                                    <option value="machakos">Machakos</option>
                                                    <option value="makueni">Makueni</option>
                                                    <option value="mandera">Mandera</option>
                                                    <option value="meru">Meru</option>
                                                    <option value="migori">Migori</option>
                                                    <option value="marsabit">Marsabit</option>
                                                    <option value="mombasa">Mombasa</option>
                                                    <option value="muranga">Muranga</option>
                                                    <option value="nairobi">Nairobi</option>
                                                    <option value="nakuru">Nakuru</option>
                                                    <option value="nandi">Nandi</option>
                                                    <option value="narok">Narok</option>
                                                    <option value="nyamira">Nyamira</option>
                                                    <option value="nyandarua">Nyandarua</option>
                                                    <option value="nyeri">Nyeri</option>
                                                    <option value="samburu">Samburu</option>
                                                    <option value="siaya">Siaya</option>
                                                    <option value="taita taveta">Taita Taveta</option>
                                                    <option value="tana river">Tana River</option>
                                                    <option value="tharaka nithi">Tharaka Nithi</option>
                                                    <option value="trans nzoia">Trans Nzoia</option>
                                                    <option value="turkana">Turkana</option>
                                                    <option value="uasin gishu">Uasin Gishu</option>
                                                    <option value="vihiga">Vihiga</option>
                                                    <option value="wajir">Wajir</option>
                                                    <option value="pokot">West Pokot</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="experience">Town</label>
                                                <input type="text" value="<?=$town?>" id="town" class="form-control" name="town" placeholder="Town" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="building">Building</label>
                                                <input type="text"  value="<?=$house?>" id="building" class="form-control" name="building" placeholder="building" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="license">Records</label>
                                                <input type="text" value="<?=$records?>" id="Records" class="form-control" name="records" placeholder="Records">
                                            </div>
                                        </div>

                                
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Save Changes</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>

                    </section>
                </div>

            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p><?php echo date('Y'); ?> &copy; Harshvir</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="#">Harshvir</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="assets/compiled/js/app.js"></script>

    <script type="text/javascript">
        <?php if (@$_GET['msg'] == 'welcome') : ?>
            alert('Karibu sana!');
        <?php endif; ?>
    </script>
    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/static/js/pages/datatables.js"></script>
    <script>
        $('#editPhoto').click(function(){
            //if checked, enable the file select
            console.log($(this).attr('length'));
           if($(this).attr('checked')==true){
            $('#photo').removeAttr('disabled');

           }else{
            $('#photo').attr('disabled');

           }
            
        });

        //changing the selected value 
        $('#title').val('<?=$title?>');
        $('#county').val('<?=$county_value?>');
    </script>


</body>

</html>