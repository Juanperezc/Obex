<template>
    <div>
        <team-save v-bind:dialogv="dialogFormVisible" v-bind:teamedit="tedit" @close="close_d"></team-save>
        <div class="wrapper wrapper-content animated fadeInRight">
    
            <div class="row">
    
                <div class="wrapper wrapper-content animated fadeInRight">
    
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Todos los Equipos</h5>
                                <div class="ibox-tools">
                                    <a href="#" @click="create" class="btn btn-primary btn-xs">Crear nuevo Equipo</a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row m-b-sm m-t-sm">
                                    <div class="col-md-1">
                                        <button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> Recargar</button>
                                    </div>
                                    <div class="col-md-11">
                                        <div class="input-group"><input type="text" v-model="search" placeholder="Buscar" class="input-sm form-control"> <span class="input-group-btn">
                                                        <button type="button" class="btn btn-sm btn-primary"> Buscar</button> </span></div>
                                    </div>
                                </div>
    
                                <div class="project-list">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr v-bind:key="t.id" v-for="t in filteredTeams">
                                                <td>
                                                    T-{{t.id}} - {{t.name}}
                                                </td>
                                                <td>
                                                    {{t.description}}
                                                </td>
                                                <td>
                                                    <div class="team-members">
                                                        <a v-bind:key="u.id" v-for="u in t.users.slice(0, 5)" v-bind:class="{parentimg: u.id == t.leader.id }" href="">
                                                            <img alt="image" class="img-circle" v-bind:src="'/storage/avatars/' + u.profile_img">
                                                            <img v-if="u.id == t.leader.id" src="/images/icons/crown.png" class="over-crown" style="width: 15px; height: 15px;" />
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <action-table-component v-bind="t" :key="t.id" @delete="del" @edit="ed"></action-table-component>
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
    import TeamSaveComponent from './TeamSaveComponent.vue';
    export default {
        components: {
            'action-table-component': ActionTableComponent,
            'team-save': TeamSaveComponent
        },
        data() {
            return {
                teams: [],
                users: [],
                working: false,
                dialogFormVisible: false,
                tedit: {
                    id: 0,
                    title: ''
                },
                search: '',
            }
        },
        methods: {
            read() {
                this.teams = [];
                window
                    .axios
                    .get('/api/teams')
                    .then(({
                        data
                    }) => {
                        data.forEach(team => {
                            this
                                .teams
                                .push(team);
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
               var td = {
                    'id': '',
                    'title': ''
                }
                td.id = 0;
                td.title = "Crear Equipo"
                this.tedit = td;
    
            },
            ed(t) {
                //    console.log("esta es la t", t.id);
                this.dialogFormVisible = true;
    
                var td = {
                    'id': '',
                    'title': ''
                }
                td.id = t.id;
                td.title = "Editar Equipo"
                this.tedit = td;
    
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
                                .delete(`/api/teams/${id}`)
                                .then(() => {
                                    let index = this
                                        .teams
                                        .findIndex(crud => crud.id === id);
                                    this
                                        .teams
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
        computed: {
            filteredTeams: function() {
                var self = this;
                return this.teams.filter(function(cust) {
                    return cust.name.toLowerCase().indexOf(self.search.toLowerCase()) >= 0;
                });
                //return this.customers;
            }
        },
        created() {
            this.read();
    
        }
    }
</script>