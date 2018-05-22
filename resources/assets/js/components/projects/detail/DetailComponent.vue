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
                        <span class="label label-primary">{{ status(state) }}</span>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <dl class="dl-horizontal">
                    <dt>Id:</dt>
                    <dd>
                        {{id}}</dd>
                    <dt >Cliente:</dt>
                    <dd>
                        <a href="#" class="text-navy">{{ clients.name}}</a>
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
        <div class="row">
            <div class="col-lg-12">
                <dl class="dl-horizontal">
                    <dt>Completed:</dt>
                    <dd>
                        <div class="progress progress-striped active m-b-sm">
                            <div v-bind:style="{ width: percent_complete + '%' }" class="progress-bar"></div>
                        </div>
                        <small>Proyecto completado en
                            <strong>{{percent_complete}}%</strong>
                        </small>
                    </dd>
                </dl>
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
                if (status == 0) {
                    return "Activo";
                } else {
                    return "Inactivo";
                }
            }

        },
        props: [
            'id',
            'name',
            'state',
            'clients',
            'updated_at',
            'created_at',
            'teams',
            'percent_complete'
        ]

    }
</script>