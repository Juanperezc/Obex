<template>
    <div class="col-md-12">
        <a v-if="section == 'project'" :href="'/panel/project/' + id + '/activity'" class="btn btn-white btn-sm">
            <i class="fa fa-stack-overflow"></i> Gestionar actividades
        </a>
        <a v-if="Laravel.user.can['view.' + section]" :href="'/panel/' + section + '/view/' + id" class="btn btn-white btn-sm">
            <i class="fa fa-folder"></i> {{view}}
        </a>
        <a v-if="Laravel.user.can['edit.' + section]" href="#" @click="ed" class="btn btn-white btn-sm">
            <i class="fa fa-folder"></i> {{ edit }}
        </a>
        <a v-if="Laravel.user.can['delete.' + section]" href="#" @click="del" class="btn btn-white btn-sm">
            <i class="fa fa-trash"></i> Borrar
        </a>
    
    </div>
</template>

<script>
    export default {
        data: () => {
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
        props: {
            'id': Number,
            'section': String,
            'view': {
                type: String,
                default: "Ver"
            },
            'edit': {
                type: String,
                default: "Editar"
            }
        }
    }
</script>