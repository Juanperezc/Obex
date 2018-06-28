<template>
    <el-dialog
        :title="clientedit.title"
        :visible.sync="dialogv"
        :before-close="close_d">
        <el-form :model="form" :rules="crules" ref="form">
            <el-form-item
                label="Nombre del cliente"
                prop="name"
                :label-width="formLabelWidth">
                <el-input type="text" v-model="form.name"></el-input>
            </el-form-item>
            <el-form-item label="Telefono" prop="phone" :label-width="formLabelWidth">
                <el-input type="text" v-model="form.phone" placeholder=""></el-input>
            </el-form-item>
            <el-form-item label="Correo" prop="email" :label-width="formLabelWidth">
                <el-input type="email" v-model="form.email"></el-input>
            </el-form-item>
            <el-form-item label="Dirección" prop="direction" :label-width="formLabelWidth">
                <el-input type="text" v-model="form.direction"></el-input>
            </el-form-item>
            <el-form-item label="Tipo de cliente" prop="type" label-width="formLabelWidth">
                <el-select v-model="form.type" placeholder="Selecciona un tipo">
                    <el-option label="Servicio" value="service"></el-option>
                    <el-option label="Manofactura" value="manufacture"></el-option>
                    <el-option label="Comercial" value="commerce"></el-option>
                    <el-option label="Natural" value="natural"></el-option>
  
                </el-select>
            </el-form-item>
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
                    phone: '',
                    email: '',
                    direction: '',
                    type: '',
                    edit: 0
                },
                crules: {
                    name: [
                        {
                            required: true,
                            message: 'Porfavor escribe un nombre',
                            trigger: 'blur'
                        }
                    ],
                    phone: [
                        {
                            required: true,
                            message: 'Porfavor escribe un telefono',
                            trigger: 'blur'
                        }
                    ],
                    email: [
                        {
                            required: true,
                            message: 'Porfavor escribe el correo del cliente',
                            trigger: 'blur'
                        }
                    ],
                    direction: [
                        {
                            required: true,
                            message: 'Porfavor escribe la dirección del cliente',
                            trigger: 'blur'
                        }
                    ],
                    type: [
                        {
                            required: true,
                            message: 'Porfavor escribe el tipo de cliente',
                            trigger: 'blur'
                        }
                    ]
                },
                formLabelWidth: '100px'
            }
        },
        methods: {

            readClient(id) {
                window
                    .axios
                    .get('/api/clients/' + id)
                    .then(({data}) => {
                        this.form.name = data.name;
                        this.form.phone = data.phone;
                        this.form.email = data.email;
                        this.form.direction = data.direction;
                        this.form.type = data.type;
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
                                this.updateClients();
                            } else {
                                this.saveClients();
                            }
                        } else {

                            return false;
                        }
                    });

            },
            saveClients() {
                console.log(this.form);
                window
                    .axios
                    .post('/api/clients', this.form)
                    .then(({resp}) => {
                        console.log(resp);
                        this.$swal(
                            {position: 'top-end', type: 'success', title: 'El Cliente se ha creado correctamente', showConfirmButton: false, timer: 1500}
                        );
                        this
                            .$refs["form"]
                            .resetFields();
                    })
                    .catch(({resp}) => {
                        console.log(resp);

                    });

            },
            updateClients() {
                window
                    .axios
                    .put('/api/clients/' + this.form.edit, this.form)
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
            clientedit: function (newVal, oldVal) {

                if (newVal.id != 0) {
                    console.log("edit");
                    this.form.edit = newVal.id;
                    this.readClient(newVal.id);
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
                console.log("clients:", d);
            },
            dialogv: function (newVal, oldVal) {
                console.log("its");
            }

        },
        props: [
            'dialogv', 'clientedit'
        ],
        created() {}
    }
</script>