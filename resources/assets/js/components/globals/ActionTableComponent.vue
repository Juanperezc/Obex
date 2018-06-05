<template>
    <div class="col-md-12">
       <a v-if="Laravel.user.can['create.projects']" :href="'/panel/' + section + '/view/' + id"  class="btn btn-white btn-sm">
                                <i class="fa fa-folder"></i>
                                Ver
        </a>
         <a v-if="Laravel.user.can['edit.projects']" :href="'/panel/' + section + '/edit/' + id"  class="btn btn-white btn-sm">
                                <i class="fa fa-folder"></i>
                                Editar
        </a>
         <a v-if="Laravel.user.can['delete.projects']" href="#" @click="del" class="btn btn-white btn-sm">
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
      update(val) {
        this.$emit('update', this.id, val.target.selectedOptions[0].value);
      },
      del() {
              console.log(this.id);
        this.$emit('delete', this.id);
      }
    },
        props: ['id','section']
    }
</script>