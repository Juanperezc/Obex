<template>
    <div class="ibox col-lg-6">
        <div class="ibox-title">
            <span class="pull-right"></span>
            <h5>IT-01 - Equipo de diseño</h5>
        </div>
        <div class="ibox-content">
            <div class="team-members">
                <a href="#"><img alt="member" class="img-circle" src="/images/a1.png"></a>
                <a href="#"><img alt="member" class="img-circle" src="/images/a2.png"></a>
                <a href="#"><img alt="member" class="img-circle" src="/images/a3.png"></a>
                <a href="#"><img alt="member" class="img-circle" src="/images/a5.png"></a>
                <a href="#"><img alt="member" class="img-circle" src="/images/a6.png"></a>
            </div>
            <h4>Informacion acerca del equipo de diseño</h4>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi totam soluta illum. Natus ullam reprehenderit at? Fuga, dolorum quia? Ipsam eveniet aliquam pariatur reiciendis labore, veniam eum sunt nemo magnam?
            </p>
            <div>
                <span>Estado del proyecto en curso:</span>
                <div class="stat-percent">48%</div>
                <div class="progress progress-mini">
                    <div style="width: 48%;" class="progress-bar"></div>
                </div>
            </div>
            <div class="row  m-t-sm">
                <div class="col-sm-4">
                    <div class="font-bold">Proyectos</div>
                    12
                </div>
                <div class="col-sm-4">
                    <div class="font-bold">ID-Proyecto</div>
                    0001
                </div>
                <div class="col-sm-4 text-right">
                    <div class="font-bold">Presupuesto</div>
                    $200,913 <i class="fa fa-level-up text-navy"></i>
                </div>
            </div>
    
        </div>
   </div>
</template>

<script>
    import ActionTableComponent from '../globals/ActionTableComponent.vue';
    export default {
        components: {
            'action-table-component': ActionTableComponent
        },
        created() {
            console.log('Component created.')
        }
    }
</script>