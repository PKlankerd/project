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
    <link rel="stylesheet" href="DataTables/DataTables-1.10.25/css/dataTables.bootstrap5.min.css">
    <!-- Excel PDF  -->
    <link rel="stylesheet" href="DataTables/Buttons-1.7.1/css/buttons.bootstrap5.min.css">
    <!-- vue cdn -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>QI ANSELL</title>

</head>

<body style="background-color:#fff; overflow:auto; ">

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

   <!-- datatable qc bincard -->
   <div class="container " id="crudApp">
        <div class=" home_content ">
        <div class="col-12 "  align="center" >
           
            <div class="col-md-4">
                    <h1 class="mt-3" Style="border: 1px solid #000; border-radius: 30px; background-color:#DDDDDD;"> Quality Inspection Report</h1>
                </div>
                <div class="card " style="background-color: #fff;">
                    <div class="card-body col-md-12 mx-auto ">


                        <table id="table" class="table table-striped table-sm " style="width:100%">
                            <thead>
                            <tr>
                               
                                <th>Bin No.</th>
                                <th>Product Code</th>
                                <th>Product Lot</th>
                                <th>1st-Status</th>
                                <th>1st-Reject Qty</th>
                                <th>1st-Good Qty</th>
                                <th>2nd-Status</th>
                                <th>2nd-Reject Qty</th>
                                <th>2nd-Good Qty</th>
                                <th>Total</th>
                       
                                
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach($qi as $row):?>
                                <tr>
                                    <td><?php echo $row ['Binno']?></td>
                                    <td><?php echo $row ['Productcode']?></td>
                                    <td><?php echo $row ['Productionlot']?></td>
                                    <td><?php echo $row ['status1st']?></td>
                                    <td><?php echo $row ['reject1st']?></td>
                                    <td><?php echo $row ['good1st']?></td>
                                    <td><?php echo $row ['status2nd']?></td>
                                    <td><?php echo $row ['reject2nd']?></td>
                                    <td><?php echo $row ['good2nd']?></td>
                                    <td><?php echo $row ['Total']?></td>
                                   
                                    


                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- script javascript -->
    <script src="../js/addqi.js"></script>


    <!-- Datatables -->
    <script src="../js/jquery.min.js"></script>
    <script src="DataTables/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="DataTables/DataTables-1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="DataTables/Buttons-1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="DataTables/Buttons-1.7.1/js/buttons.bootstrap5.min.js"></script>
    <script src="DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="DataTables/Buttons-1.7.1/js/buttons.html5.min.js"></script>
    <script src="DataTables/Buttons-1.7.1/js/buttons.print.min.js"></script>
    <script src="DataTables/Buttons-1.7.1/js/buttons.colVis.min.js"></script>

    <!-- bootstrap5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Javascript -->
    <script>
    $(document).ready(function() {
        var table = $('#table').DataTable({ //อ้างอิงถึง ดาต้า table methord datatable
            buttons: ['copy', 'excel', 'pdf','print', 'colvis']
        });

        table.buttons().container()
            .appendTo('#table_wrapper .col-md-6:eq(1)');
        //eq() เข้าถึง  Elements ด้วย index
    });
    </script>



</body>

</html>