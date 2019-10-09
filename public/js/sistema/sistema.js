
var app= new Vue({
    el: '#contenido',
    data: {
        roles:{},
        total_roles:'',
        offset: 4,
        usuarios:{},
    },
    computed: {
        // isActivedRole() {
        //     return this.roles.current_page;
        // },
        // pagesNumberRole() {
        //     if (!this.roles.to) {
        //         return [];
        //     }
        //     var from = this.roles.current_page - this.offset;
        //     if (from < 1) {
        //         from = 1;
        //     }
        //     var to = from + (this.offset * 2);
        //     if (to >= this.roles.last_page) {
        //         to = this.roles.last_page;
        //     }
        //     var pagesArray = [];
        //     while (from <= to) {
        //         pagesArray.push(from);
        //         from++;
        //     }
        //     return pagesArray;
        // }
    },
    methods:{        
        vistaRoles(){
            this.listarRoles()         
            axios.get('/role').then(({ data }) => (
                $('.tab-content').html(data)
            ))
        },
        vistaUsuario(){
            axios.get('/usuario').then(({ data }) => (
               $('.tab-content').html(data)
             ))
        },
        listarRoles() {
            axios.get('/role/lista').then(({ data }) => (
               this.roles = data,
               this.total_roles = this.roles.total
            )) 
        },
        // getResultsRoles(page=1) {   
        //     axios.get('/role/lista?page=' + page)
        //     .then(response => {
        //         this.roles = response.data
        //         this.total_roles = this.roles.total
        //     });       
        // },
        // changePageRoles(page) {
        //     this.roles.current_page = page;
        //     this.getResultsRoles(page)
        // }
    },
    created() {
        this.listarRoles()
        //this.getResultsRoles()
    },
})