let app = new Vue({
    el: '#crudApp',
    data: {
        allData: [],
        prolots: [],
        time:[],
        filtering: "",
        myModal: false,
        hiddenId: null,
        actionButton: 'Insert',
        dynamicTitle: 'Add data'
    },
    methods: {
        fetchAllData() {
            axios.post('../control/actionstatistical.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        },
        openModal(){
        app.bin_no='';
        app.product_code='';
        app.product_lot='';
        app.st_date='';
        app.st_shift='';
        app.st_cripcs='';
        app.st_cridef='';
        app.st_majpcs='';
        app.st_majdef='';
        app.st_minpcs='';
        app.st_mindef='';
        app.st_opera='';
        app.actionButton='Insert';
        app.dynamicTitle ='Add Data';
        app.myModal = true;
       },
       submitData:function()
       {
       
        if(app.product_lot == '' || app.st_date == '' || app.st_shift == '' || app.st_cripcs == '' || app.st_cridef == '' || 
        app.st_majpcs == '' || app.st_majdef == '' || app.st_minpcs == '' || app.st_mindef == '' ||  app.st_opera == '')
        {
            alert('กรุณากรอกข้อมูล Statistical-test1 ให้ครบ!');

                window.location.reload(); 
        }
        else
        {
            if(app.actionButton == 'Insert'){
                axios.post('../control/actionstatistical.php',{
                    actions: 'insert',
                    productLot: app.product_lot,
                    stDate: app.st_date,
                    stShift: app.st_shift,
                    stCripcs: app.st_cripcs,
                    stCridef: app.st_cridef,
                    stMajpcs: app.st_majpcs,
                    stMajdef: app.st_majdef,
                    stMinpcs: app.st_minpcs,
                    stMindef: app.st_mindef,
                    stOpera: app.st_opera,
                   
                }).then(res => {
                    app.myModal = false;
                    app.fetchAllData();
                    app.product_lot='';
                    app.st_date='';
                    app.st_shift='';
                    app.st_cripcs='';
                    app.st_cridef='';
                    app.st_majpcs='';
                    app.st_majdef='';
                    app.st_minpcs='';
                    app.st_mindef='';
                    app.st_opera='';
                    if(res.data.message) alert(res.data.message);   
                    else {alert('กรุณากรอกใหม่ ข้อมูลซ้ำ หรือ ไม่มี!');}
                    window.location.reload();
                })
            }
        }     
                if(app.actionButton == 'Update')
                {
                    if(app.st_date == '' || app.st_shift == '' || app.st_cripcs == '' || app.st_cridef == '' || 
                    app.st_majpcs == '' || app.st_majdef == '' || app.st_minpcs == '' || app.st_mindef == '' ||
                    app.st_opera == '')
                    {
                        // alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');

                        // window.location.reload();
                    }
                    else
                    {
                            axios.post('../control/actionstatistical.php',{
                                actions: 'update',
                                productLot: app.product_lot,
                                stDate: app.st_date,
                                stShift: app.st_shift,
                                stCripcs: app.st_cripcs,
                                stCridef: app.st_cridef,
                                stMajpcs: app.st_majpcs,
                                stMajdef: app.st_majdef,
                                stMinpcs: app.st_minpcs,
                                stMindef: app.st_mindef,
                                stOpera: app.st_opera,
                                hiddenId: app.hidden_id
                            }).then(res => {
                                app.myModal = false;
                                app.fetchAllData();
                            
                                app.product_lot='';
                                app.st_date='';
                                app.st_shift='';
                                app.st_cripcs='';
                                app.st_cridef='';
                                app.st_majpcs='';
                                app.st_majdef='';
                                app.st_minpcs='';
                                app.st_mindef='';
                                app.st_opera='';
                                app.hidden_id='';
                                alert(res.data.message);
                                window.location.reload();
                            })
                    }
                }
    },
       fetchData(id){
           axios.post('../control/actionstatistical.php',{
               actions: 'fetchSingle',
               id: id
           }).then(res => {
 
                app.product_lot= res.data.product_lot;
                app.st_date=res.data.st_date.replace(" ","T");
                app.st_shift=res.data.st_shift;
                app.st_cripcs=res.data.st_cripcs;
                app.st_cridef=res.data.st_cridef;
                app.st_majpcs=res.data.st_majpcs;
                app.st_majdef=res.data.st_majdef;
                app.st_minpcs=res.data.st_minpcs;
                app.st_mindef=res.data.st_mindef;
                app.st_opera=res.data.st_opera;
               app.hidden_id = res.data.id;
               app.myModal = true;
               app.actionButton = 'Update';
               app.dynamicTitle = 'Edit Product';
           })
       },

       deleteData(id){
           if(confirm('Are you sure you want to delete')){
               axios.post('../control/actionstatistical.php',{
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
       
            axios.post('../control/actionstatistical.php', 
            {
                actions: 'callproductlot'
                
            }).then(res => {
                this.prolots = res.data;
            })
    
        },
        calltimeshift(){
       
            axios.post('../control/actionstatistical.php', 
            {
                actions: 'calltimeshift'
                
            }).then(res => {
                this.time = res.data;
            })
        
       }
     
       
   
    },
    created() {
        this.fetchAllData();
        this.callproductlot();
        this.calltimeshift();
       
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
        },
 

    }
   
})