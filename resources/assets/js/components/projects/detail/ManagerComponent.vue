<template>
    <div class="wrapper wrapper-content project-manager">
                               <h4>Descripcion del proyecto:</h4>
                               <img src="/images/clientlogo.png" class="img-responsive">
                               <p class="small">
                            {{description}}
                               </p>
                              
                               <div class="text-center m-t-md">
                                   <a href="#" class="btn btn-xs btn-primary">Ver en pdf</a>
           
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
                                 props: ['description']
                            }
                        </script>