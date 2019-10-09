var app = new Vue({
    el:'#contenido',
    data:{
        habilidadSocials:{},
        total_habilidadSocial:'',
        habilidad_social:{
            id:'',
            nombre:'',
            descripcion:'',
            estado:'',
        },
        estiloAprendizajes:{},
        total_aprendizajes:'',
        estilo_aprendizaje:{
            id:'',
            nombre:'',
            descripcion:'',
            estado:''
        },
        showdeletes:false,
        showdeletes_estilo:false,
        errores:[],
        offset:4
    },
    computed: {
        isActivedHabilidad() {
            return this.habilidadSocials.current_page;
        },
        pagesNumberHabilidad() {
            if (!this.habilidadSocials.to) {
                return [];
            }
            var from = this.habilidadSocials.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.habilidadSocials.last_page) {
                to = this.habilidadSocials.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },
        isActivedEstilo() {
            return this.estiloAprendizajes.current_page;
        },
        pagesNumberEstilo() {
            if (!this.estiloAprendizajes.to) {
                return [];
            }
            var from = this.estiloAprendizajes.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.estiloAprendizajes.last_page) {
                to = this.estiloAprendizajes.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    methods:{
        listarHabilidades() {
            axios.get('/habilidad-social/lista').then(({ data }) => (
                this.habilidadSocials = data,
                this.total_habilidadSocial = this.habilidadSocials.total
             ))
        },
        getResultsHabilidades(page=1) {   
            if(this.showdeletes == false) {
                axios.get('/habilidad-social/lista?page=' + page)
                .then(response => {
                    this.habilidadSocials = response.data
                    this.total_habilidadSocial = this.habilidadSocials.total
                }); 
            }
            else {
                axios.get('/habilidad-social/mostrarEliminados?page=' + page)
                .then(response => {
                    this.habilidadSocials = response.data
                    this.total_habilidadSocial = this.habilidadSocials.total
                });
            }
        },
        changePageHabilidades(page) {
            this.habilidadSocials.current_page = page
            this.getResultsHabilidades(page)
        },
        limpiar(tabla){
            this.errores=[]
            switch(tabla){
                case 'habilidad-social':
                    this.habilidad_social.id=''
                    this.habilidad_social.nombre=''
                    this.habilidad_social.descripcion=''
                    this.habilidad_social.estado=''
                    break
                case 'estilo-aprendizaje':
                    this.estilo_aprendizaje.id=''
                    this.estilo_aprendizaje.nombre=''
                    this.estilo_aprendizaje.descripcion=''
                    this.estilo_aprendizaje.estado=''
                    break
            }
        },
        nuevaHabilidadSocial()
        {
            this.limpiar('habilidad-social')
            $('#habilidad-create').modal('show')
        },
        guardarHabilidadSocial() {
            axios.post('/habilidad-social/guardar',this.habilidad_social)
                .then((response) => (
                    swal.fire({
                        type : 'success',
                        title : 'Habilidades Sociales',
                        text : response.data.mensaje,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor:"#1abc9c",
                    }).then(respuesta => {
                        if(respuesta.value) {
                            $('#habilidad-create').modal('hide'),
                            this.listarHabilidades(),
                            this.getResultsHabilidades()
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
        mostrarHabilidadSocial(id) {
            this.limpiar('habilidad-social')
            axios.get('/habilidad-social/mostrar',{params:{id:id}})
            .then((response) => {
                let men = response.data
                this.habilidad_social.id =  men.id
                this.habilidad_social.nombre = men.nombre
                this.habilidad_social.descripcion = men.descripcion
                this.habilidad_social.estado = men.estado
                $('#habilidad-show').modal('show')
            })
        },
        editarHabilidadSocial(id) {
            this.limpiar('habilidad-social')
            axios.get('/habilidad-social/mostrar',{params:{id:id}})
            .then((response) => {
                let men = response.data
                this.habilidad_social.id =  men.id
                this.habilidad_social.nombre = men.nombre
                this.habilidad_social.descripcion = men.descripcion
                this.habilidad_social.estado = men.estado
                $('#habilidad-edit').modal('show')
            })
        },
        actualizarHabilidadSocial() {
            axios.put('/habilidad-social/actualizar',this.habilidad_social)
                .then((response) => (
                    swal.fire({
                        type : 'success',
                        title : 'Habilidad Social',
                        text : response.data.mensaje,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor:"#1abc9c",
                    }).then(respuesta => {
                        if(respuesta.value) {
                            this.listarHabilidades(),
                            this.getResultsHabilidades()
                            $('#habilidad-edit').modal('hide')
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
        eliminarHabilidadSocial(id) {
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
                    axios.post('/habilidad-social/eliminar',{id:id})
                    .then((response) => (
                        swal.fire({
                            type : 'success',
                            title : 'Menú',
                            text : response.data.mensaje,
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor:"#1abc9c",
                        }).then(respuesta => {
                            if(respuesta.value) {
                                this.listarHabilidades(),
                                this.getResultsHabilidades()
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
        mostrarEliminadosHabilidadSocial()
        {
            this.showdeletes = true
            axios.get('/habilidad-social/mostrarEliminados').then(({ data }) => (
                this.habilidadSocials = data,
                this.total_habilidadSocial = this.habilidadSocials.total
            ))
            this.getResultsHabilidades()
        },
        restaurarHabilidadSocial(id) {
            swal.fire({
                title:"¿Está Seguro de Restaurar el Registro?",
                text:'No podrás revertirlo',
                type:"question",
                showCancelButton: true,
                confirmButtonText:"Si",
                confirmButtonColor:"#38c172",
                cancelButtonText:"No",
                cancelButtonColor:"#e3342f"
            }).then( response => {
                if(response.value){
                    axios.post('/habilidad-social/restaurar',{id:id})
                    .then((response) => (
                        swal.fire({
                            type : 'success',
                            title : 'Habilidad Social',
                            text : response.data.mensaje,
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor:"#1abc9c",
                        }).then(respuesta => {
                            if(respuesta.value) {
                                this.showdeletes = false;
                                this.listarHabilidades(),
                                this.getResultsHabilidades()
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
        listarEstilos() {
            axios.get('/estilo-aprendizaje/lista').then(({ data }) => (
                this.estiloAprendizajes = data,
                this.total_aprendizajes = this.estiloAprendizajes.total
             ))
        },
        getResultsEstilos(page=1) {   
            if(this.showdeletes_estilo == false) {
                axios.get('/estilo-aprendizaje/lista?page=' + page)
                .then(response => {
                    this.estiloAprendizajes = response.data
                    this.total_aprendizajes = this.estiloAprendizajes.total
                }); 
            }
            else {
                axios.get('/estilo-aprendizaje/mostrarEliminados?page=' + page)
                .then(response => {
                    this.estiloAprendizajes = response.data
                    this.total_aprendizajes = this.estiloAprendizajes.total
                });
            }
        },
        changePageEstilos(page) {
            this.estiloAprendizajes.current_page = page
            this.getResultsEstilos(page)
        },
        nuevoEstiloAprendizaje() {
            this.limpiar('estilo-aprendizaje')
            $('#estilo-create').modal('show')
        },
        guardarEstiloAprendizaje() {

        },
        mostrarEliminadosEstiloAprendizaje() {

        }

    },
    created() {
        this.listarHabilidades()
        this.getResultsHabilidades()
        this.listarEstilos()
        this.getResultsEstilos()
    }
})