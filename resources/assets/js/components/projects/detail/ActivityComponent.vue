<template>
    <div class="row m-t-sm">
        <div class="col-lg-12">
            <div class="panel blank-panel">
                <div class="panel-heading">
                    <div class="panel-options">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab-1" data-toggle="tab" aria-expanded="true">Actividades</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">

                    <div class="tab-content">

                        <div class="tab-pane active" id="tab-1">

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
                                    <tr v-for="a in project.activities">
                                        <td>
                                            <span class="label label-primary">
                                                <i class="fa fa-check"></i>
                                                {{a.state}}</span>
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
                                    return {
                                        project: {
                                            'clients': {
                                                'name': ''
                                            }
                                        },
                                        loading: false
                                    }
                                },
                                                                 props: ['id']
                        
                            }
                        </script>