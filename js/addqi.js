let app = new Vue({
    el: '#crudApp',
    data: {
        allData: [],
        prolots: [],
        status:[],
        filtering: "",
        myModal: false,
        hiddenId: null,
        actionButton: 'Insert',
        dynamicTitle: 'Add data'
    },
    methods: {
        fetchAllData() {
            axios.post('../control/actionqi.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        },
        openModal(){
        app.product_lot='';
        app.st_status='';
        app.st_reject='';
        app.st_good='';
        app.nd_status='';
        app.nd_reject='';
        app.nd_good='';
        app.total_qty='';
        app.actionButton='Insert';
        app.dynamicTitle ='Add Data';
        app.myModal = true;
       },
       submitData:function(){
        if(app.product_lot == ''  )
        {
            alert('กรุณากรอกข้อมูล Production Lot!');
            window.location.reload(); 
        }
         else
        {
            if(app.actionButton == 'Insert'){
                axios.post('../control/actionqi.php',{
                    actions: 'insert',
                    productLot: app.product_lot,
                    stStatus: app.st_status,
                    stReject: app.st_reject,
                    stGood: app.st_good,
                    ndStatus: app.nd_status,
                    ndReject: app.nd_reject,
                    ndGood: app.nd_good,
                    totalQty: app.total_qty,
                   
                }).then(res => {
                    app.myModal = false;
                    app.fetchAllData();
                    app.product_lot='';
                    app.st_status='';
                    app.st_reject='';
                    app.st_good='';
                    app.nd_status='';
                    app.nd_reject='';
                    app.nd_good='';
                    app.total_qty='';
                    if(res.data.message) alert(res.data.message);   
                    else {alert('กรุณากรอกใหม่');}
                    window.location.reload();
                })
            }
        }               
                if(app.actionButton == 'Update')
            {
                    if(app.st_status == '' || app.st_reject == '' || app.st_good == '' ||  app.total_qty == '' )
                    {
                        alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');

                        window.location.reload();
                    }
                    else
                    {
                    axios.post('../control/actionqi.php',{
                        actions: 'update',
                       
                        productLot: app.product_lot,
                        stStatus: app.st_status,
                        stReject: app.st_reject,
                        stGood: app.st_good,
                        ndStatus: app.nd_status,
                        ndReject: app.nd_reject,
                        ndGood: app.nd_good,
                        totalQty: app.total_qty,
                        hiddenId: app.hidden_id
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();                     
                        app.product_lot='';
                        app.st_status='';
                        app.st_reject='';
                        app.st_good='';
                        app.nd_status='';
                        app.nd_reject='';
                        app.nd_good='';
                        app.total_qty='';
                        app.hidden_id='';
                        alert(res.data.message);
                        window.location.reload();
                    })
                }
            }
       },
       fetchData(id){                         // แก้ไข
           axios.post('../control/actionqi.php',
           {
               actions: 'fetchSingle',
               id: id
           }).then(res => 
            {
              
                app.product_lot= res.data.product_lot;
                app.st_status= res.data.st_status;
                app.st_reject= res.data.st_reject;
                app.st_good= res.data.st_good;
                app.nd_status= res.data.nd_status;
                app.nd_reject= res.data.nd_reject;
                app.nd_good= res.data.nd_good;
                app.total_qty=res.data.total_qty;
                app.hidden_id = res.data.id;
                app.myModal = true;
                app.actionButton = 'Update';
                app.dynamicTitle = 'Edit Data';
           })
       },
       deleteData(id)
       {
           if(confirm('Are you sure you want to delete'))
           {
               axios.post('../control/actionqi.php',
               {
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
            axios.post('../control/actionqi.php', 
            {
                actions: 'callproductlot'
            }).then(res =>
                {
                this.prolots = res.data;
                })   
        },
        callstatus()
        {
            axios.post('../control/actionqi.php', 
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
        this.callstatus();
    },
    computed: 
    {
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