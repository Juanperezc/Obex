<template>
    <table class="table table-hover">
        <tbody>
            <tr v-bind:key="p.id" v-for="p in projects">
                <td class="project-status">
                    <span class="label label-primary">{{ status(p.status) }}</span>
                </td>
                <td class="project-title">
                    <a href="project_detail.html">{{ p.name }}</a>
                    <br>
                    <small>Creado el {{ p.start }}</small>
                </td>
                <td class="project-completion">
                    <small>Completación: {{p.percent_complete}}%</small>
                    <div class="progress progress-mini">
                        <div v-bind:style="{ width: p.percent_complete + '%' }" class="progress-bar"></div>
                    </div>
                </td>
                <td class="project-people">
                    <a v-bind:key="u.id" v-for="u in p.teams[0].users.slice(0, 5)" href="">
                        <img alt="image" class="img-circle" v-bind:src="'/storage/avatars/' + u.profile_img">
                    </a>
                </td>
                <td class="project-actions">
                    <action-table-component v-bind="p" :key="p.id" @update="update" @delete="del"></action-table-component>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script>
    function Project({
        id,
        name,
        description
    }) {
        this.id = id;
        this.name = name;
        this.description = description;
    }
    import ActionTableComponent from './ActionTableComponent.vue';
    export default {
        components: {
            'action-table-component': ActionTableComponent
        },
        data() {
            return {
                projects: [],
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
            update(id, color) {
                /* this.mute = true;
                 window.axios.put(`/api/cruds/${id}`, { color }).then(() => {
                   this.cruds.find(crud => crud.id === id).color = color;
                   this.mute = false;
                 });*/
            },
            del(id) {

                window.axios.delete(`/api/projects/${id}`).then(() => {
                    let index = this.projects.findIndex(crud => crud.id === id);
                    this.projects.splice(index, 1);
                    //this.mute = false;
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

        created() {
            this.read();
            this.$swal({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#85be39",
                    cancelButtonColor: '#ef5350',
                    confirmButtonText: "Yes!"
                }).then(function () {

                }.bind(this)).catch(errors => {});
            // this.percent_complete_project();
        }
    }
</script>