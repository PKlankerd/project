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
            axios.post('../control/actionshell.php', {
                actions: 'fetchall'
                
            }).then(res => {
                app.allData = res.data;
            })
        },
        openModal(){
        app.shell_name='';
    
        app.actionButton='Insert';
        app.dynamicTitle ='Add Data';
        app.myModal = true;
       },
       submitData:function(){
            if(app.shell_name == '')
            {
                   
                alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');

                window.location.reload();
            }
            else
            {
                if(app.actionButton == 'Insert'){
                    axios.post('../control/actionshell.php',{
                        actions: 'insert',
                        shellName: app.shell_name
                        
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();
                        app.shell_name = '';
                
                        // if(res.data.message) alert(res.data.message);   
                        // else {alert('กรุณากรอกใหม่ ข้อมูลซ้ำ!');}
                        window.location.reload();
                    })
                }
                if(app.actionButton == 'Update'){
                    axios.post('../control/actionshell.php',{
                        actions: 'update',
                        shellName: app.shell_name,
                        hiddenId: app.hidden_id
                    }).then(res => {
                        app.myModal = false;
                        app.fetchAllData();
                        app.shell_name = '';
                        app.hiddenId = '';
                        // alert(res.data.message);
                        window.location.reload();
                    })
                }
            }
       },

       fetchData(id){
           axios.post('../control/actionshell.php',{
               actions: 'fetchSingle',
               id: id
           }).then(res => {
               app.shell_name = res.data.shell_name;
               app.hidden_id = res.data.id;
               app.myModal = true;
               app.actionButton = 'Update';
               app.dynamicTitle = 'Edit Product';
           })
       },
       deleteData(id){
           if(confirm('Are you sure you want to delete')){
               axios.post('../control/actionshell.php',{
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
            const shellName = row.shell.toLowerCase();
            // const productName = row.productname.toLowerCase();
            // const useremail = row.email.toLowerCase();
            // const userphone = row.phone.toLowerCase();
            // const userdept = row.dept_desc.toLowerCase();
            // const userperm = row.perm_desc.toLowerCase();

            const searchTerm = this.filtering.toLowerCase();

        return (
            shellName.includes(searchTerm)  
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