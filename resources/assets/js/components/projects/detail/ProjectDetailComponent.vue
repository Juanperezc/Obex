<template>
       <div class="row">
                <div class="col-lg-9">
                           <div class="wrapper wrapper-content animated fadeInUp">
                               <div class="ibox">
                                   <div class="ibox-content">
                                   <detail v-bind="project" :key="project.id"></detail>
                                      <project-activity  v-for="a in project.teams[0].activities" v-bind="a" :key="a.id" >
                                      </project-activity>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-3">
                       <project-manager v-bind="project" :key="project.id" ></project-manager>
                       </div>
           </div>
</template>

    <script>
                       
                              import DetailComponent from './DetailComponent.vue';
                              import ActivityComponent from './ActivityComponent.vue';
                              import ManagerComponent from './ManagerComponent.vue';
                            export default {
                                components: {
                                     'detail': DetailComponent,
                                       'project-activity': ActivityComponent,
                                        'project-manager': ManagerComponent
                                },
                                data() {
                                    return {
                                        project: {
                                            'clients': {
                                                'name': ''
                                            },
                                            'activities': {

                                            },
                                        },
                                        loading: false
                                    }
                                },
                                methods: {
                                    read() {
                                        console.log(this.id);
                                        window
                                            .axios
                                            .get('/api/projects/' + this.id)
                                            .then(({data}) => {
                                                this.project = data;
                                                this.loading = true;
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
                                props: ['id'],
                                created() {
                                    this.read();

                                    // this.percent_complete_project();
                                }
                            }
                        </script>