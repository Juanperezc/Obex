<template>
    <div class="col-md-12">
       <a v-if="Laravel.user.can['view.' + section]" :href="'/panel/' + section + '/view/' + id"  class="btn btn-white btn-sm">
                                <i class="fa fa-folder"></i>
                                Ver
        </a>
         <a v-if="Laravel.user.can['edit.' + section]" href="#" @click="ed" class="btn btn-white btn-sm">
                                <i class="fa fa-folder"></i>
                                Editar
        </a>
         <a v-if="Laravel.user.can['delete.' + section]" href="#" @click="del" class="btn btn-white btn-sm">
                                <i class="fa fa-trash"></i>
                                Borrar
        </a>
    </div>

</template>
<script>
    export default {
        data: ()=> {
            return {
              Laravel: Laravel
            }
        },
         methods: {
      ed() {
        console.log(this.id);
        this.$emit('edit', this);
      },
      del() {
        console.log(this.id);
        this.$emit('delete', this.id);
      }
    },
        props: ['id','section']
    }
</script>