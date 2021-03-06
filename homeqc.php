<?php 
        session_start();
   
          
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleadmin.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- fontgoogle -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>HOME ANSELL</title>
</head>

<body style="background-color:#ffff; overflow:auto; ">

    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxs-hand'></i>
            <span class="logo_name">Ansell Thailand</span>
        </div>
        <ul class="nav-links">
            <li>
                
                <a href="homeqc.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="link_name">Home</span>
                </a>

                <ul class="sub-menu blank">
                    <li><a class="link_name" href="homeqc.php">HOME</a></li>
                </ul>
                
            </li>

            <li>
                <div class="iocn-link">
                    <a href="batchnumber.php">
                        <i class='bx bxs-report'></i>
                        <span class="link_name">BATCH</span>
                    </a>
                   
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="as1/batchnumber.php">BATCH AS-1</a></li>
                    <li><a class="link_name" href="as2/batchnumber.php">BATCH AS-2</a></li>
                </ul>
            </li>

            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-edit-alt'></i>
                        <span class="link_name">Edit</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                <li><a class="link_name" href="QC/qcbincard.php">QC Bincard</a></li>
                   
                   
                    
                </ul>
            </li>

            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!-- <img src="pic/users.png" alt="profileImg"> -->
                    </div>
                    <div class="name-job">
                        <!-- <div class="profile_name"> <span><?php echo $_SESSION['firstname'];?>
                                <?php echo $_SESSION['lastname'];?></span></div>
                        <div class="job"> <span><?php echo $_SESSION['department'];?></span></div> -->
                    </div>
                    <a href="../logout.php">
                        <!-- <i class='bx bx-log-out' id="log_out"></i> -->
                    </a>
                </div>
            </li>
        </ul>
    </div>

    <!-- sidebar -->

    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <!-- <span class="text"><span>Welcome To </span><span><?php echo $_SESSION['firstname'];?></span> -->
            <!-- </span> -->
        </div>
        <div class="container " id="crudApp">
            <div class=" home_content ">

                <div class="col-12 " align="center">

                    <div id="MyClockDisplay" class="clock" onload="showTime()"></div>

                </div>

                
                <a href="as1/dipas1.php">

                    <div class="col-md-6" style="margin-top:20rem; float: left; text-align: center;">
                        <button type="submit" class="btn btn-primary btn-md p-5"
                            style="font-size: 5rem; color: #000">AS-1</button>
                    </div>
                </a>

                <a href="as2/dipas2.php">
                    <div class="col-md-6" style="margin-top:20rem; float: right; text-align: center;">
                        <button type="submit" class="btn btn-primary btn-md p-5"
                            style="font-size: 5rem; color: #000">AS-2</button>
                    </div>

                </a>






            </div>
        </div>






    </section>









    <script>
    function showTime() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";

        if (h == 0) {
            h = 12;
        }

        if (h > 12) {
            h = h - 12;
            session = "PM";
        }

        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;

        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;

        setTimeout(showTime, 1000);

    }

    showTime();
    </script>

    <script src="js/dropdown.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>