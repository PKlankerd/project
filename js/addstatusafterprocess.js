let app = new Vue({
    el: '#crudApp',
    data: {
        allData: [],
        filtering: "",
        myModal: false,
        hiddenId: null,
        actionButton: 'Insert',
        dynamicTitle: 'Add Product'
    },
    methods: {
        fetchAllData() {
            axios.post('../control/actionstatusafter.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        },
        openModal(){
        app.status_after='';
        app.actionButton='Insert';
        app.dynamicTitle ='Add Product';
        app.myModal = true;
       },
       submitData:function(){
            if(app.status_after == '' )
            {
                     
                alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');

                window.location.reload();
            }
            else
            {  
                if(app.actionButton == 'Insert'){
                    axios.post('../control/actionstatusafter.php',{
                        actions: 'insert',
                        statusAfter: app.status_after,
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();
                        app.status_after='';
                        // if(res.data.message) alert(res.data.message);   
                        // else {alert('กรุณากรอกใหม่ ข้อมูลซ้ำ!');}
                        window.location.reload();
                    })
                }
                if(app.actionButton == 'Update'){
                    axios.post('../control/actionstatusafter.php',{
                        actions: 'update',
                        statusAfter: app.status_after,
                        hiddenId: app.hidden_id
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();
                        app.status_after='';
                        app.hiddenId = '';
                        alert(res.data.message);
                        window.location.reload();
                    })
                }
            }
       },

       fetchData(id){
           axios.post('../control/actionstatusafter.php',{
               actions: 'fetchSingle',
               id: id
           }).then(res => {
            app.status_after= res.data.status_after;
               app.product_name = res.data.product_name;
               app.hidden_id = res.data.id;
               app.myModal = true;
               app.actionButton = 'Update';
               app.dynamicTitle = 'Edit Product';
           })
       },
       deleteData(id){
           if(confirm('Are you sure you want to delete')){
               axios.post('../control/actionstatusafter.php',{
                   actions: 'delete',
                   id: id
               }).then(res => {
                   app.fetchAllData();
                //    alert(res.data.message);
               });
           }
       }
   
    },
    created() {
        this.fetchAllData();
       
    },
    computed: {
        filteredRows()
        {
        return this.allData.filter(row => 
            {
            const statusAfter = row.status.toLowerCase();
           
           

            const searchTerm = this.filtering.toLowerCase();

        return (
            statusAfter.includes(searchTerm) 
               
              );
            });
        }
    }
})