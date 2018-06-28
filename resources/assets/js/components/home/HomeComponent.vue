<template>
<div>
    <div class="row">
        <div class="col-md-6">
            <div class="widget navy-bg p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-tasks fa-4x"></i>
                    <h1 class="m-xs">{{activities_length}}</h1>
                    <h3 class="font-bold no-margins">
                        Total Actividades
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget navy-bg p-lg text-center">
                <div class="m-b-md">
                    <i class="fa fa-calendar fa-4x"></i>
                    <h1 class="m-xs">Hoy es:</h1>
                   <h3 class="font-bold no-margins">
                     {{date}}

                    </h3>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="text-capitalize">
                <center>Ultimas actividades</center>
            </h2>
            <div class="ibox-content" id="ibox-content">
                <div id="vertical-timeline" class="vertical-container dark-timeline">
                    <div class="vertical-timeline-block">
                        <div class="vertical-timeline-icon navy-bg">
                            <i class="fa fa-briefcase"></i>
                        </div>

                        <div v-bind:key="a.id" v-for="a in activities" class="vertical-timeline-content">
                            <h2 class="product-name ">
                                <center>{{a.name}}</center>
                            </h2>
                            <hr class="hr-line-solid">
                            <span>description: {{a.description}}</span>
                            <p>Tipo: {{a.type}}
                            </p>
                           <!-- <a href="#" class="btn btn-sm btn-primary">Ir al proyecto</a> -->
                            <span class="vertical-date">
                            Fecha de creacion: {{a.created_at}}
                            </span>
                        </div>
                    </div>

                 

                </div>
            </div>


         
        </div>
        <div class="col-md-2">

        </div>
    </div>
 </div>
</template>
<script>
    export default {

        data() {
            return {
            activities : []
            } 
        },
        methods: {
                read() {
                    this.activities = [];
                    window
                        .axios
                        .get('/api/activity')
                        .then(({data}) => {
                            data.forEach(activity => {
                                this
                                    .activities
                                    .push(activity);
                            });
                        });
                },
             
        },
        computed: {
        activities_length: function () {
            return this.activities.length;
        }
    },
        created() {
         this.read();

        },
        props: ['date']
    }
</script>