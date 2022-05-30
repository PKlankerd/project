let app = new Vue({
    el: '#crudApp',
    data: {
        allData: [],
        filtering: "",
        myModal: false,
        hiddenId: null,
        actionButton: 'Insert',
        dynamicTitle: 'Add data'
    },
    methods: {
        fetchAllData() {
            axios.post('../control/actioncolor.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        },
        openModal(){
        app.glove_color='';
    
        app.actionButton='Insert';
        app.dynamicTitle ='Add Data';
        app.myModal = true;
       },
       submitData:function(){
            if(app.glove_color == '')
            {
                alert('กรุณากรอกข้อมูล สีให้ถูกต้อง');

                window.location.reload();
            }
            else
            {
                if(app.actionButton == 'Insert'){
                    axios.post('../control/actioncolor.php',{
                        actions: 'insert',
                        gloveColor: app.glove_color
                        
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();
                        app.glove_color = '';
                
                        alert(res.data.message);
                        window.location.reload();
                    })
                }
                if(app.actionButton == 'Update'){
                    axios.post('../control/actioncolor.php',{
                        actions: 'update',
                        gloveColor: app.glove_color,
                        hiddenId: app.hidden_id
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();
                        app.glove_color = '';
                        app.hiddenId = '';
                        // alert(res.data.message);
                        window.location.reload();
                    })
                }
            }
       },

       fetchData(id){
           axios.post('../control/actioncolor.php',{
               actions: 'fetchSingle',
               id: id
           }).then(res => {
               app.glove_color = res.data.glove_color;
               app.hidden_id = res.data.id;
               app.myModal = true;
               app.actionButton = 'Update';
               app.dynamicTitle = 'Edit Product';
           })
       },
       deleteData(id){
           if(confirm('Are you sure you want to delete')){
               axios.post('../control/actioncolor.php',{
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
            const gloveColor = row.color.toLowerCase();
            // const productName = row.productname.toLowerCase();
            // const useremail = row.email.toLowerCase();
            // const userphone = row.phone.toLowerCase();
            // const userdept = row.dept_desc.toLowerCase();
            // const userperm = row.perm_desc.toLowerCase();

            const searchTerm = this.filtering.toLowerCase();

        return (
            gloveColor.includes(searchTerm)  
            // productName.includes(searchTerm)  
                // useremail.includes(searchTerm) 
                // userphone.includes(searchTerm) 
                //  userdept.includes(searchTerm) || 
                //  userperm.includes(searchTerm)
              );
            });
        }
    }
})