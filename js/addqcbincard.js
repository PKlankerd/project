let app = new Vue({
    el: '#crudApp',
    data: {
        allData: [],
        prolots: [],
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
            axios.post('../control/actionqcbincard.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        },
        openModal(){
        app.product_lot='';
        app.start_ex='';
        app.finish_ex='';
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
                axios.post('../control/actionqcbincard.php',{
                    actions: 'insert',
                    productLot: app.product_lot,
                    startEx: app.start_ex,
                    finishEx: app.finish_ex,
                    checkAfter: app.check_after,
                    binShift: app.bin_shift,
                    binFhshift:app.bin_fhshift,
           

                }).then(res => {
                    app.myModal = false;
                    app.fetchAllData();
                    app.product_lot='';
                    app.start_ex='';
                    app.finish_ex='';
                    app.check_after='';
                    app.bin_shift='';
                    app.bin_fhshift='';
                    if(res.data.message) alert(res.data.message);   
                    else {alert('กรุณากรอกใหม่');}
                    window.location.reload();
                })
            }
            
        }
        
                if(app.actionButton == 'Update')
            {
                if(app.start_ex == '' || app.bin_shift == '' )
                    {
                        alert('กรุณากรอกข้อมูล StartDate && Shift');

                        window.location.reload();
                    }
                   
                    else
                    {
                        axios.post('../control/actionqcbincard.php',{
                            actions: 'update',
                            productLot: app.product_lot,
                            startEx: app.start_ex,
                            finishEx: app.finish_ex,
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
                            app.check_after='';
                            app.bin_shift='';
                            app.bin_fhshift='';
                            app.hidden_id='';
                            alert(res.data.message);
                            window.location.reload();
                        })
                    }              
            }
       },
       fetchData(id){
           axios.post('../control/actionqcbincard.php',{
               actions: 'fetchSingle',
               id: id
           }).then(res => {
              
                app.product_lot= res.data.product_lot;
                app.start_ex= res.data.start_ex.replace(" ","T");
                app.finish_ex= res.data.finish_ex.replace(" ","T");
                app.check_after=res.data.check_after;
                app.bin_shift=res.data.bin_shift;
                app.bin_fhshift=res.data.bin_fhshift;
               app.hidden_id = res.data.id;
               app.myModal = true;
               app.actionButton = 'Update';
               app.dynamicTitle = 'Edit Data';
           })
       },

       deleteData(id){
           if(confirm('Are you sure you want to delete')){
               axios.post('../control/actionqcbincard.php',{
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
       
            axios.post('../control/actionqcbincard.php', 
            {
                actions: 'callproductlot'
                
            }).then(res => {
                this.prolots = res.data;
            })
    
        },
        callafterprocess(){
       
            axios.post('../control/actionqcbincard.php', 
            {
                actions: 'callafterprocess'
                
            }).then(res => {
                this.after = res.data;
            })
        
       },
       calltimeshift(){
       
        axios.post('../control/actionqcbincard.php', 
        {
            actions: 'calltimeshift'
            
        }).then(res => {
            this.time = res.data;
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
        this.callproductlot();
        this.callafterprocess();
        this.calltimeshift();
    },
    computed: {
        filteredRows()
        {
        return this.allData.filter(row => 
            {
            
            const productLot = row.Productionlot.toLowerCase();
            

            const searchTerm = this.getJulianDate();

        return (
            
            productLot.includes(searchTerm)      
          
               );
            
            });
        },
        filteredRowsEdit()
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