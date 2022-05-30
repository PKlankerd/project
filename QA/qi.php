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
    <title>QI ANSELL</title>

</head>

<body style="background-color:#fff; overflow:auto; ">

    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <i class='bx bxs-cube'></i>
                <div class="logo_name">AnSell Thailand</div>
            </div>
            <i class='bx bx-menu' id="button"></i>
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
        <!-- <div class="profile_content">
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
    </div> -->

    <!-- NAVBAR -->

    <!-- QI data -->

    <div class="container " id="crudApp">
        <div class=" home_content ">

            <div class="col-12" align="center">

                
                <div class="col-md-4">
                    <h1 class="mt-3" Style="border: 1px solid #000; border-radius: 30px; background-color:#DDDDDD;">Quality Inspection</h1>
                </div>


                <div class=" form-group mb-3 col-lg-8 mt-4 ">
                    <input type="search" class="form-control form-control-md " placeholder="Search Here"
                        v-model="filtering">
                </div>



                <div class="col-12 mb-3 " align="right">
                    <input type="button" class="btn btn-success btn-xs   " data-bs-toggle="modal"
                        data-bs-target="#myModal" @click="openModal" value="  Add QI  ">
                </div>
                <hr>
                <div class="table-responsive-lg">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bin No.</th>
                                <th>Product Code</th>
                                <th>Product Lot</th>
                                <th>Total All</th>
                                <th>1st-Status</th>
                                <th>1st-Reject Qty</th>
                                <th>1st-Good Qty</th>
                                <th>2nd-Status</th>
                                <th>2nd-Reject Qty</th>
                                <th>2nd-Good Qty</th>
                                <th>Total</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(row,index) in filteredRows" :key="row.Productionlot">
                                <!-- <tr v-for=" row in allData "> -->
                                <td>{{index+1}}</td>
                                <td>{{row.Binno}}</td>
                                <td>{{row.Productcode}}</td>
                                <td>{{row.Productionlot}}</td>
                                <td>{{row.TotalGlove}}</td>
                                <td>{{row.status1st}}</td>
                                <td>{{row.reject1st}}</td>
                                <td>{{row.good1st}}</td>
                                <td>{{row.status2nd}}</td>
                                <td>{{row.reject2nd}}</td>
                                <td>{{row.good2nd}}</td>
                                <td>{{row.Total}}</td>
                                


                                <td>
                                    <button type="button" name="edit" class="btn btn-primary btn-sm
                        edit" data-bs-toggle="modal" @click="fetchData(row.Productionlot)"
                                        data-bs-target="#myModal">ADD</button>
                                    <button type="button" name="delete" class="btn btn-danger btn-sm
                            delete" data-bs-toggle="modal" @click="deleteData(row.Productionlot)"
                                        data-bs-target="#myModal">Delete</button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                   
                </div>

                <div v-if="myModal" class="modal fade" id="myModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ dynamicTitle }}</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    @click="myModal=false"></button>
                            </div>
                            <div class="modal-body row g-3">
                         
                                <div class="col-md-12">
                                    <label for="Product Lot">Product Lot</label><br>
                                    <input type="text" v-model="product_lot" class="form-control form-control-sm"
                                        style="border-radius: 30px;" :disabled = "actionButton =='Update'" >
                                      
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <label for="1st-status">1st-status</label><br>
                                    <select v-model="st_status" class="form-select form-select-sm"
                                        style="border-radius: 30px;" :disabled = "actionButton =='Insert'">
                                      
                                        <option disabled value="">Please select one</option>
                                        <option v-for="statuses in status" :key="statuses.status" :value="statuses.status">
                                            {{statuses.status}}</option>

                                    </select>
                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="1st-Reject.">1st-Reject</label><br>
                                    <input type="text" v-model="st_reject" class="form-control form-control-sm"
                                        style="border-radius: 30px;" :disabled = "actionButton =='Insert'">
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <label for="1st-Good ">1st-Good</label><br>
                                    <input type="text" v-model="st_good" class="form-control form-control-sm"
                                        style="border-radius: 30px;" :disabled = "actionButton =='Insert'">
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label for="2nd-status">2nd-status</label><br>
                                    <select v-model="nd_status" class="form-select form-select-sm"
                                        style="border-radius: 30px;" :disabled="st_status=='Pass' || st_status==''">
                                        <option disabled value="">Please select one</option>
                                        <option v-for="statuses in status" :key="statuses.status" :value="statuses.status">
                                            {{statuses.status}}</option>

                                    </select>
                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="2nd-Reject">2nd-Reject</label><br>
                                    <input type="text" v-model="nd_reject" class="form-control form-control-sm"
                                        style="border-radius: 30px;" :disabled="st_status=='Pass' || st_status==''">
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <label for="2nd-good">2nd-Good</label><br>
                                    <input type="text" v-model="nd_good" class="form-control form-control-sm"
                                        style="border-radius: 30px;" :disabled="st_status=='Pass' || st_status==''">
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <label for="total">Total.</label><br>
                                    <input type="text" v-model="total_qty" class="form-control form-control-sm"
                                        style="border-radius: 30px;" :disabled = "actionButton =='Insert'  " >
                                </div>
                                <br> 
                                <div class="modal-footer">
                                    <input type="hidden" v-model="hiddenId">
                                    <input type="button" v-model="actionButton" @click="submitData"
                                        class="btn btn-success btn-xs">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="../js/addqi.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>