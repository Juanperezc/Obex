<template>
    <div>
        <client-save
            v-bind:dialogv="dialogFormVisible"
            v-bind:clientedit="cedit"
            @close="close_d"></client-save>
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">

                <div class="wrapper wrapper-content animated fadeInRight">

                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Todos los Clientes</h5>
                                <div class="ibox-tools">
                                    <a href="#" @click="create" class="btn btn-primary btn-xs">Crear nuevo cliente</a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row m-b-sm m-t-sm">

                                    <div class="col-md-12">
                                        <input
                                            type="text"
                                            v-model="search"
                                            placeholder="Busca un cliente"
                                            class="input-sm form-control"></div>
                                    </div>

                                    <div class="project-list">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Correo</th>
                                                    <th>Tipo</th>
                                                    <th>Opciones</th>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <tr v-bind:key="c.id" v-for="c in filteredClients">
                                                    <td>
                                                        C-{{c.id}}
                                                    </td>
                                                    <td>
                                                        {{c.name}}
                                                    </td>
                                                    <td>
                                                        {{c.email}}
                                                    </td>
                                                    <td>
                                                        {{type(c.type)}}
                                                    </td>

                                                    <td>
                                                        <action-table-component v-bind="c" :key="c.id" @delete="del" @edit="ed"></action-table-component>
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
        import ClientSaveComponent from './ClientSaveComponent.vue';
        export default {
            components: {
                'action-table-component': ActionTableComponent,
                'client-save': ClientSaveComponent
            },
            data() {
                return {
                    clients: [],
                    working: false,
                    dialogFormVisible: false,
                    search: '',
                    cedit: {
                        id: 0,
                        title: ''
                    }
                }
            },
            methods: {
                read() {
                    this.clients = [];
                    window
                        .axios
                        .get('/api/clients')
                        .then(({data}) => {
                            data.forEach(client => {
                                this
                                    .clients
                                    .push(client);
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
                    var cd = {
                        'id': '',
                        'title': ''
                    }
                    cd.id = 0;
                    cd.title = "Crear cliente"
                    this.cedit = cd;

                },
                ed(c) {
                    //    console.log("esta es la t", t.id);
                    this.dialogFormVisible = true;
                    var cd = {
                        'id': '',
                        'title': ''
                    }
                    cd.id = c.id;
                    cd.title = "Editar cliente"
                    this.cedit = cd;

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
                                    .delete(`/api/clients/${id}`)
                                    .then(() => {
                                        let index = this
                                            .clients
                                            .findIndex(crud => crud.id === id);
                                        this
                                            .clients
                                            .splice(index, 1);
                                        //this.mute = false;
                                    });
                            } else {}
                        });
                    filteredClients

                },
                status: function (status) {
                    if (status == 0) {
                        return "Activo";
                    } else {
                        return "Inactivo";
                    }
                },
                type: function (type) {
                    switch (type) {
                        case 'service':
                        return "Servicio";
                        break;
                        case 'manufacture':
                        return "Manofactura";
                        break;
                        case 'commerce':
                        break;
                        return "Comercio";
                        break;
                        case 'natural':
                        return "Natural";
                        break;
                    }

                }

            },
            computed: {
                filteredClients: function () {
                    var self = this;
                    return this
                        .clients
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