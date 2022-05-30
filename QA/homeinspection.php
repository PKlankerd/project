<?php session_start();

    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- fontgoogle -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inspection ANSELL</title>
</head>

<body style="background-color:#000 ; overflow:auto; ">
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bxs-cube'></i>
                <div class="logo_name">AnSell Thailand</div>
            </div>
            <!-- <i class='bx bx-menu' id="button"></i> -->
        </div>
        <ul class="nav list">

<li>
        <a href="homeinspection.php">
            <i class='bx bx-home-heart'></i>
            <span class="links_name">Home</span>
        </a>

    </li>



    <li>
        <a href="qi.php">
            <i class='bx bx-receipt'></i>
            <span class="links_name">Quality Inspection</span>
        </a>
    </li>

   
    <!-- <li>
        <a href="reportqi.php">
            <i class='bx bxs-file-doc'></i>
            <span class="links_name">QI Report</span>
        </a>

    </li> -->

    <li>
        <a href="Statisticaltest1.php">
            <i class='bx bx-receipt'></i>
            <span class="links_name">Statistical Test-1 </span>
        </a>
    </li>

   

    <!-- <li>
        <a href="reporttest1.php">
            <i class='bx bxs-file-doc'></i>
            <span class="links_name">Test-1  Report</span>
        </a>

    </li> -->

    <li>
        <a href="Rework.php">
            <i class='bx bx-receipt'></i>
            <span class="links_name">Rework</span>
        </a>
    </li>

<!--            

    <li>
        <a href="reportrework.php">
            <i class='bx bxs-file-doc'></i>
            <span class="links_name"> Rework Report</span>
        </a>

    </li> -->
   
    <li>
        <a href="Statisticalafter.php">
            <i class='bx bx-receipt'></i>
            <span class="links_name">Statistical After</span>
        </a>
    </li>

   
<!-- 
    <li>
        <a href="reportafter.php">
            <i class='bx bxs-file-doc'></i>
            <span class="links_name">After Report </span>
        </a>

    </li> -->
    
    



</ul>
        <div class="profile_content">
            <div class="profile" >
                <div class="profile_details">
            
                    <div class="name_job">
                        <div class="name">
                      
                        </div>
                        <div class="job">
                       
                        </div>
                    </div>
                </div>
             

            </div>
        </div>
    </div>

    <!-- NAVBAR -->

    <!-- clock -->

    <div class="container " id="crudApp">
        <div class=" home_content ">

            <div class="col-12 mt-5" align="center">

                <div id="MyClockDisplay" class="clock" onload="showTime()"></div>

            </div>
        </div>
    </div>





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






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>