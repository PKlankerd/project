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
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Status ANSELL</title>
</head>

<body style="background-color:#ffff; overflow:auto; ">
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bxs-cube'></i>
                <div class="logo_name">AnSell Thailand</div>
            </div>
            <!-- <i class='bx bx-menu' id="button"></i> -->
        </div>
        <ul class="nav list"  >
            <li >
                <a href="homemanager.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Home</span>
                </a>

            </li>

            <li >
                <a href="editqcbincard.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Edit Qcbincard </span>
                </a>

            </li>
            
            <li >
                <a href="editdippinglotL.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Edit Dipping Lot L </span>
                </a>

            </li>

            <li >
                <a href="editdippinglotR.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Edit Dipping Lot R </span>
                </a>

            </li>

            <li >
                <a href="editqi.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Edit Qi </span>
                </a>

            </li>

            <li >
                <a href="editRework.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Edit Rework </span>
                </a>

            </li>

            <li >
                <a href="editStatisticaltest1.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Edit Statistical Test </span>
                </a>

            </li>

            <li >
                <a href="editStatisticalafter.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Edit Statistical After</span>
                </a>

            </li>

            <li >
                <a href="editbonding.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Edit Bonding</span>
                </a>

            </li>

            <!-- <li >
                <a href="reportdipL.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Dipping Lot L Report</span>
                </a>

            </li>

            <li >
                <a href="reportdipR.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Dipping Lot R Report</span>
                </a>

            </li>

            <li >
                <a href="productionlot.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Production-Lot Report</span>
                </a>

            </li>

           

            <li>
                <a href="qcbincard.php">

                    <i class='bx bxs-id-card'></i>
                    <span class="links_name">QC BinCard Report</span>
                </a>
            </li>

            <li >
                <a href="reportafterprocess.php">
                    <i class='bx bx-home-heart'></i>
                    <span class="links_name">Chlorinator Report</span>
                </a>

            </li>

            <li>
                <a href="qi.php">
                    <i class='bx bx-search-alt'></i>
                    <span class="links_name">Inspection Report</span>
                </a>

            </li>

            <li>
                <a href="Statisticaltest1.php">
                    <i class='bx bx-search-alt'></i>
                    <span class="links_name"> Statistical Test-1&nbsp;&nbsp;Report</span>
                </a>

            </li>

            <li>
                <a href="Rework.php">
                    <i class='bx bx-search-alt'></i>
                    <span class="links_name">Rework Report</span>
                </a>

            </li>

            <li>
                <a href="Statisticalafter.php">
                    <i class='bx bx-search-alt'></i>
                    <span class="links_name">Statistical After&nbsp;&nbsp;Report</span>
                </a>

            </li>

            <li>
                <a href="bonding.php">
                    <i class='bx bx-search-alt'></i>
                    <span class="links_name">Bonding Report</span>
                </a>

            </li>

            <li>
                <a href="productadd.php">

                    <i class='bx bxs-box'></i>
                    <span class="links_name">Product</span>
                </a>

            </li>

            <li>
                <a href="documentproduct.php">

                    <i class='bx bxs-box'></i>
                    <span class="links_name">Product Report</span>
                </a>

            </li>



          



            <li>
                <a href="membersadd.php">
                    <i class='bx bx-zoom-in'></i>
                    <span class="links_name">Members</span>
                </a>

            </li>

            <li>
                <a href="documentmembers.php">
                    <i class='bx bxs-file-doc'></i>
                    <span class="links_name">Members Report</span>
                </a>

            </li>

            <li>
                <a href="glovecolor.php">
                    <i class='bx bx-zoom-in'></i>
                    <span class="links_name">Glovecolor</span>
                </a>

            </li>
            
            <li>
                <a href="shell.php">
                    <i class='bx bx-zoom-in'></i>
                    <span class="links_name">Shell</span>
                </a>
            </li>
            
            <li>
                <a href="size.php">
                    <i class='bx bx-zoom-in'></i>
                    <span class="links_name">Size</span>
                </a>
            </li>

            <li>
                <a href="status.php">
                    <i class='bx bx-zoom-in'></i>
                    <span class="links_name">Status</span>
                </a>
            </li> -->
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <img src="pic/users.png" alt="">
                    <div class="name_job">
                        <div class="name">
                            <span><?php echo $_SESSION['firstname'];?> <?php echo $_SESSION['lastname'];?></span>
                        </div>
                        <div class="job">
                            <span><?php echo $_SESSION['department'];?></span>
                        </div>
                    </div>
                </div>
                <a href="../logout.php">
                    <i class='bx bx-log-out' id="log_out"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>