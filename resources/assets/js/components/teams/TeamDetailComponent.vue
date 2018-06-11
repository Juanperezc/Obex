<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-content">
                        <detail v-bind="team" :key="team.id"></detail>
                       
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</template>

<script>
    import DetailComponent from './detail/DetailComponent.vue';
  
    export default {
        components: {
            'detail': DetailComponent,
       
    
        },
        data() {
            return {
                team: {},
                loading: false
            }
        },
        methods: {
            read() {
    
                window
                    .axios
                    .get('/api/teams/' + this.id)
                    .then(({
                        data
                    }) => {
                        console.log(data);
                        this.team = data;
                        this.loading = true;
                    });
            },
    
            status: function(status) {
                if (status == 0) {
                    return "Activo";
                } else {
                    return "Inactivo";
                }
            }
    
        },
        props: ['id'],
        mounted() {
            this.read();
    
        }
    }
</script>