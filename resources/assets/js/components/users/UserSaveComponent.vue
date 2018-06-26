<template>
    <el-dialog
        :title="useredit.title"
        :visible.sync="dialogv"
        :before-close="close_d">
        <el-form :model="form" :rules="urules" ref="form">
            <el-form-item label="Correo" prop="email" :label-width="formLabelWidth">
                <el-input type="email" v-model="form.email"></el-input>
            </el-form-item>
             <el-form-item v-if="form.edit == 0" label="Contraseña" prop="password" :label-width="formLabelWidth">
                <el-input type="password" v-model="form.password"></el-input>
            </el-form-item>
            <el-form-item
                label="Nombre del usuario"
                prop="name"
                :label-width="formLabelWidth">
                <el-input v-model="form.name" placeholder=""></el-input>
            </el-form-item>
            <el-form-item label="Apellido" prop="last_name" :label-width="formLabelWidth">
                <el-input type="text" v-model="form.last_name"></el-input>
            </el-form-item>
          <!--  <el-form-item label="Salario($)" prop="salary" :label-width="formLabelWidth">
                <el-input-number v-model="salary" :min="1" :max="1000"></el-input-number>
            </el-form-item> -->
  
        </el-form>
        <span slot="footer" class="dialog-footer">
            <el-button @click="close_d">Cancelar</el-button>
            <el-button type="primary" @click="submitForm()">Guardar</el-button>
        </span>
    </el-dialog>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    last_name: '',
                 //   salary: 1,
                    password: '',
                    edit: 0
                },
                urules: {
                    name: [
                        {
                            required: true,
                            message: 'Porfavor escribe un nombre del usuario',
                            trigger: 'blur'
                        }
                    ],
                    last_name: [
                        {
                            required: true,
                            message: 'Porfavor escribe un apellido',
                            trigger: 'blur'
                        }
                    ],
                    email: [
                        {
                            required: true,
                            message: 'Porfavor escribe el correo del usuario',
                            trigger: 'blur'
                        }
                    ],
                    password: [
                        {
                            required: true,
                            message: 'Porfavor escribe el correo del usuario',
                            trigger: 'blur'
                        }
                    ],
                   /* salary: [
                        {
                          
                            message: 'Porfavor escribe un salario para el usuario',
                            trigger: 'blur'
                        }
                    ]*/
                },
                formLabelWidth: '100px'
            }
        },
        methods: {

            readUser(id) {
                window
                    .axios
                    .get('/api/users/' + id)
                    .then(({data}) => {
                        this.form.name = data.name;
                        this.form.last_name = data.last_name;
                      //  this.form.salary = data.salary;
                        this.form.email = data.email;

                    });
            },
            close_d() {
                this
                    .$confirm('¿Estas seguro que quieres salir sin guardar?')
                    .then(_ => {
                        this.$emit('close');
                    })
                    .catch(_ => {});

            },
            submitForm() {
                this
                    .$refs
                    .form
                    .validate((valid) => {
                        if (valid) {
                            if (this.form.edit != 0) {
                                this.updateUsers();
                            } else {
                                this.saveUsers();
                            }
                        } else {

                            return false;
                        }
                    });

            },
            saveUsers() {
                console.log(this.form);
                window
                    .axios
                    .post('/api/users', this.form)
                    .then(({resp}) => {
                        console.log(resp);
                        this.$swal(
                            {position: 'top-end', type: 'success', title: 'El Usuario se ha creado correctamente', showConfirmButton: false, timer: 1500}
                        );
                        this
                            .$refs["form"]
                            .resetFields();
                    })
                    .catch(({resp}) => {
                        console.log(resp);

                    });

            },
            updateUsers() {
                window
                    .axios
                    .put('/api/users/' + this.form.edit, this.form)
                    .then(({resp}) => {
                        console.log(resp);
                        this.$swal(
                            {position: 'top-end', type: 'success', title: 'El Usuario se ha guardado correctamente', showConfirmButton: false, timer: 1500}
                        );
                        this.$emit('close');
                    })
                    .catch(({resp}) => {
                        console.log(resp);

                    });
            }

        },
        watch: {
            useredit: function (newVal, oldVal) {

                if (newVal.id != 0) {
                    console.log("edit");
                    this.form.edit = newVal.id;
                    this.readUser(newVal.id);
                } else {
                    console.log("created");
                    this.form = {
                        name: '',
                        last_name: '',
                        edit: 0
                    }
                }
            },
            Ousers: function (d) {
                console.log("users:", d);
            },
            dialogv: function (newVal, oldVal) {
                console.log("its");
            }

        },
        props: [
            'dialogv', 'useredit'
        ],
        created() {}
    }
</script>