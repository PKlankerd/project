let app = new Vue({
    el: '#crudApp',
    data: {
        allData: [],
        prolots: [],
        time:[],
        status:[],
        filtering: "",
        myModal: false,
        hiddenId: null,
        actionButton: 'Insert',
        dynamicTitle: 'Add data'
    },
    methods: {
        fetchAllData() {
            axios.post('../control/actionstatisticalafter.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        },
        openModal(){
        app.bin_no='';
        app.product_code='';
        app.product_lot='';
        app.af_date='';
        app.af_shift='';
        app.af_cripcs='';
        app.af_cridef='';
        app.af_majpcs='';
        app.af_majdef='';
        app.af_minpcs='';
        app.af_mindef='';
        app.af_status='';
        app.af_opera='';
        app.actionButton='Insert';
        app.dynamicTitle ='Add Data';
        app.myModal = true;
       },
       submitData:function(){
        if(app.product_lot == '' || app.af_date == '' || app.af_shift == '' || app.af_cripcs == '' || app.af_cridef == '' || 
        app.af_majpcs == '' || app.af_majdef == '' || app.af_minpcs == '' || app.af_mindef == '' 
        || app.af_status == '' || app.af_opera == '')
        {
            alert('กรุณากรอกข้อมูล Statistical-After ให้ครบ!');

            window.location.reload(); 
        }
        else
        {
            if(app.actionButton == 'Insert'){
                axios.post('../control/actionstatisticalafter.php',{
                    actions: 'insert',
                   
                    productLot: app.product_lot,
                    afDate: app.af_date,
                    afShift: app.af_shift,
                    afCripcs: app.af_cripcs,
                    afCridef: app.af_cridef,
                    afMajpcs: app.af_majpcs,
                    afMajdef: app.af_majdef,
                    afMinpcs: app.af_minpcs,
                    afMindef: app.af_mindef,
                    afStatus: app.af_status,
                    afOpera: app.af_opera,
                   
                }).then(res => {
                    app.myModal = false;
                    app.fetchAllData();
                    app.product_lot='';
                    app.af_date='';
                    app.af_shift='';
                    app.af_cripcs='';
                    app.af_cridef='';
                    app.af_majpcs='';
                    app.af_majdef='';
                    app.af_minpcs='';
                    app.af_mindef='';
                    app.af_status='';
                    app.af_opera='';
                    if(res.data.message) alert(res.data.message);   
                    else {alert('กรุณากรอกใหม่ ข้อมูลซ้ำ หรือ ไม่มี!');}
                    window.location.reload();
                })
            }         
        }
                if(app.actionButton == 'Update')
                {
                    if(app.af_date == '' || app.af_shift == '' || app.af_cripcs == '' || app.af_cridef == '' || 
                    app.af_majpcs == '' || app.af_majdef == '' || app.af_minpcs == '' || app.af_mindef == '' 
                    || app.af_status == '' || app.af_opera == '')
                    {
                        // alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');

                        // window.location.reload();
                    }
                    else
                    {
                    axios.post('../control/actionstatisticalafter.php',{
                        actions: 'update',
                       
                        productLot: app.product_lot,
                        afDate: app.af_date,
                        afShift: app.af_shift,
                        afCripcs: app.af_cripcs,
                        afCridef: app.af_cridef,
                        afMajpcs: app.af_majpcs,
                        afMajdef: app.af_majdef,
                        afMinpcs: app.af_minpcs,
                        afMindef: app.af_mindef,
                        afStatus: app.af_status,
                        afOpera: app.af_opera,
                        hiddenId: app.hidden_id
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();
                        app.product_lot='';
                        app.af_date='';
                        app.af_shift='';
                        app.af_cripcs='';
                        app.af_cridef='';
                        app.af_majpcs='';
                        app.af_majdef='';
                        app.af_minpcs='';
                        app.af_mindef='';
                        app.af_status='';
                        app.af_opera='';
                        app.hidden_id='';
                        alert(res.data.message);
                        window.location.reload();
                    })
                }
               
            }
       },
       fetchData(id){
           axios.post('../control/actionstatisticalafter.php',{
               actions: 'fetchSingle',
               id: id
           }).then(res => {
              
                app.product_lot= res.data.product_lot;
                app.af_date=res.data.af_date.replace(" ","T");
                app.af_shift=res.data.af_shift;
                app.af_cripcs=res.data.af_cripcs;
                app.af_cridef=res.data.af_cridef;
                app.af_majpcs=res.data.af_majpcs;
                app.af_majdef=res.data.af_majdef;
                app.af_minpcs=res.data.af_minpcs;
                app.af_mindef=res.data.af_mindef;
                app.af_status=res.data.af_status;
                app.af_opera=res.data.af_opera;
               app.hidden_id = res.data.id;
               app.myModal = true;
               app.actionButton = 'Update';
               app.dynamicTitle = 'Edit Product';
           })
       },

       deleteData(id){
           if(confirm('Are you sure you want to delete')){
               axios.post('../control/actionstatisticalafter.php',{
                   actions: 'delete',
                   id: id
               }).then(res => {
                   app.fetchAllData();
                   alert(res.data.message);
               });
           }
       },
       callproductlot()
       {
      
           axios.post('../control/actionstatisticalafter.php', 
           {
               actions: 'callproductlot'
               
           }).then(res => {
               this.prolots = res.data;
           })
   
       },
       calltimeshift(){
       
        axios.post('../control/actionstatisticalafter.php', 
        {
            actions: 'calltimeshift'
            
        }).then(res => {
            this.time = res.data;
        })
    
       },
       callstatus(){
       
        axios.post('../control/actionstatisticalafter.php', 
        {
            actions: 'callstatus'
            
        }).then(res => {
            this.status = res.data;
        })
    
   }
   
   
    },
    created() {
        this.fetchAllData();
        this.callproductlot();
        this.calltimeshift();
        this.callstatus();
       
    },
    computed: {
        filteredRows()
        {
        return this.allData.filter(row => 
            {
            
            const productLot = row.Productionlot.toLowerCase();
            

            const searchTerm = this.filtering.toLowerCase();

        return (
            
            productLot.includes(searchTerm)       
           
               );
            
            });
        }
    }
   
})