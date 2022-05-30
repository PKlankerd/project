let app = new Vue({
    el: '#crudApp',
    data: {
        allData: [],
        after:[],
        time:[],
        filtering: "",
        myModal: false,
        hiddenId: null,
        actionButton: 'Insert',
        dynamicTitle: 'Add data'
    },
    methods: {
        fetchAllData() {
            axios.post('../control/actionafterprocess.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        },
        openModal(){
        app.product_lot='';
        app.start_ex='';
        app.finish_ex='';
        app.opera_ex='';
        app.check_after='';
        app.bin_shift='';
        app.bin_fhshift='';
        app.actionButton='Insert';
        app.dynamicTitle ='Add Data';
        app.myModal = true;
       },
       submitData:function(){
        if(app.product_lot == '')
        {
            alert('กรุณากรอกข้อมูล Production Lot!');

                window.location.reload(); 
        }
        else
        {
            if(app.actionButton == 'Insert'){
                axios.post('../control/actionafterprocess.php',{
                    actions: 'insert',
                    productLot: app.product_lot,
                    startEx: app.start_ex,
                    finishEx: app.finish_ex,
                    operaEx: app.opera_ex,
                    checkAfter: app.check_after,
                    binShift: app.bin_shift,
                    binFhshift:app.bin_fhshift,
            

                }).then(res => {
                    app.myModal = false;
                    app.fetchAllData();
                    app.product_lot='';
                    app.start_ex='';
                    app.finish_ex='';
                    app.opera_ex='';
                    app.check_after='';
                    app.bin_shift='';
                    app.bin_fhshift='';
                    if(res.data.message) alert(res.data.message);   
                    else {alert('กรุณากรอกใหม่ ข้อมูลซ้ำ!');}
                    window.location.reload();
                })
            }         
        
                if(app.actionButton == 'Update'){
                    axios.post('../control/actionafterprocess.php',{
                        actions: 'update',
                        productLot: app.product_lot,
                        startEx: app.start_ex,
                        finishEx: app.finish_ex,
                        operaEx: app.opera_ex,
                        checkAfter : app.check_after,
                        binShift: app.bin_shift,
                        binFhshift:app.bin_fhshift,
                        hiddenId: app.hidden_id
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();
                        app.product_lot='';
                        app.start_ex='';
                        app.finish_ex='';
                        app.opera_ex='';
                        app.check_after='';
                        app.bin_shift='';
                        app.bin_fhshift='';
                        app.hidden_id='';
                        if(res.data.message) alert(res.data.message);   
                        else {alert('กรุณากรอกใหม่ ข้อมูลซ้ำ!');}
                        window.location.reload();
                    })
                }
               
            }
       },
       fetchData(id){
           axios.post('../control/actionafterprocess.php',{
               actions: 'fetchSingle',
               id: id
           }).then(res => {
                app.product_lot= res.data.product_lot;
                app.start_ex= res.data.start_ex.replace(" ","T");
                app.finish_ex= res.data.finish_ex.replace(" ","T");
                app.opera_ex=res.data.opera_ex;
                app.check_after=res.data.check_after;
               
                app.bin_shift=res.data.bin_shift;
               
                app.bin_fhshift=res.data.bin_fhshift;
               app.hidden_id = res.data.id;
               app.myModal = true;
               app.actionButton = 'Update';
               app.dynamicTitle = 'Edit Product';
           })
       },

       deleteData(id){
           if(confirm('Are you sure you want to delete')){
               axios.post('../control/actionafterprocess.php',{
                   actions: 'delete',
                   id: id
               }).then(res => {
                   app.fetchAllData();
                //    alert(res.data.message);
               });
           }
       },
        callafterprocess(){
       
            axios.post('../control/actionafterprocess.php', 
            {
                actions: 'callafterprocess'
                
            }).then(res => {
                this.after = res.data;
            })
        
       },
       calltimeshift(){
       
        axios.post('../control/actionafterprocess.php', 
        {
            actions: 'calltimeshift'
            
        }).then(res => {
            this.time = res.data;
        })
    
   }
   
    },
    created() {
        this.fetchAllData();
        this.callafterprocess();
        this.calltimeshift();
    },
    computed: {
        filteredRows()
        {
        return this.allData.filter(row => 
            {
            
            const productLot = row.Productionlot.toLowerCase();
            // const checkAfter = row.afterprocess.toLowerCase();

            const searchTerm = this.filtering.toLowerCase();

        return (
            
          productLot.includes(searchTerm)      
        //   checkAfter.includes(searchTerm)     
           
               );
            
            });
        }
    }
   
})