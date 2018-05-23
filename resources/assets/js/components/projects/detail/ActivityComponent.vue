<template>
    <div class="row m-t-sm">
        <div class="col-lg-12">
            <div class="panel blank-panel">
                <div class="panel-heading">
                    <div class="m-b-md">
                        <h2>Actividades</h2>
                    </div>
                    <div class="panel-options">
                        <ul class="nav nav-tabs">
                            <li v-for="t in teams" v-bind:class="{ active: t == teams[0] }">
                                <!-- -->
                                <a :href="'#tab-' + t.id" data-toggle="tab" aria-expanded="true">Team-{{t.id}}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content">
                    <div
                        v-for="t in teams"
                        class="tab-pane"
                        v-bind:class="{ active: t == teams[0] }"
                        :id="'tab-' + t.id">
                        <div class="panel-body">
                            <dt>Participantes:</dt>
                            <dd class="project-people">
                                <div >
                                    <a
                                        v-bind:key="u.id"
                                        v-for="u in t.users.slice(0, 5)"
                                        v-bind:class="{parentimg: u.id == t.leader }"
                                        href="">
                                        <img
                                            alt="image"
                                            class="img-circle"
                                            v-bind:src="'/storage/avatars/' + u.profile_img">
                                            <img
                                                v-if="u.id == t.leader"
                                                src="/images/icons/crown.png"
                                                class="over-crown"
                                                style="width: 15px; height: 15px;"/>
                                        </a>
                                    </div>
                                </dd>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Estatus</th>
                                            <th>Titulo</th>
                                            <th>Inicio</th>
                                            <th>Finalizacion</th>
                                            <th>Comentarios</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="a in t.activities">
                                            <td>
                                                <span class="label" v-bind:class="classLabel(a.state)">
                                                    <i class="fa fa-check "></i>
                                                    {{status(a.state)}}</span>
                                            </td>
                                            <td>
                                                {{a.name}}
                                            </td>
                                            <td>
                                                {{a.created_at}}
                                            </td>
                                            <td>
                                                {{a.updated_at}}
                                            </td>
                                            <td>
                                                <p class="small">
                                                    Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                                                    opposed to using 'Content here, content here', making it look like readable.
                                                </p>
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
    </template>
    <script>

        //  import ActionTableComponent from './ActionTableComponent.vue';
        export default {
            components: {
                // 'action-table-component': ActionTableComponent
            },
            data() {
                return {loading: false}
            },
            methods: {

                status: function (status) {
                    switch (status) {
                        case "culminated":
                            return "Finalizado";
                            break;
                        case "cancelled":
                            return "Cancelado"
                            break;
                             case "in-progress":
                            return "En Progreso"
                            break;
                    }

                },
                classLabel: function (status) {
                    switch (status) {
                        case "culminated":
                            return "label-primary";
                            break;
                        case "cancelled":
                            return "label-danger"
                            break;
                        case "in-progress":
                            return "label-warning"
                            break;

                    }

                }

            },
            props: ['teams']

        }
    </script>