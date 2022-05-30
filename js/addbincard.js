let app = new Vue({
    el: '#crudApp',
    data: {
        
        prodata:[],
        glovecolor:[],
        machine:[],
        size:[],
        julian: ''
    },
    methods: {
       callproductdata(){
       
            axios.post('../control/actionbincard.php', 
            {
                actions: 'callproductdata'
                
            }).then(res => {
                app.prodata = res.data;
            })
        
       },
       callglovecolor(){
       
        axios.post('../control/actionbincard.php', 
        {
            actions: 'callglovecolor'
            
        }).then(res => {
            app.glovecolor = res.data;
        })
    
        },
        callmachine(){
       
            axios.post('../control/actionbincard.php', 
            {
                actions: 'callmachine'
                
            }).then(res => {
                app.machine = res.data;
            })
        
            },
        callsize(){
       
            axios.post('../control/actionbincard.php', 
            {
                actions: 'callsize'
                    
            }).then(res => {
                app.size = res.data;
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
        
        this.callproductdata();
        this.callglovecolor();
        this.callmachine();
        this.callsize();
    }
    
})