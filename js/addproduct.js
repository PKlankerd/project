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
        fetchAllData() 
        {
            axios.post('../control/actionproductadd.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        },
        openModal(){
        app.product_code='';
        app.product_name='';
        app.actionButton='Insert';
        app.dynamicTitle ='Add Product';
        app.myModal = true;
       },
       submitData:function(){
            if(app.product_code == '' || app.product_name == '')
            {
                alert('กรุณากรอกข้อมูล Product ให้ถูกต้อง');

                window.location.reload();
            }
            else
            {
                if(app.actionButton == 'Insert'){
                    axios.post('../control/actionproductadd.php',{
                        actions: 'insert',
                        productCode: app.product_code,
                        productName: app.product_name
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();
                        app.product_code = '';
                        app.product_name = '';
                        if(res.data.message) alert(res.data.message);   
                        else {alert('กรุณากรอกใหม่ ข้อมูลซ้ำ!');}
                        
                        
                        window.location.reload();
                    })
                }
            
                if(app.actionButton == 'Update'){
                    axios.post('../control/actionproductadd.php',{
                        actions: 'update',
                        productCode: app.product_code,
                        productName: app.product_name,
                        hiddenId: app.hidden_id
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();
                        app.product_code = '';
                        app.product_name = '';
                        app.hiddenId = '';
                        if(res.data.message) alert(res.data.message);   
                        else {alert('กรุณากรอกใหม่ ข้อมูลซ้ำ!');}

                        window.location.reload();
                    })
                }
            }
       },

       fetchData(id){
           axios.post('../control/actionproductadd.php',{
               actions: 'fetchSingle',
               id: id
           }).then(res => {
               app.product_code = res.data.product_code;
               app.product_name = res.data.product_name;
               app.hidden_id = res.data.id;
               app.myModal = true;
               app.actionButton = 'Update';
               app.dynamicTitle = 'Edit Product';
           })
       },
       deleteData(id){
           if(confirm('Are you sure you want to delete')){
               axios.post('../control/actionproductadd.php',{
                   actions: 'delete',
                   id: id
               }).then(res => {
                   app.fetchAllData();
                   alert(res.data.message);
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
            const productCode = row.productcode.toLowerCase();
            const productName = row.productname.toLowerCase();
           

            const searchTerm = this.filtering.toLowerCase();

        return (
            productCode.includes(searchTerm)  ||
            productName.includes(searchTerm)  
             
              );
            });
        }
    }
})