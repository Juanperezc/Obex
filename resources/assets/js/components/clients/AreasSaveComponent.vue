<template>
    <el-dialog :title="areaedit.title" :visible.sync="dialogv" :before-close="close_d">
        <el-form :model="form" :rules="frules" ref="form">
            <el-form-item label="Nombre del Area" prop="name" :label-width="formLabelWidth">
                <el-input v-model="form.name" placeholder=""></el-input>
            </el-form-item>
            <el-form-item label="Descripcion" prop="description" :label-width="formLabelWidth">
                <el-input type="textarea" v-model="form.description"></el-input>
            </el-form-item>
        </el-form>
        <span slot="footer" class="dialog-footer">
                                                                                     <el-button @click="close_d">Cancelar</el-button>
                                                                                     <el-button type="primary" @click="submitForm()">Guardar</el-button>
                                        </span>
    </el-dialog>
</template>

<<script>
    export default {
        data() {
            return {
                form: {
                    name: '',
                    description: '',
                    edit: 0
                },
                frules: {
                    name: [{
                        required: true,
                        message: 'Porfavor escribe un nombre del Equipo',
                        trigger: 'blur'
                    }],
                    description: [{
    
                        message: 'Porfavor escribe una descripcion',
                        trigger: 'blur'
                    }],
                  
    
                },
                formLabelWidth: '100px'
            }
        },
        methods: {
            
            readArea(id) {
                window.axios
                    .get('/api/wareas/' + id)
                    .then(({
                        data
                    }) => {
                        this.form.name = data.name;
                        this.form.description = data.description;
                 
    
                    });
            },
            close_d() {
                this.$confirm('¿Estas seguro que quieres salir sin guardar?')
                    .then(_ => {
                        this.$emit('close');
                    })
                    .catch(_ => {});
    
    
            },
            submitForm() {
                this.$refs.form.validate((valid) => {
                    if (valid) {
                        if (this.form.edit != 0) {
                            this.updateWareas();
                        } else {
                            this.saveWareas();
                        }
                    } else {
    
                        return false;
                    }
                });
    
            },
            saveWareas() {
                console.log(this.form);
                window
                    .axios
                    .post('/api/wareas', this.form)
                    .then(({
                        resp
                    }) => {
                        console.log(resp);
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'El Equipo se ha creado correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.$refs["form"].resetFields();
                    })
                    .catch(({
                        resp
                    }) => {
                        console.log(resp);
    
                    });
    
            },
            updateWareas() {
                window.axios
                    .put('/api/wareas/' + this.form.edit, this.form)
                    .then(({
                        resp
                    }) => {
                        console.log(resp);
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'El Equipo se ha guardado correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.$emit('close');
                    })
                    .catch(({
                        resp
                    }) => {
                        console.log(resp);
    
                    });
            }
    
        },
        watch: {
            areaedit: function(newVal, oldVal) {
    
                if (newVal.id != 0) {
                    console.log("edit");
                    this.form.edit = newVal.id;
                    this.readArea(newVal.id);
                } else {
                    console.log("created");
                    this.form = {
                        name: '',
                        description: '',
                        edit: 0
                    }
                }
            },
            Ousers: function(d){
                  console.log("users:",d);
            },
            dialogv: function(newVal, oldVal) {
                console.log("its");
            }
    
    
        },
        props: ['dialogv', 'areaedit'],
        created() {
        }
    }
</script>