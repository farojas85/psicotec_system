var app = new Vue({
    el:'#contenido',
    data: {
        menus:{},
        roles:{},
        menu_role:{
            role_id:'',
            menu_id:[]
        }
    },
    computed:{

    },
    methods:{
        listarMenus() {
            axios.get('/menu-role/listar').then(({ data }) => (
                this.menus = data
            )) 
        },
        listarRoles() {
            axios.get('/role/filtro').then(({ data }) => (
                this.roles = data
            ))
        },
        listarMenuRole(id) {
            this.menu_role.role_id = id
            axios.get('/menu-role/listarMenuRoles',{params: {id: id}})
                .then((response ) => {
                    let menus =response.data
                    this.menu_role.menu_id = []
                    if(menus.length >0 )
                    {                        
                        if(menus[0].menus.length > 0)
                        {
                            for(let i=0; i<menus[0].menus.length; i++)
                            {
                                this.menu_role.menu_id.push(menus[0].menus[i].id)
                            }
                        }
                    }
                })
        },
        guardar()
        {
            axios.post('/menu-role/guardar',this.menu_role)
                .then((response) => (
                    swal.fire({
                        type : 'success',
                        title : 'MENÚS',
                        text : response.data.mensaje,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor:"#1abc9c",
                    }).then(respuesta => {
                        if(respuesta.value) {
                            this.listarMenuRole(this.menu_role.role_id)
                        }
                    })
                ))
                .catch((errors) => {
                    if(response = errors.response) {
                        this.errores = response.data.errors,
                        console.clear()
                    }
                })
        }
    },
    created() {
        this.listarMenus()
        this.listarRoles()
        this.listarMenuRole(1)
    }
})