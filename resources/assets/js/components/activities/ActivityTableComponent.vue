<template>
    <div class="col-lg-12">
    
        <div class="col-lg-12">
            <div class="panel blank-panel">
                <div class="panel-heading">
    
                    <div class="panel-options">
                        <ul class="nav nav-tabs">
                            <li v-if="project.teams.length > 0" v-for="t in project.teams" v-bind:class="{ active: t == project.teams[0] }">
                                <!-- -->
                                <a :href="'#tab-' + t.id" data-toggle="tab" aria-expanded="true">Team-{{t.id}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
    
                <div class="tab-content">
                    <div v-if="project.teams.length > 0" v-for="t in project.teams" class="tab-pane" v-bind:class="{ active: t == project.teams[0] }" :id="'tab-' + t.id">
                        <div class="panel-body">
                            <dd>
                                <div class="ibox-tools">
                                    <a href="#" class="btn btn-primary btn-ms">Crear nueva actividad</a>
                                </div>
    
                            </dd>
                            <dt>Participantes:</dt>
                            <dd class="project-people">
                                <div>
                                    <a v-bind:key="u.id" v-for="u in t.users.slice(0, 5)" v-bind:class="{parentimg: u.id == t.leader }" href="">
                                        <img alt="image" class="img-circle" v-bind:src="'/storage/avatars/' + u.profile_img">
                                        <img v-if="u.id == t.leader" src="/images/icons/crown.png" class="over-crown" style="width: 15px; height: 15px;" />
                                    </a>
                                </div>
                            </dd>
                            <kanban-board :stages="stages" :blocks="t.activities" @update-block="updateBlock">
                                <div v-for="a in t.activities" :slot="a.id">
    
                                    <div>
                                        <strong>id:</strong> {{ a.id }}
                                    </div>
                                    <div>
                                        {{ a.name }}
                                    </div>
                                </div>
                            </kanban-board>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    
    </div>
    </div>
</template>

<script>
    export default {
        data: () => {
            return {
    
                stages: ['En Espera', 'En Progreso', 'Finalizado', 'Cancelado'],
                project: {},
                blocks: [{
                        id: 1,
                        status: 'En Espera',
                        title: 'Test',
                    },
                    {
                        id: 2,
                        status: 'En Progreso',
                        title: 'Test',
                        name: 'elisium'
                    },
                ],
            }
        },
        methods: {
            updateBlock(id, status) {
                this.blocks.find(b => b.id === Number(id)).status = status;
                console.log(id, status);
                console.log(this.state(status));
            },
            read() {
    
                window
                    .axios
                    .get('/api/projects/' + this.id)
                    .then(({
                        data
                    }) => {
                        console.log(data);
                        this.project = data;
    
                        data.teams.forEach(team => {
                            team.activities.forEach(activity => {
    
                            });
                        });
                        //  this.loading = true;
                    });
            },
            state(status) {
                console.log(status);
                switch (status) {
                    case "En Espera":
                        return "on-hold";
                        break;
                    case "En Progreso":
                        return "in-progress";
                        break;
                    case "Finalizado":
                        return "culminated";
                        break;
                    case "Cancelado":
                        return "cancelled";
                        break;
                }
            }
        },
        props: ["id"],
        created() {
            this.read();
        }
    }
</script>