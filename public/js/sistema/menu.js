var app = new Vue({
    el:'#contenido',
    data: {
        busqueda:'',
        padres:{},
        menus:{},
        total_menus:'',
        offset:4,
        menu:{
            id:'',
            nombre:'',
            ruta:'',
            icono:'',
            padre_id:'',
            orden:'',
            padre:[],
            estado:1
        },
        errores:[],
    },
    computed: {
        isActived() {
            return this.menus.current_page;
        },
        pagesNumber() {
            if (!this.menus.to) {
                return [];
            }
            var from = this.menus.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.menus.last_page) {
                to = this.menus.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    methods: {
        listarPadres() {
            axios.get('/menu/padres').then(({ data }) => (
               this.padres = data
            )) 
        },
        listar() {
            axios.get('/menu/lista').then(({ data }) => (
               this.menus = data,
               this.total_menus = this.menus.total
            )) 
        },
        getResults(page=1) {   
            axios.get('/menu/lista?page=' + page)
            .then(response => {
                this.menus = response.data
                this.total_menus = this.menus.total
            });       
        },
        changePage(page) {
            this.menus.current_page = page
            this.getResults(page)
        },
        limpiar() {
            this.errores=[]
            this.menu.id = ''
            this.menu.nombre= ''
            this.menu.ruta=''
            this.menu.icono=''
            this.menu.padre_id=''
            this.menu.orden=''
            this.menu.estado=1
        },
        nuevo() {
            this.limpiar()
            $('#modelo').modal('show')
        },
        guardar() {
            axios.post('/menu/guardar',this.menu)
                .then((response) => (
                    swal.fire({
                        type : 'success',
                        title : 'MENÚS',
                        text : response.data.mensaje,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor:"#1abc9c",
                    }).then(respuesta => {
                        if(respuesta.value) {
                            $('#modelo').modal('hide'),
                            this.listar(),
                            this.getResults()
                        }
                    })
                ))
                .catch((errors) => {
                    if(response = errors.response) {
                        this.errores = response.data.errors,
                        console.clear()
                    }
                })
        },
        mostrar(id) {
            this.limpiar()
            axios.get('/menu/mostrar',{params:{id:id}})
            .then((response) => {
                let men = response.data
                this.menu.id =  men.id
                this.menu.nombre = men.nombre
                this.menu.ruta = men.ruta
                this.menu.estado = men.estado
                this.menu.icono = men.icono
                this.menu.padre_id = men.padre_id
                $('#modelo-show').modal('show')
            })
        },
        editar(id) {
            this.limpiar()
            axios.get('/menu/mostrar',{params:{id:id}})
            .then((response) => {
                let men = response.data
                this.menu.id =  men.id
                this.menu.nombre = men.nombre
                this.menu.ruta = men.ruta
                this.menu.estado = men.estado
                this.menu.icono = men.icono
                this.menu.padre_id = men.padre_id
                $('#modelo-edit').modal('show')
            })
        },
        actualizar() {
            axios.put('/menu/actualizar',this.menu)
                .then((response) => (
                    swal.fire({
                        type : 'success',
                        title : 'Menús',
                        text : response.data.mensaje,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor:"#1abc9c",
                    }).then(respuesta => {
                        if(respuesta.value) {
                            this.listar()
                            this.getResults()
                            $('#modelo-edit').modal('hide')
                        }
                    })
                ))
                .catch((errors) => {
                    if(response = errors.response) {
                        this.errores = response.data.errors
                        //console.clear()
                    }
                })
        },
        eliminar(id) {
            swal.fire({
                title:"¿Está Seguro de Eliminar?",
                text:'No podrás revertirlo',
                type:"question",
                showCancelButton: true,
                confirmButtonText:"Si",
                confirmButtonColor:"#38c172",
                cancelButtonText:"No",
                cancelButtonColor:"#e3342f"
            }).then( response => {
                if(response.value){
                    axios.post('/menu/eliminar',{id:id})
                    .then((response) => (
                        swal.fire({
                            type : 'success',
                            title : 'Menú',
                            text : response.data.mensaje,
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor:"#1abc9c",
                        }).then(respuesta => {
                            if(respuesta.value) {
                                this.listar(),
                                this.getResults()
                            }
                        })
                    ))
                    .catch((errors) => {
                        if(response = errors.response) {
                            this.errores = response.data.errors
                        }
                    })
                }
            }).catch(error => {
                this.$Progress.fail()
                swal.showValidationError(
                    `Ocurrió un Error: ${error.response.status}`
                )
            })
        },
        buscar() {

        }
    },
    created() {
        this.listarPadres()
        this.listar()
        this.getResults()
    },
})