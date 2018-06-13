<template>
    <div class="ibox">
        <div class="ibox-title">
            <h5>Todos los proyectos</h5>
            <div class="ibox-tools">
                <a href="/panel/project/create" class="btn btn-primary btn-xs">Crear nuevo proyecto</a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row m-b-sm m-t-sm">
                <div class="col-md-1">
                    <button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> Recargar</button>
                </div>
                <div class="col-md-11">
                    <input type="text" v-model="search" placeholder="Busca Un Proyecto" class="input-sm form-control">
                </div>
            </div>
    
            <div class="project-list">
                <table class="table table-hover">
                    <tbody>
                        <tr v-bind:key="p.id" v-for="p in filteredProjects">
                            <td class="project-status">
                                <span class="label label-primary">{{ status(p.status) }}</span>
                            </td>
                            <td class="project-title">
                                <a href="project_detail.html">{{ p.name }}</a>
                                <br>
                                <small>Creado el
                                                                {{ p.start }}</small>
                            </td>
                            <td class="project-completion">
                                <small>Completación:
                                                                {{p.percent_complete}}%</small>
                                <div class="progress progress-mini">
                                    <div v-bind:style="{ width: p.percent_complete + '%' }" class="progress-bar"></div>
                                </div>
                            </td>
                            <td class="project-people">
                                <div v-bind:key="t.id" v-for="t in p.teams.slice(0,1)">
                                    <a v-bind:key="u.id" v-for="u in t.users.slice(0, 3)" href="">
                                        <img alt="image" class="img-circle" v-bind:src="'/storage/avatars/' + u.profile_img"></a>
                                </div>
    
                            </td>
                            <td class="project-actions">
                                <action-table-component v-bind="p" :key="p.id" @delete="del" @edit="ed" edit="Gestionar Recursos"></action-table-component>
                            
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</template>

<script>
    import ActionTableComponent from '../globals/ActionTableComponent.vue';
    export default {
        components: {
            'action-table-component': ActionTableComponent
        },
        data: () => {
            return {
    
                projects: [],
                search: '',
                working: false
            }
        },
        methods: {
            read() {
                this.mute = true;
                window
                    .axios
                    .get('/api/projects')
                    .then(({
                        data
                    }) => {
                        data.forEach(project => {
                            this
                                .projects
                                .push(project);
                        });
                        this.mute = false;
                    });
            },
            ed(p) {
                console.log("esta es la p", p.id);
                window.location.href = '/panel/' + p.section + '/edit/' + p.id;
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
                                .delete(`/api/projects/${id}`)
                                .then(() => {
                                    let index = this
                                        .projects
                                        .findIndex(crud => crud.id === id);
                                    this
                                        .projects
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
            filteredProjects: function() {
                var self = this;
                return this.projects.filter(function(cust) {
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