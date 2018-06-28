<template>
    <div>
        <users-save v-bind:dialogv="dialogFormVisible" v-bind:useredit="uedit"
        @close="close_d"></users-save> 
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">

                <div class="wrapper wrapper-content animated fadeInRight">

                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Todos los Usuarios</h5>
                                <div class="ibox-tools">
                                    <a href="#" @click="create" class="btn btn-primary btn-xs">Crear nuevo usuario</a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row m-b-sm m-t-sm">

                                    <div class="col-md-12">
                                        <input
                                            type="text"
                                            v-model="search"
                                            placeholder="Busca un usuario"
                                            class="input-sm form-control"></div>
                                    </div>

                                    <div class="project-list">
                                        <table class="table table-hover">
                        
                                            <tbody>
                                                <tr v-bind:key="u.id" v-for="u in filteredUsers">
                                                    <td>
                                                        U-{{u.id}}
                                                    </td>
                                                    <td>
                                                        {{u.name}}
                                                    </td>
                                                    <td class="project-people">
                                                        <img
                                                            alt="image"
                                                            class="img-circle"
                                                            v-bind:src="'/storage/avatars/' + u.profile_img"></a>
                                                    </td>
                                                    <td>
                                                        <action-table-component v-bind="u" :key="u.id" @delete="del" @edit="ed"></action-table-component>
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
                    search: '',
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
                        .get('/api/users')
                        .then(({data}) => {
                            data.forEach(user => {
                                this
                                    .users
                                    .push(user);
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
                                    .delete(`/api/users/${id}`)
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
                status: function (status) {
                    if (status == 0) {
                        return "Activo";
                    } else {
                        return "Inactivo";
                    }
                }

            },
            computed: {
                filteredUsers: function () {
                    var self = this;
                    return this
                        .users
                        .filter(function (cust) {
                            return cust
                                .name
                                .toLowerCase()
                                .indexOf(self.search.toLowerCase()) >= 0;
                        });
                    //return this.customers;
                }
            },
            created() {
                this.read();

            }
        }
    </script>