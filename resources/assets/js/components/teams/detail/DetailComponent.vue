<template>
    <div>
        <div class="row">
            <div v-if="!loading" class="col-lg-12">
                <div class="m-b-md">
                    <h2>{{ name }}</h2>
                </div>
                <dl class="dl-horizontal">
                    <dt>Estatus:</dt>
                    <dd>
                        <span class="label label-primary">{{ status(deleted_at) }}</span>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <dl class="dl-horizontal">
                    <dt>Descripcion:</dt>
                    <dd>
                        {{description}}</dd>
                    <dt>Area de Trabajo:</dt>
                    <dd>
                        <a v-if="work_area" :href="'#'" class="text-navy">{{ work_area.name }}</a>
                    </dd>
                    <dt>Proyecto:</dt>
                    <dd>
                        <a v-if="project" :href="'/panel/project/view/' + project.id" class="text-navy">{{ project.name }}</a>
                    </dd>
                    <dt>Participantes:</dt>
                    <dd class="project-people">
                        <div>
                            <a v-if="users" v-bind:key="u.id" v-for="u in users" v-bind:class="{parentimg: u.id == leader.id }" href="">
                                <img alt="image" class="img-circle" v-bind:src="'/storage/avatars/' + u.profile_img">
                                <img v-if="u.id == leader.id" src="/images/icons/crown.png" class="over-crown" style="width: 15px; height: 15px;" />
                            </a>
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="col-lg-7" id="cluster_info">
                <dl class="dl-horizontal">
    
                    <dt>Ultima Actualizacion:</dt>
                    <dd>{{updated_at}}</dd>
                    <dt>Creado:</dt>
                    <dd>
                        {{created_at}}
                    </dd>
    
                </dl>
            </div>
        </div>
    
    </div>
</template>

<script>
    //  import ActionTableComponent from './ActionTableComponent.vue';
    export default {
        data() {
            return {
    
                loading: false
            }
        },
        methods: {
    
            status: function(status) {
                if (status == null) {
                    return "Activo";
                } else {
                    return "Inactivo";
                }
            }
    
        },
        props: [
            'id',
            'name',
            'description',
            'leader',
            'work_area',
            'updated_at',
            'created_at',
            'deleted_at',
            'project',
            'users',
    
        ],
        created() {
            //console.log(this.work_area.name);
        }
    
    }
</script>