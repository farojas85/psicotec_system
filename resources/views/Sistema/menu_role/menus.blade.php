<div class="card" style="border:1px solid #f1556c !important">
    <div class="card-header bg-danger py-2 text-white">
        <h5 class="card-title mb-0 text-white">Card title</h5>
    </div>
    <div id="cardCollpase4" class="collapse show">
        <div class="card-body">
            <div class="tab-content pt-0" id="tab-contenido">
                <div v-for="menu in menus" :key="menu.id">
                    <label class="text-blue ">
                        <input type="checkbox" v-model="menu_role.menu_id" :value="menu.id">
                        <b>@{{ menu.nombre }}</b>
                        <small ></small>
                    </label>
                    <div v-for="hijo in menu.menus" :key="hijo.id">
                        <label>
                            <input type="checkbox" v-model="menu_role.menu_id" :value="hijo.id">
                            @{{ hijo.nombre }}
                            <small >(ruta: @{{ hijo.ruta }})</small>
                        </label>
                    </div>
                </div>
                <div class="row container-fluid text-center">
                    <button type="button" class="btn btn-success" @click="guardar"> 
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>