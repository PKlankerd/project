let app = new Vue({
    el: '#crudApp',
    data: {
        allData: [],
        prolots: [],
        rework:[],
        filtering: "",
        myModal: false,
        hiddenId: null,
        actionButton: 'Insert',
        dynamicTitle: 'Add data'
    },
    methods: {
        fetchAllData() {
            axios.post('../control/actionrework.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        },
        openModal(){
        app.bin_no='';
        app.product_code='';
        app.product_lot='';
        app.re_process='';
        // app.re_date='';
        app.re_start='';
        app.re_finish='';
        app.re_opera='';
        app.re_reason='';
        app.actionButton='Insert';
        app.dynamicTitle ='Add Data';
        app.myModal = true;
       },
       submitData:function()
       {
        if(app.product_lot == '')
        {
            alert('กรุณากรอกข้อมูล Production Lot!');

            window.location.reload(); 
        }
        else
        {
            if(app.actionButton == 'Insert'){
                axios.post('../control/actionrework.php',{
                    actions: 'insert',
                    
                    productLot: app.product_lot,
                    reProcess: app.re_process,
                  
                    reStart: app.re_start,
                    reFinish: app.re_finish,
                    reOpera: app.re_opera,
                    reReason: app.re_reason,
                   
                }).then(res => {
                    app.myModal = false;
                    app.fetchAllData();
                  
                    app.product_lot='';
                    app.re_process='';
                 
                    app.re_start='';
                    app.re_finish='';
                    app.re_opera='';
                    app.re_reason='';
                    if(res.data.message) alert(res.data.message);   
                    else {alert('กรุณากรอกใหม่');}
                    window.location.reload();
                })
            }  
        }       
        
                if(app.actionButton == 'Update')
                {
                    if(app.re_process == '' || app.re_start == '' || app.re_finish == '' || app.re_opera == '' || 
                    app.re_reason == '' )
                    {
                        alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');

                        window.location.reload();
                    }
                    else
                    {
                    axios.post('../control/actionrework.php',{
                        actions: 'update',
                        binNo: app.bin_no,
                        productCode: app.product_code,
                        productLot: app.product_lot,
                        reProcess: app.re_process,
                       
                        reStart: app.re_start,
                        reFinish: app.re_finish,
                        reOpera: app.re_opera,
                        reReason: app.re_reason,
                        hiddenId: app.hidden_id
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();
                        app.bin_no='';
                        app.product_code='';
                        app.product_lot='';
                        app.re_process='';
                      
                        app.re_start='';
                        app.re_finish='';
                        app.re_opera='';
                        app.re_reason='';
                        app.hidden_id='';
                        alert(res.data.message);
                        window.location.reload();
                    })
                }
               
            }
       },
       fetchData(id){
           axios.post('../control/actionrework.php',{
               actions: 'fetchSingle',
               id: id
           }).then(res => {
                app.bin_no= res.data.bin_no;
                app.product_code= res.data.product_code;
                app.product_lot= res.data.product_lot;
                app.re_process= res.data.re_process;
               
                app.re_start=res.data.re_start.replace(" ","T");
                app.re_finish=res.data.re_finish.replace(" ","T");
                app.re_opera=res.data.re_opera;
                app.re_reason=res.data.re_reason;
               app.hidden_id = res.data.id;
               app.myModal = true;
               app.actionButton = 'Update';
               app.dynamicTitle = 'Edit Product';
           })
       },

       deleteData(id){
           if(confirm('Are you sure you want to delete')){
               axios.post('../control/actionrework.php',{
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
      
           axios.post('../control/actionrework.php', 
           {
               actions: 'callproductlot'
               
           }).then(res => {
               this.prolots = res.data;
           })
   
       },
       callrework()
       {
      
           axios.post('../control/actionrework.php', 
           {
               actions: 'callrework'
               
           }).then(res => {
               this.rework = res.data;
           })
   
       }
     
   
    },
    created() {
        this.fetchAllData();
        this.callproductlot();
        this.callrework();
       
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