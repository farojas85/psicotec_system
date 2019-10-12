var app = new Vue({
    el:'#contenido',
    data:{
        offset:4,
        errores:[],
        burga_alternativa:{
            id:'',
            nombre:''
        },
        burga_alternativas:[],
        total_burga_alternativas:'',
        showdeletes_burga_alternativa:false
    },
    computed:{
        isActivedBurgaAlt() {
            return this.burga_alternativas.current_page;
        },
        pagesNumberBurgaAlt() {
            if (!this.burga_alternativas.to) {
                return [];
            }
            var from = this.burga_alternativas.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.burga_alternativas.last_page) {
                to = this.burga_alternativas.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        },
    },
    methods:{
        listarAlternativas() {
            axios.get('/burga-alternativa/lista').then(({ data }) => (
                this.burga_alternativas = data,
                this.total_burga_alternativas = this.burga_alternativas.total
             ))
        },
        getResultsAlternativas(page=1) {   
            if(this.showdeletes_burga_alternativa == false) {
                axios.get('/burga-alternativa/lista?page=' + page)
                .then(response => {
                    this.burga_alternativas = response.data
                    this.total_burga_alternativas = this.burga_alternativas.total
                }); 
            }
            else {
                axios.get('/burga-alternativa/mostrarEliminados?page=' + page)
                .then(response => {
                    this.burga_alternativas = response.data
                    this.total_burga_alternativas = this.burga_alternativas.total
                });
            }
        },
        changePageburgaAlt(page) {
            this.burga_alternativas.current_page = page
            this.getResultsAlternativas(page)
        },
        limpiar(tabla){
            this.errores=[]
            switch(tabla){
                case 'burga-alternativa':
                    this.burga_alternativa.id=''
                    this.burga_alternativa.nombre=''
                    this.burga_alternativa.estado=''
                    break
                case 'estilo-aprendizaje':
                    this.estilo_aprendizaje.id=''
                    this.estilo_aprendizaje.nombre=''
                    this.estilo_aprendizaje.descripcion=''
                    this.estilo_aprendizaje.estado=''
                    break
                case 'area':
                    this.area.id=''
                    this.area.siglas=''
                    this.area.nombre=''
                    this.area.estado=''
                    break
                case 'personalidad':
                    this.personalidad.id=''
                    this.personalidad.codigo=''
                    this.personalidad.nombre=''
                    this.personalidad.estado=''
                case 'ocupacion': 
                    this.ocupacion.id=''
                    this.ocupacion.nombre=''
                    this.ocupacion.area_id=''
                    this.ocupacion.personalidad_id=''
                    this.ocupacion.estado=''
            }
        },
        nuevaAlternativa()
        {
            this.limpiar('burga-alternativa')
            $('#alternativa-create').modal('show')
        },
        guardarAlternativa() {
            axios.post('/burga-alternativa/guardar',this.burga_alternativa)
                .then((response) => (
                    swal.fire({
                        type : 'success',
                        title : 'Burga Alternativas',
                        text : response.data.mensaje,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor:"#1abc9c",
                    }).then(respuesta => {
                        if(respuesta.value) {
                            $('#alternativa-create').modal('hide'),
                            this.listarAlternativas(),
                            this.getResultsAlternativas()
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
        mostrarAlternativa(id) {
            this.limpiar('burga-alternativa')
            axios.get('/burga-alternativa/mostrar',{params:{id:id}})
            .then((response) => {
                let men = response.data
                this.burga_alternativa.id =  men.id
                this.burga_alternativa.nombre = men.nombre
                $('#alternativa-show').modal('show')
            })
        },
        editarAlternativa(id) {
            this.limpiar('burga-alternativa')
            axios.get('/burga-alternativa/mostrar',{params:{id:id}})
            .then((response) => {
                let men = response.data
                this.burga_alternativa.id =  men.id
                this.burga_alternativa.nombre = men.nombre
                $('#alternativa-edit').modal('show')
            })
        },
        actualizarAlternativa() {
            axios.put('/burga-alternativa/actualizar',this.burga_alternativa)
                .then((response) => (
                    swal.fire({
                        type : 'success',
                        title : 'Alternativa',
                        text : response.data.mensaje,
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor:"#1abc9c",
                    }).then(respuesta => {
                        if(respuesta.value) {
                            this.listarAlternativas(),
                            this.getResultsAlternativas()
                            $('#alternativa-edit').modal('hide')
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
        eliminarAlternativa(id) {
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
                    axios.post('/burga-alternativa/eliminar',{id:id})
                    .then((response) => (
                        swal.fire({
                            type : 'success',
                            title : 'Alternativa',
                            text : response.data.mensaje,
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor:"#1abc9c",
                        }).then(respuesta => {
                            if(respuesta.value) {
                                this.listarAlternativas(),
                                this.getResultsAlternativas()
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
        mostrarEliminadosAlternativa() {
            this.showdeletes_burga_alternativa = true
            axios.get('/burga-alternativa/mostrarEliminados').then(({ data }) => (
                this.burga_alternativas = data,
                this.total_burga_alternativas = this.burga_alternativas.total
            ))
            this.getResultsAlternativas()
        },
        mostrarActivosAlternativa() {
            this.showdeletes_burga_alternativa=false;
            this.listarAlternativas()
            this.getResultsAlternativas()
        },
        restaurarAlternativa(id) {
            swal.fire({
                title:"¿Está Seguro de Restaurar el Registro?",
                text:'Puede Eliminarlo Cuando desee',
                type:"question",
                showCancelButton: true,
                confirmButtonText:"Si",
                confirmButtonColor:"#38c172",
                cancelButtonText:"No",
                cancelButtonColor:"#e3342f"
            }).then( response => {
                if(response.value){
                    axios.post('/burga-alternativa/restaurar',{id:id})
                    .then((response) => (
                        swal.fire({
                            type : 'success',
                            title : 'Alternativas',
                            text : response.data.mensaje,
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor:"#1abc9c",
                        }).then(respuesta => {
                            if(respuesta.value) {
                                this.showdeletes_burga_alternativa = false;
                                this.listarAlternativas(),
                                this.getResultsAlternativas()
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
    },
    created() {
        this.listarAlternativas()
        this.getResultsAlternativas()
    }
})