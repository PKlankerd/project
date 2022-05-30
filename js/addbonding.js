let app = new Vue({
    el: '#crudApp',
    data: {
        allData: [],
        prodata:[],
        status:[],
        glovecolor:[],
        shell:[],
        size:[],
        julian: '',
        filtering: "",
        myModal: false,
        hiddenId: null,
        actionButton: 'Insert',
        dynamicTitle: 'Add data'
    },
    methods: {
        fetchAllData() {
            axios.post('../control/actionbonding.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        },
        openModal(){
        app.bond_no='';
        app.product_code='';
        app.size_no='';
        app.shell_band='';
        app.Liner_bnn='';
        app.quan_tity='';
        app.product_date='';
       
        app.record_by='';
        app.qua_lity='';
        app.inspec_date='';
       
        app.inspec_by='';
        app.juliandate = this.getJulianDate();
       
        app.actionButton='Insert';
        app.dynamicTitle ='Add Data';
        app.myModal = true;
       },
       submitData:function(){
        if(app.bond_no == '' || app.product_code == '' || app.shell_band == '' 
        || app.Liner_bnn == '' || app.quan_tity == '' || app.product_date == '' 
        || app.record_by == '' || app.qua_lity == '' || app.inspec_date == '' 
        || app.inspec_by == '' || app.size_no == '' )
        
        {
            alert('กรุณากรอกข้อมูล ให้ครบทุกช่อง');

            window.location.reload(); 
        }
        else
        {
            if(app.actionButton == 'Insert'){
                axios.post('../control/actionbonding.php',{
                    actions: 'insert',
                    bondNo: app.bond_no,
                    productCode: app.product_code,
                    sizeNo: app.size_no,
                    shellBand: app.shell_band,
                    linerBnn: app.Liner_bnn,
                    quanTity: app.quan_tity,
                    productDate: app.product_date,
                   
                    recordBy: app.record_by,
                    quaLity: app.qua_lity,
                    inspecDate: app.inspec_date,
                    
                    inspecBy:app.inspec_by,
                    julianDate:app.juliandate,
                   
                }).then(res => {
                    app.myModal = false;
                    app.fetchAllData();
                    app.bond_no='';
                    app.product_code='';
                    app.size_no='';
                    app.shell_band='';
                    app.Liner_bnn='';
                    app.quan_tity='';
                    app.product_date='';
                    
                    app.record_by='';
                    app.qua_lity='';
                    app.inspec_date='';
                   
                    app.inspec_by='';
                    app.juliandate='';
                    if(res.data.message) alert(res.data.message);   
                    else {alert('กรุณากรอกใหม่ ข้อมูลซ้ำ!!');}
                    window.location.reload();
                })
            }         
        
                if(app.actionButton == 'Update'){
                    axios.post('../control/actionbonding.php',{
                        actions: 'update',
                        bondNo: app.bond_no,
                        productCode: app.product_code,
                        sizeNo: app.size_no,
                        shellBand: app.shell_band,
                        linerBnn: app.Liner_bnn,
                        quanTity: app.quan_tity,
                        productDate: app.product_date,
                        
                        recordBy: app.record_by,
                        quaLity: app.qua_lity,
                        inspecDate: app.inspec_date,
                        
                        inspecBy:app.inspec_by,
                        julianDate:app.juliandate,
                   
                       
                        hiddenId: app.hidden_id
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();
                        app.bond_no='';
                        app.product_code='';
                        app.size_no='';
                        app.shell_band='';
                        app.Liner_bnn='';
                        app.quan_tity='';
                        app.product_date='';
                       
                        app.record_by='';
                        app.qua_lity='';
                        app.inspec_date='';
                       
                        app.inspec_by='';
                        app.juliandate = '';
                        app.hidden_id='';
                        if(res.data.message) alert(res.data.message);   
                        else {alert('กรุณากรอกใหม่ ข้อมูลซ้ำ!!');}
                        window.location.reload();
                    })
                }
               
        }
       },
       fetchData(id,productDate){
           axios.post('../control/actionbonding.php',{
               actions: 'fetchSingle',
               id: id,
               productDate:productDate
               
           }).then(res => {
                app.bond_no= res.data.bond_no;
                app.product_code= res.data.product_code;
                app.size_no= res.data.size_no;
                app.shell_band= res.data.shell_band;
                app.Liner_bnn= res.data.Liner_bnn;
                app.quan_tity= res.data.quan_tity;
                app.product_date= res.data.product_date.replace(" ","T");//แทนที่ในช่องว่าง
              
                app.record_by=res.data.record_by;
                app.qua_lity=res.data.qua_lity;
                app.inspec_date=res.data.inspec_date.replace(" ","T"); //แทนที่ในช่องว่าง
                
                app.inspec_by=res.data.inspec_by;
                app.juliandate=res.data.juliandate;

               app.hidden_id = res.data.id;
               app.myModal = true;
               app.actionButton = 'Update';
               app.dynamicTitle = 'Edit Product';
           })
       },

       deleteData(id,productDate){
           if(confirm('Are you sure you want to delete')){
               axios.post('../control/actionbonding.php',{
                   actions: 'delete',
                   id: id,
                   productDate:productDate
               }).then(res => {
                   app.fetchAllData();
                   alert(res.data.message);
               });
           }
       },
       callproductdata(){
       
            axios.post('../control/actionbonding.php', 
            {
                actions: 'callproductdata'
                
            }).then(res => {
                app.prodata = res.data;
            })
        
       },
       callstatus()
       {
       
        axios.post('../control/actionbonding.php', 
        {
            actions: 'callstatus'
            
        }).then(res => {
            app.status = res.data;
        })
    
      },
      callglovecolor(){
       
        axios.post('../control/actionbonding.php', 
        {
            actions: 'callglovecolor'
            
        }).then(res => {
            app.glovecolor = res.data;
        })
    
        },
        callshell()
        {
       
            axios.post('../control/actionbonding.php', 
            {
                actions: 'callshell'
                
            }).then(res => {
                app.shell = res.data;
            })
        
            },
            callsize(){
       
                axios.post('../control/actionbonding.php', 
                {
                    actions: 'callsize'
                        
                }).then(res => {
                    app.size = res.data;
                })
              
                },
                getJulianDate(){
                    var now = new Date();
                    var start = new Date(now.getFullYear(), 0, 0);
                    var diff = (now - start) + ((start.getTimezoneOffset() - now.getTimezoneOffset()) * 60 * 1000);
                    var oneDay = 1000 * 60 * 60 * 24;
                    var day = Math.floor(diff / oneDay);
                    this.julian = day.toString().padStart(3, '0');
                    return this.julian;
                }
         },
         
    created() {
        this.fetchAllData();
        this.callproductdata();
        this.callstatus();
        this.callglovecolor();
        this.callshell();
        this.callsize();
       
       
    },
    computed: {
        filteredRows()
        {
        return this.allData.filter(row => 
            {
            
            const julianDate = row.JulianDate.toLowerCase();
           

           
      

            const searchTerm = this.getJulianDate();
        
        return (
            
            julianDate.includes(searchTerm)     
              
            
               );
            
            });
        },
        filteredRowsEdit()
        {
        return this.allData.filter(row => 
            {
            
            const julianDate = row.JulianDate.toLowerCase();
            const bondNo = row.bondingLotNo.toLowerCase();
      

            const searchTerm = this.filtering.toLowerCase();
        
        return (
            
            julianDate.includes(searchTerm) ||  
            bondNo.includes(searchTerm)   
              
            
               );
            
            });
        }
    }
   
})