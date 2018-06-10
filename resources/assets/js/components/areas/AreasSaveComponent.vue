<template>
    <el-dialog :title="teamedit.title" :visible.sync="dialogv" :before-close="close_d">
        <el-form :model="form" :rules="frules" ref="form">
            <el-form-item label="Nombre del Equipo" prop="name" :label-width="formLabelWidth">
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
                    users: [],
                    work_area: '',
                    leader: '',
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
                    work_area: [{
                        required: true,
                        message: 'Porfavor selecciona un area para el equipo',
                        trigger: 'blur'
                    }],
                    users: [{
                        required: true,
                        message: 'Porfavor selecciona al menos un Integrante del equipo',
                        trigger: 'blur'
                    }],
                    leader: [{
                        required: true,
                        message: 'Porfavor selecciona un lider de equipo',
                        trigger: 'blur'
                    }],
    
                },
                formLabelWidth: '100px'
            }
        },
        methods: {
           
            readOworka() {
                window.axios
                    .get('/api/work_areas')
                    .then(({
                        data
                    }) => {
                        this.Oworka = [];
                        this.Oworka = data;
                    });
    
                //console.log(this.Ousers);
            },
            readteam(id) {
                window.axios
                    .get('/api/teams/' + id)
                    .then(({
                        data
                    }) => {
                        this.form.name = data.name;
                        this.form.description = data.description;
                        this.form.users = [];
                        data.users.forEach(user => {
                            this.form.users.push(user.id);
                        });
                        console.log(this.form.users);
    
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
                            this.updateTeam();
                        } else {
                            this.saveTeam();
                        }
                    } else {
    
                        return false;
                    }
                });
    
            },
            saveTeam() {
                console.log(this.form);
                window
                    .axios
                    .post('/api/teams', this.form)
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
            updateTeam() {
                window.axios
                    .put('/api/teams/' + this.form.edit, this.form)
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
            teamedit: function(newVal, oldVal) {
    
                if (newVal.id != 0) {
                    console.log("edit");
                    this.form.edit = newVal.id;
                    this.readteam(newVal.id);
                } else {
                    console.log("created");
                    this.form = {
                        name: '',
                        description: '',
                        users: [],
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
        props: ['dialogv', 'teamedit'],
        created() {
            this.readOusers();
            this.readOworka();
        }
    }
</script>