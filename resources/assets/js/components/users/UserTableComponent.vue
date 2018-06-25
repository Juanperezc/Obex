<template>
    <div>
        <users-save v-bind:dialogv="dialogFormVisible" v-bind:areuedit="uedit" @close="close_d"></users-save>
        <div class="wrapper wrapper-content animated fadeInRight">
    
            <div class="row">
    
                <div class="wrapper wrapper-content animated fadeInRight">
    
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Todos los clientes</h5>
                                <div class="ibox-tools">
                                    <a href="#" @click="create" class="btn btn-primary btn-xs">Crear nuevo cliente</a>
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
                                            <tr v-bind:key="u.id" v-for="u in users">
                                                <td>
                                                    U-{{u.id}}
                                                </td>
                                                <td>
                                                    {{u.name}}
                                                </td>
                                                <td>
                                                  <img alt="image" class="img-circle" v-bind:src="'/storage/avatars/' + u.profile_img"></a>
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
    import UserSaveComponent from './UserSaveComponent.vue';
    export default {
        components: {
            'action-table-component': ActionTableComponent,
            'users-save': UserSaveComponent
        },
        data() {
            return {
                users: [],
                working: false,
                dialogFormVisible: false,
                uedit: {
                    id: 0,
                    title: ''
                }
            }
        },
        methods: {
            read() {
                this.users = [];
                window
                    .axios
                    .get('/api/wusers')
                    .then(({
                        data
                    }) => {
                        data.forEach(area => {
                            this
                                .users
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
                var ud = {
                    'id': '',
                    'title': ''
                }
                ud.id = 0;
                ud.title = "Crear Usuario"
                this.uedit = ud;
    
            },
            ed(u) {
                //    console.log("esta es la t", t.id);
                this.dialogFormVisible = true;
                var ud = {
                    'id': '',
                    'title': ''
                }
                ud.id = u.id;
                ud.title = "Editar Usuario"
                this.uedit = ud;
    
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
                                .delete(`/api/wusers/${id}`)
                                .then(() => {
                                    let index = this
                                        .users
                                        .findIndex(crud => crud.id === id);
                                    this
                                        .users
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