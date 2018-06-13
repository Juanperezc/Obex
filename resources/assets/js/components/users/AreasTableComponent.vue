<template>
    <div>
        <area-save v-bind:dialogv="dialogFormVisible" v-bind:areaedit="aedit" @close="close_d"></area-save>
        <div class="wrapper wrapper-content animated fadeInRight">
    
            <div class="row">
    
                <div class="wrapper wrapper-content animated fadeInRight">
    
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Todos las Areas</h5>
                                <div class="ibox-tools">
                                    <a href="#" @click="create" class="btn btn-primary btn-xs">Crear nueva Area</a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row m-b-sm m-t-sm">
                                    <div class="col-md-1">
                                        <button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> Recargar</button>
                                    </div>
                                    <div class="col-md-11">
                                        <div class="input-group"><input type="text" placeholder="Buscar" class="input-sm form-control"> <span class="input-group-btn">
                                                                <button type="button" class="btn btn-sm btn-primary"> Buscar</button> </span></div>
                                    </div>
                                </div>
    
                                <div class="project-list">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr v-bind:key="a.id" v-for="a in areas">
                                                <td>
                                                    A-{{a.id}}
                                                </td>
                                                <td>
                                                    {{a.name}}
                                                </td>
                                                <td>
                                                    {{a.description}}
                                                </td>
                                                <td>
                                                    <action-table-component v-bind="a" :key="a.id" @delete="del" @edit="ed"></action-table-component>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
        </div>
    </div>
</template>

<script>
    import ActionTableComponent from '../globals/ActionTableComponent.vue';
    import AreasSaveComponent from './AreasSaveComponent.vue';
    export default {
        components: {
            'action-table-component': ActionTableComponent,
            'area-save': AreasSaveComponent
        },
        data() {
            return {
                areas: [],
                working: false,
                dialogFormVisible: false,
                aedit: {
                    id: 0,
                    title: ''
                }
            }
        },
        methods: {
            read() {
                this.areas = [];
                window
                    .axios
                    .get('/api/wareas')
                    .then(({
                        data
                    }) => {
                        data.forEach(area => {
                            this
                                .areas
                                .push(area);
                        });
                    });
            },
            close_d() {
                this.dialogFormVisible = false;
                this.read();
            },
            create() {
                console.log("create");
                this.dialogFormVisible = true;
                var ad = {
                    'id': '',
                    'title': ''
                }
                ad.id = 0;
                ad.title = "Crear Equipo"
                this.aedit = ad;
    
            },
            ed(a) {
                //    console.log("esta es la t", t.id);
                this.dialogFormVisible = true;
                var ad = {
                    'id': '',
                    'title': ''
                }
                ad.id = a.id;
                ad.title = "Editar Equipo"
                this.aedit = ad;
    
            },
            del(id) {
                this
                    .$swal({
                        title: 'Estas seguro?',
                        text: 'Solo el administrador puede revertir esta opción',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Si borralo!',
                        cancelButtonText: 'No, Mantelo!',
                        showCloseButton: true,
                        showLoaderOnConfirm: true
                    })
                    .then((result) => {
                        if (result.value) {
                            window
                                .axios
                                .delete(`/api/wareas/${id}`)
                                .then(() => {
                                    let index = this
                                        .areas
                                        .findIndex(crud => crud.id === id);
                                    this
                                        .areas
                                        .splice(index, 1);
                                    //this.mute = false;
                                });
                        } else {}
                    });
    
            },
            status: function(status) {
                if (status == 0) {
                    return "Activo";
                } else {
                    return "Inactivo";
                }
            }
    
        },
        created() {
            this.read();
    
        }
    }
</script>