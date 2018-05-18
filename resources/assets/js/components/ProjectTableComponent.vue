<template>
    <table class="table table-hover">
        <tbody >
            <tr v-for="p in projects">
                <td class="project-status">
                    <span class="label label-primary">{{ percent_complete_project(p) }}</span>
                </td>
                <td class="project-title">
                    <a href="project_detail.html">{{ p.name }}</a>
                    <br>
                        <small>Creado el
                            {{ p.start }}</small>
                    </td>
                    <td class="project-completion">
                        <small>Completación: 48%</small>
                        <div class="progress progress-mini">
                            <div style="width: 48%;" class="progress-bar"></div>
                        </div>
                    </td>
                    <td class="project-people">
                        <a v-for="u in p.teams[0].users.slice(0, 5)" href="">
                            <img
                                alt="image"
                                class="img-circle"
                                v-bind:src="'/storage/avatars/' + u.profile_img"></a>
                        </td>
                        <td class="project-actions">
                            <a href="project/1" class="btn btn-white btn-sm">
                                <i class="fa fa-folder"></i>
                                Ver
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </template>
        <script>
            function Project({id, name, description}) {
                this.id = id;
                this.name = name;
                this.description = description;
            }
            export default {

                data() {
                    return {projects: [], working: false}
                },
                methods: {
                    read() {
                        this.mute = true;
                        window
                            .axios
                            .get('/api/projects')
                            .then(({data}) => {
                                data.forEach(project => {
                                    this
                                        .projects
                                        .push(project);
                                });
                                this.mute = false;
                            });
                    },
                    status: function (status) {
                        if (status == 0) {
                            return "Activo";
                        } else {
                            return "Inactivo";
                        }
                    },
                    percent_complete_project: function (project) {
                        var conte = 0;
                        var contg = 0;
                        for (var team in project.teams) {
                            console.log(team.id);
                        }
                        return "a";
                        /*if (contg != 0)
                        return contc * (100 / contg);
                    else
                        return 0;
                    }*/
                    }
                },

                created() {
                    this.read();
                    // this.percent_complete_project();
                }
            }
        </script>