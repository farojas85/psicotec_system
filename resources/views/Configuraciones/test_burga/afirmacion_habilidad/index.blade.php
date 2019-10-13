<div class="row">
    <div class="col-sm-5">
        <div class="card"  style="border:1px solid #4fc6e1 !important">
            <div class="card-header bg-info py-2 text-white">
                <h5 class="card-title mb-0 text-white">Habilidades Sociales</h5>
            </div>
            <div id="cardCollpase6" class="collapse show">
                <div class="card-body">
                    <div class="nav flex-column nav-pills nav-pills-tab" id="v-pills-tab" role="tablist" 
                            aria-orientation="vertical">
                        <a class="nav-link mb-2" v-if="total_habilidad>0" v-for="hab in habilidad_socials" :key="hab.id" 
                            :class="{'show active' : hab.id == 1 }"
                            href="#" data-toggle="pill" @click="listarAfirmacionesHabilidad(hab.id)">
                            @{{hab.nombre}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="col-sm-7">
        @include('Configuraciones.test_burga.afirmacion_habilidad.afirmaciones')
    </div>
</div>