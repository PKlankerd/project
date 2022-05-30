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
    <title>Bonding AlphaTec Glove</title>

</head>

<body style="background-color:#fff ; overflow:auto; ">

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
                <a href="shell.php">
                    <i class='bx bxs-file-doc'></i>
                    <span class="links_name">Shell</span>
                </a>

            </li>

            <li>
                <a href="size.php">
                    <i class='bx bxs-file-doc'></i>
                    <span class="links_name">Size</span>
                </a>

            </li>

            <li>
                <a href="status.php">
                    <i class='bx bxs-file-doc'></i>
                    <span class="links_name">Status</span>
                </a>

            </li>

            <li>
                <a href="reportafterprocess.php">
                    <i class='bx bxs-file-doc'></i>
                    <span class="links_name">reportafterprocess</span>
                </a>

            </li>
           
            <li>
                <a href="reportdipL.php">
                    <i class='bx bxs-file-doc'></i>
                    <span class="links_name">reportdipL</span>
                </a>

            </li>

            <li>
                <a href="reportdipR.php">
                    <i class='bx bxs-file-doc'></i>
                    <span class="links_name">reportdipL</span>
                </a>

            </li>

            <li>
                <a href="glovecolor.php">
                    <i class='bx bxs-file-doc'></i>
                    <span class="links_name">glovecolor</span>
                </a>

            </li>
     
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

    <!-- Bonding data -->

    <div class="container " id="crudApp">
        <div class=" home_content ">







            <div class="col-12" align="center">

                

                <div class="col-md-4">
                    <h1 class="mt-3" Style="border: 1px solid #000; border-radius: 30px; background-color:#DDDDDD;">Bonding AlphaTec Glove</h1>
                </div>


                <div class=" form-group mb-3 col-lg-8 mt-4 ">
                    <input type="search" class="form-control form-control-md " placeholder="Search Here"
                        v-model="filtering">
                </div>



                <!-- <div class="col-12 mb-3" align="right">
                    <input type="button" class="btn btn-success btn-xs   " data-bs-toggle="modal"
                        data-bs-target="#myModal" @click="openModal" value="Add Bonding">
                </div> -->



                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <tr>
                            <th>#</th>
                            <th>Bonding
                                Lot No.</th>
                            <th>Product
                                Code</th>
                            <th>Size</th>
                            <th>Shell</th>
                            <th>Liner</th>
                            <th>Quantity</th>
                            <th>DateTime(วันผลิต)</th>

                            <th>Record by(บันทึกโดย)</th>
                            <th>Quality by</th>
                            <th>DateTime(วันตรวจ)</th>

                            <th>Inspection by(ตรวจโดย)</th>
                            <!-- <th>Julian Date</th> -->
                           
                            <th>Action</th>
                        </tr>
                        <tr v-for="(row,index) in filteredRowsEdit " :key="row.bondingLotNo">
                            <!-- <tr v-for=" row in allData "> -->
                            <td>{{index+1}}</td>
                            <td>{{row.bondingLotNo}}</td>
                            <td>{{row.productcode}}</td>
                            <td>{{row.size}}</td>
                            <td>{{row.shell}}</td>
                            <td>{{row.Liner}}</td>
                            <td>{{row.Quantity}}</td>
                            <td>{{row.ProductionDate}}</td>
                            <td>{{row.RecordedBy}}</td>
                            <td>{{row.Quality}}</td>
                            <td>{{row.InspectionDate}}</td>
                            <td>{{row.InspectionBy}}</td>
                            <!-- <td>{{row.JulianDate}}</td> -->

                           
                            <td>
                                <button type="button" name="edit" class="btn btn-primary btn-sm m-1
                    edit" data-bs-toggle="modal" @click="fetchData(row.bondingLotNo,row.ProductionDate)"
                                    data-bs-target="#myModal">Edit</button>

                                <!-- <button type="button" name="delete" class="btn btn-danger btn-sm
                        delete" data-bs-toggle="modal" @click="deleteData(row.bondingLotNo,row.ProductionDate)"
                                    data-bs-target="#myModal">Delete</button> -->
                            </td>

                        </tr>
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
                                <div class="col-md-6">
                                    <label for="Bonding Lot No.">Bonding Lot No.</label><br>
                                    <input type="text" v-model="bond_no" class="form-control form-control-sm"
                                        style="border-radius: 30px;" :disabled="actionButton =='Update'"
                                        placeholder="Bonding Lot No..." maxlength="8">

                                        <label for="Bonding Lot No." style="font-size:12px; font-weight:bold; ">ไม่เกิน 8 ตัวเลข</label>
                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="Product Code">Product Code</label><br>
                                    <!-- <input type="text" v-model="product_code" class="form-control"> -->
                                    <select v-model="product_code" class="form-select form-select-sm"
                                        style="border-radius: 30px;">
                                        <option disabled value="">Please select one</option>
                                        <option v-for="pro in prodata" :key="pro.productcode" :value="pro.productcode">
                                            {{pro.productcode}}</option>

                                    </select>
                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="Size">Size</label><br>
                                    <!-- <input type="text" v-model="size_no" class="form-control form-control-sm"
                                        style="border-radius: 30px;" placeholder="Size..." maxlength="3">

                                        <label for="Size" style="font-size:12px; font-weight:bold; ">ไม่เกิน 3 ตัวอักษร</label> -->
                                        <select v-model="size_no" class="form-select form-select-sm"
                                        style="border-radius: 30px;">
                                        <option disabled value="">Please select one</option>
                                        <option v-for="sizes in size" :key="sizes.size" :value="sizes.size">
                                        {{sizes.size}}</option>
                                    </select>
                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="Shell">Shell.</label><br>
                                    <select v-model="shell_band" class="form-select form-select-sm"
                                        style="border-radius: 30px;">
                                        <option disabled value="">Please select one</option>
                                        <option v-for="shells in shell" :key="shells.shell" :value="shells.shell">
                                        {{shells.shell}}</option>
                                    </select>
                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="Liner">Liner</label><br>
                                    <select v-model="Liner_bnn" class="form-select form-select-sm"
                                        style="border-radius: 30px;">
                                        <option disabled value="">Glove color</option>
                                        <option v-for="colors in glovecolor" :key="colors.color" :value="colors.color">
                                        {{colors.color}}</option>

                                    </select>
                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="Quantity">Quantity(จำนวนถุงมือ)</label><br>
                                    <input type="text" v-model="quan_tity" class="form-control form-control-sm"
                                        style="border-radius: 30px;" placeholder="(Pcs)" maxlength="4">

                                        <label for="Quantity" style="font-size:12px; font-weight:bold; ">ไม่เกิน 4 ตัวเลข</label>
                                </div>
                                <br>



                                <div class="col-md-6">
                                    <label for="Production Date"> DateTime(วันผลิต)</label><br>

                                    <input type="datetime-local" id="birthdaytime" name="birthdaytime"
                                        class="form-control form-control-sm" :disabled="actionButton =='Update'"
                                        :value="product_date" v-model="product_date" style="border-radius: 30px;">

                                </div>
                                <br>



                                <div class="col-md-6">
                                    <label for="Recorded By">Recorded By(บันทึกโดย)</label><br>
                                    <input type="text" v-model="record_by" class="form-control form-control-sm"
                                        style="border-radius: 30px;" placeholder="Name..." maxlength="15">

                                        <label for="Recorded By" style="font-size:12px; font-weight:bold; ">ไม่เกิน 15 ตัวอักษร</label>
                                </div>
                                <br>

                                <div class="col-md-6">

                                    <label for="Quality">Quality(ผลการตรวจสอบ)</label><br>
                                    <select v-model="qua_lity" class="form-select form-select-sm"
                                        style="border-radius: 30px;">
                                        <option disabled value="">Please select one</option>
                                        <option v-for="statuses in status" :key="statuses.status" :value="statuses.status">
                                            {{statuses.status}}</option>
                                    </select>

                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="Inspection Date"> DateTime(วันตรวจ)</label><br>

                                    <input type="datetime-local" id="birthdaytime" name="birthdaytime"
                                        v-model="inspec_date" :value="inspec_date" class="form-control form-control-sm"
                                        style="border-radius: 30px;">
                                </div>
                                <br>


                                <div class="col-md-12">
                                    <label for="Inspection By">Inspection By(ตรวจโดย)</label><br>
                                    <input type="text" v-model="inspec_by" class="form-control form-control-sm"
                                        style="border-radius: 30px;" placeholder="Name..." maxlength="15">

                                        <label for="Inspection By" style="font-size:12px; font-weight:bold; ">ไม่เกิน 15 ตัวอักษร</label>
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <label for="JulianDate">JulainDate</label><br>
                                    <input type="text"  v-model="juliandate" class="form-control form-control-sm"
                                        style="border-radius: 30px;" placeholder="Name..." maxlength="4" readonly="readonly" >

                                        <label for="Inspection By" style="font-size:12px; font-weight:bold; ">ไม่เกิน 15 ตัวอักษร</label>
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


    <script src="../js/addbonding.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>