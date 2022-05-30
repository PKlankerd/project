<?php session_start();
// if(!isset($_SESSION['firstname'])){  //check session
          
//     //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form  
//     Header("location: ../login.php");
// }
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
    <title>Statistical Test-1</title>
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


    <!-- Statistical data -->

    <div class="container " id="crudApp">
        <div class=" home_content ">

          
        <div class="col-12" align="center">
                
                
                <div class="col-md-4">
                    <h1 class="mt-3" Style="border: 1px solid #000; border-radius: 30px; background-color:#DDDDDD;">Statistical Test-1</h1>
                </div>


                <div class=" form-group mb-3 col-lg-8 mt-4 ">
                    <input type="search" class="form-control form-control-md " placeholder="Search Here"
                        v-model="filtering">
                </div>
           


           

                <hr>
                <div class="table-responsive-lg ">
                    <table class="table table-bordered table-striped table-sm">
                        <tr>
                            <th>#</th>
                            <th>Bin No.</th>
                            <th>Product Code</th>
                            <th>Product Lot</th>
                            <th> 1st-DateTime</th>
                            <th> 1st-Shift</th>
                            <th> 1st-CriticalPcs</th>
                            <th> 1st-CriticalDefect</th>
                            <th> 1st-MajorPcs</th>
                            <th> 1st-MajorDefect</th>
                            <th> 1st-MinorPcs</th>
                            <th> 1st-MinorDefect</th>
                            <th> 1st-Operator</th>
                            
                            <th >Action</th>
                        </tr>

                        <tr v-for="(row,index) in filteredRows " :key="row.Productionlot">
                            <!-- <tr v-for=" row in allData "> -->
                            <td>{{index+1}}</td>
                            <td>{{row.Binno}}</td>
                            <td>{{row.Productcode}}</td>
                            <td>{{row.Productionlot}}</td>
                            <td>{{row.Date1st}}</td>
                            <td>{{row.Shift1st}}</td>
                            <td>{{row.CriticalPcs1st}}</td>
                            <td>{{row.CriticalDefect1st}}</td>
                            <td>{{row.MajorPcs1st}}</td>
                            <td>{{row.MajorDefect1st}}</td>
                            <td>{{row.MinorPcs1st}}</td>
                            <td>{{row.MinorDefect1st}}</td>
                            <td>{{row.operator1st}}</td>
                           



                            <td>
                                <button type="button" name="edit" class="btn btn-primary btn-sm  
                    edit" data-bs-toggle="modal" @click="fetchData(row.Productionlot)"
                                    data-bs-target="#myModal">Edit</button>
                                
                               
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
                              

                                <div class="col-md-12">
                                    <label for="Product Lot">Product Lot</label><br>
                                    <input type="text" v-model="product_lot" class="form-control form-control-sm"
                                        style="border-radius: 30px;" :disabled = "actionButton =='Update'" >
                                        <!-- <select v-model="product_lot" class="form-select form-select-sm"
                                        style="border-radius: 30px;" :disabled = "actionButton =='Update'">
                                        <option disabled value="">Please select one</option>
                                        <option v-for="prolot in prolots" :key="prolot.Productionlot" :value="prolot.Productionlot">
                                            {{prolot.Productionlot}}</option>
                                    </select> -->
                                    
                                </div>
                                <br>



                                <div class="col-md-6">
                                    <label for="Date.">Date.</label><br>
                                   
                                        <input type="datetime-local"  class="form-control form-control-sm"  id="birthdaytime" name="birthdaytime" 
                                       v-model="st_date" :value="st_date"  style="border-radius: 30px;" >

                                </div>
                                <br>

                              

                                <div class="col-md-6">
                                    <label for="Shift">Shift</label><br>
                                    <!-- <input type="text" v-model="st_shift" class="form-control"> -->
                                    <select v-model="st_shift" class="form-select form-select-sm"
                                        style="border-radius: 30px;" >
                                        <!-- <option disabled value="">Please select one</option>
                                        <option>AM</option>
                                        <option>PM</option>
                                        <option>NS</option> -->
                                        <option v-for="times in time" :key="times.timeshift"  :value="times.timeshift">
                                            {{times.timeshift}}</option>
                                    </select>
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <label for="CriticalPcs">CriticalPcs</label><br>

                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="CriticalPcs ">CriticalPcs</label><br>
                                    <input type="text" v-model="st_cripcs" class="form-control form-control-sm"
                                        style="border-radius: 30px;" placeholder="CriticalPcs" >
                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="CriticalDefect">CriticalDefect</label><br>
                                    <input type="text" v-model="st_cridef" class="form-control form-control-sm"
                                        style="border-radius: 30px;" placeholder="CriticalDefect..." >
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <label for="MajorPcs">MajorPcs</label><br>

                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="MajorPcs">MajorPcs</label><br>
                                    <input type="text" v-model="st_majpcs" class="form-control  form-control-sm"
                                        style="border-radius: 30px;" placeholder="MajorPcs" >
                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="MajorDefect">MajorDefect</label><br>
                                    <input type="text" v-model="st_majdef" class="form-control  form-control-sm"
                                        style="border-radius: 30px;" placeholder="MajorDefect" >
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <label for="MinorPcs">MinorPcs</label><br>

                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="MinorPcs">MinorPcs</label><br>
                                    <input type="text" v-model="st_minpcs" class="form-control  form-control-sm" style="border-radius: 30px;" 
                                    placeholder="MinorPcs..." >
                                </div>
                                <br>

                                <div class="col-md-6">
                                    <label for="MinorDefect">MinorDefect</label><br>
                                    <input type="text" v-model="st_mindef" class="form-control  form-control-sm" style="border-radius: 30px;" 
                                    placeholder="MinorDefect..." >
                                </div>
                                <br>

                                <div class="col-md-12">
                                    <label for="Operator">Operator</label><br>
                                    <input type="text" v-model="st_opera" class="form-control form-control-sm" 
                                    style="border-radius: 30px;"placeholder="Operator..." >
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





    <script src="../js/addstatistical.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>