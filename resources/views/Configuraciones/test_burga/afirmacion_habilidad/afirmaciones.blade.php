<div class="card" style="border:1px solid #f1556c !important">
    <div class="card-header bg-danger py-2 text-white">
        <h5 class="card-title mb-0 text-white" v-if="afirmacion_habilidad.nombre_habilidad">
            afirmaciones Para:... @{{afirmacion_habilidad.nombre_habilidad}}
        </h5>
    </div>
    <div id="cardCollpase4" class="collapse show">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-white" width="5px">Nro.</th>
                            <th class="text-white">Afirmaci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="total_afirmacion==0"></tr>
                        <tr v-else v-for="afir in afirmaciones" :key="afir.id">
                            <td>@{{afir.id}}</td>
                            <td>
                                <label>
                                    <input type="checkbox" v-model="afirmacion_habilidad.burga_afirmacion_id" :value="afir.id">
                                    @{{ afir.nombre }}
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-content pt-0" id="tab-contenido">
                <div class="row container-fluid text-center">
                    <button type="button" class="btn btn-success" @click="guardar"> 
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>