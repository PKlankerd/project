let app = new Vue({
    el: '#crudApp',
    data: {           //เก็บข้อมูลอะไรบ้าง
        allData: [],
        depart:[],
        filtering: "",
        myModal: false,
        hiddenId: null,
        actionButton: 'Insert',
        dynamicTitle: 'Add Members'
    },
    methods: {
        fetchAllData() {   //เวลาที่เราจะ fetch ข้อมูล เราก็จะทำการยิง refresh ขึ้นไปตัว ฟังค์ชั่น
            axios.post('../control/actionadd.php', {  //ยิงข้อมูลไปที่ ฟังชั่น
                actions: 'fetchall'           
                //ส่ง actions ไปด้วยเพื่อให้ backend เช็ดว่า ส่งอะไรไป
                
            }).then(res => {             //รับข้อมูลมา
                app.allData = res.data;    //เอาข้อมูลมาเก็บที่  alldata  โดยการเข้าถึงต้อง app. ด้วยตัวแปรด้านบน
            })
        },
        openModal(){    //เปิด model
        app.employee_number='';
        app.first_name='';
        app.last_name='';
        app.email_address='';
        app.phone_number='';
        app.local_address='';
        app.department_ssp='';
        app.actionButton='Insert';
        app.dynamicTitle ='Add Members';
        app.myModal = true; //เป็น true ให้เปิด modelขึ้นมาได้
       },
       submitData:function(){
            if(app.employee_number == '' || app.first_name == '' || app.last_name == '' || app.email_address == '' 
            || app.phone_number == '' || app.local_address == '' || app.department_ssp == '' )
            {
                
                alert('กรุณากรอกข้อมูล พนักงานให้ครบ');

                window.location.reload();
            }
            else
            {

                if(app.actionButton == 'Insert'){  //= กด insert
                    axios.post('../control/actionadd.php',{  
                        // axios ยิงไปที่ actionadd.php
                        actions: 'insert',    //ส่ง actions insert ไป ส่งอะไรไปบ้าง
                        employeeNumber: app.employee_number,  
                        firstName: app.first_name,
                        lastName: app.last_name,
                        emailAddress: app.email_address,
                        phoneNumber: app.phone_number,
                        localAddress: app.local_address,
                        departMent: app.department_ssp,    
                        // ส่งข้อมูลทั้งหมดที่กรอกเพื่อลงฐานข้อมูล
                        //employeeNumber เอาข้อมูลมาจาก app.employee_number, 
                       
                    }).then(res => {              // รับข้อมูลมา 
                        app.myModal = false;
                        app.fetchAllData();  // fetch ข้อมูลมาทั้งหมด
                        app.employee_number = ''; 
                        //แล้วทำการ reset ข้อมูลที่ input ให้เป็น ค่าว่าง
                        app.first_name = '';
                        app.last_name='';
                        app.email_address='';
                        app.phone_number='';
                        app.local_address='';
                        app.department_ssp='';
                        if(res.data.message) alert(res.data.message);   
                        else {alert('กรุณากรอกใหม่ ข้อมูลซ้ำ!');}
                        
                        
                        window.location.reload();
                        // โหลดหน้าข้อมูลข้อมูลมา refrese หน้าใหม่
                    })
                }
            
                if(app.actionButton == 'Update'){   //กด Update
                    axios.post('../control/actionadd.php',{    //axios ยิงไปที่ actionadd.php
                        actions: 'update',
                        employeeNumber: app.employee_number, 
                        //employeeNumber เก็บข้อมูลจาก app.employee_number
                        firstName: app.first_name,
                        lastName: app.last_name,
                        emailAddress: app.email_address,
                        phoneNumber: app.phone_number,
                        localAddress: app.local_address,
                        departMent: app.department_ssp,
                        hiddenId: app.hiddenId
                    }).then(res => {                // รับข้อมูลมา 
                        console.log(app.department_ssp)
                        app.myModal = false;
                        app.fetchAllData();    // fetch ข้อมูลมาทั้งหมด
                        app.employee_number='';
                         //แล้วทำการ reset ข้อมูลที่ input ให้เป็น ค่าว่าง
                        app.first_name='';
                        app.last_name='';
                        app.email_address='';
                        app.phone_number='';
                        app.local_address='';
                        app.department_ssp='';
                        app.hiddenId='';
                        if(res.data.message) alert(res.data.message);   
                        else {alert('กรุณากรอกใหม่ ข้อมูลซ้ำ!');}
                        
                        
                        window.location.reload();
                    })
                }
               
            }
       },
       fetchData(id){ 
             // การที่จะให้ fetch ข้อมูลออกมา ต้องรับ idมันด้วยเพื่อให้รู้ว่าอ่อ  ไอดีมันตรงกัน ก็จะให้ fetch ข้อมูลตัวนั้นออกมา
           axios.post('../control/actionadd.php',{    // axios ยิงไปที่ actionadd.php
               actions: 'fetchSingle',
               id: id  //เก็บ id ไว้ด้วย
           }).then(res => {     // รับข้อมูลตอบกลับมาจาก server ข้อมูลที่ได้มาก็เก็บ พ็อบเพอตี้ต่างๆ
               app.employee_number = res.data.employee_number; 
               //เข้าถึง app.employee_number จะเก็บ res.data.employee_number; 
               app.first_name = res.data.first_name;
               app.last_name = res.data.last_name;
               app.email_address = res.data.email_address;
               app.phone_number = res.data.phone_number;
               app.local_address = res.data.local_address;
               app.department_ssp= res.data.department_ssp;
               app.hiddenId = res.data.id;
               app.myModal = true;
               app.actionButton = 'Update';
               app.dynamicTitle = 'Edit Product';
           })
       },

       deleteData(id){  //fetch ข้อมูล ตัวเด่ว รับid มาด้วย จะได้ลบ ถูกตัว
           if(confirm('Are you sure you want to delete')){  //ถามก่อน ถ้ากด ok จะถูกส่งไปที่ axios
               axios.post('../control/actionadd.php',{  //axios ยิงไปที่ ฟังค์ชั่น 
                   actions: 'delete',    //action ส่งไปdelete   id ด้วย
                   id: id  
               }).then(res => {   
                   app.fetchAllData(); 
                    // หลังจากdeleteข้อมูลเสร็จทำการfetch dataข้อมูลกลับมาจะได้รู้ตัวไหนถูกลบไปแล้ว
                   alert(res.data.message);
               });
           }
       },
   
       calldepartment()
       {
       
        axios.post('../control/actionadd.php', 
        {
            actions: 'calldepartment'
            
        }).then(res => {
            this.depart = res.data;
          

        })
    
       }
   
   
     
    },
    created() {
        this.fetchAllData();   //เพื่อเข้าถึง fetchAllData() งั้นทำการเรียกไม่ได้
        this.calldepartment();
       
    },
    computed: {
        filteredRows()
        {
        return this.allData.filter(row => 
            {
            
           
            const employeeNumber = row.employeeno.toLowerCase();
            const firstName = row.firstname.toLowerCase();
       

            const searchTerm = this.filtering.toLowerCase();

        return (
            
            employeeNumber.includes(searchTerm) ||    
            firstName.includes(searchTerm) 
               
        
               );
            
            });
        }
    }
   
})