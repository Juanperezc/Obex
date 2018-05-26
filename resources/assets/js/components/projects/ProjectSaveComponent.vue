<template>

    <form-wizard
        @on-complete="onComplete"
        shape="tab"
        color="#18A689"
    
        error-color="#ff4949"
        slot-scope="propswizzard">
        <tab-content
            title="Personal details"
            icon="fa fa-user"
            :before-change="validateFirstStep">
            <el-form
                :inline="true"
                :model="formGeneral"
                class="demo-form-inline"
                :rules="grules"
                ref="generalForm"
                label-width="220px">
                <el-form-item label="Nombre del proyecto" prop="name">
                    <el-input v-model="formGeneral.name" placeholder=""></el-input>
                </el-form-item>
                <el-form-item label="Tipo" prop="type">
                    <el-select v-model="formGeneral.type" placeholder="Selecciona una opción">
                        <el-option label="Diseño Web" value="web-design"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="Descripcion" prop="description">
                    <el-input type="textarea" v-model="formGeneral.description"></el-input>
                </el-form-item>
                <el-form-item label="Fecha de inicio" prop="start">

                    <el-date-picker
                        type="date"
                         format="yyyy-MM-dd"
                        placeholder="Escoge una fecha"
                        v-model="formGeneral.start"
                        style="width: 100%;"></el-date-picker>

                </el-form-item>
                <el-form-item label="Fecha de Finalización" prop="finish">

                    <el-date-picker
                    format="yyyy-MM-dd"
                        type="date"
                        placeholder="Escoge una fecha"
                        v-model="formGeneral.finish"
                        style="width: 100%;"></el-date-picker>

                </el-form-item>
            </el-form>

        </tab-content>
        <tab-content
            title="Equipos"
            icon="fa fa-users"
            :before-change="validateSecondStep">
            <el-form
                :inline="true"
                :model="formTeam"
                class="demo-form-inline"
                :rules="trules"
                ref="teamForm"
                label-width="220px">
                <el-form-item label="Equipos" prop="teams">
                    <el-select v-model=" formTeam.teams" multiple="multiple" placeholder="Select">
                        <el-option
                            v-for="item in formTeam.oTeams"
                            :key="item.value"
                            :label="item.label"
                            :value="item.value"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="Cliente" prop="client">
                    <el-select v-model="formTeam.client" placeholder="Selecciona un Cliente">
                        <el-option
                            v-for="item in formTeam.oClient"
                            :key="item.value"
                            :label="item.label"
                            :value="item.value"></el-option>
                    </el-select>
                </el-form-item>
            </el-form>
        </tab-content>

        <el-button type="primary" slot="prev">Atras</el-button>
        <el-button type="primary" slot="next">Siguiente</el-button>
        <el-button type="primary" slot="finish">Finalizar</el-button>
    </form-wizard>

</template>

<script>

    //* vue
    import {FormWizard, TabContent} from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'

    export default {
        // ...

        components: {
            FormWizard,
            TabContent
        },
        data() {
            return {
                propswizzard: {
                    title: {
                        type: String,
                        default: 'Awesssadsdome Wizard'
                    },
                    subtitle: {
                        type: String,
                        default: 'Split a complicated flow in multiple steps'
                    }
                },
                formGeneral: {
                    name: '',
                    type: '',
                    description: '',
                    start: '',
                    finish: ''
                },
                grules: {
                    name: [
                        {
                            required: true,
                            message: 'Porfavor escribe un nombre del proyecto',
                            trigger: 'blur'
                        }
                    ],
                    type: [
                        {
                            required: true,
                            message: 'Porfavor selecciona un tipo',
                            trigger: 'change'
                        }
                    ],
                    description: [
                        {
                            required: true,
                            message: 'Porfavor escribe una descripcion',
                            trigger: 'blur'
                        }
                    ],
                    start: [
                        {
                            type: 'date',
                            required: true,
                            message: 'Porfavor selecciona una fecha',
                            trigger: 'change'
                        }
                    ],
                    finish: [
                        {
                            type: 'date',
                            required: true,
                            message: 'Porfavor selecciona una fecha',
                            trigger: 'change'
                        }
                    ]
                },
                formTeam: {
                    teams: [],
                    client: '',
                    oTeams: [],
                    oClient: []
                },

                trules: {
                    teams: [
                        {
                            required: true,
                            message: 'Porfavor selecciona al menos un equipo',
                            trigger: 'blur'
                        }
                    ],
                    client: [
                        {
                            required: true,
                            message: 'Porfavor selecciona un cliente',
                            trigger: 'blur'
                        }
                    ]
                }
            }
        },
        methods: {
            readTeams() {

                window
                    .axios
                    .get('/api/teams')
                    .then(({data}) => {
                        data.forEach(team => {
                            let ot = {
                                'value': '',
                                'label': ''
                            };
                            console.log(team);
                            ot.value = team.id;
                            ot.label = team.description;
                            this
                                .formTeam
                                .oTeams
                                .push(ot);
                        });
                        this.mute = false;
                    });
            },
            saveProject() {
                
                var Form = this.formGeneral;
                this.formGeneral.other = this.formTeam;
                console.log(Form);
                window
                    .axios
                    .post('/api/projects', Form)
                    .then(function (resp) {
                        console.log(resp);
                        //  app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your company");
                    });
            },
            readClients() {

                window
                    .axios
                    .get('/api/clients')
                    .then(({data}) => {
                        data.forEach(client => {
                            let oc = {
                                'value': '',
                                'label': ''
                            };
                            console.log(client);
                            oc.value = client.id;
                            oc.label = client.name;
                            this
                                .formTeam
                                .oClient
                                .push(oc);
                        });
                        this.mute = false;
                    });
            },
            onComplete: function () {
               /* alert('Yay. Done!');
                /*tableData.push(
                    {date: '2016-05-03', name: 'Tom', address: 'No. 189, Grove St, Los Angeles'}
                );*/
                this.saveProject();
            },
            validateFirstStep() {
                return new Promise((resolve, reject) => {
                    this
                        .$refs
                        .generalForm
                        .validate((valid) => {
                            resolve(valid);
                        });
                })
            },
            validateSecondStep() {
                return new Promise((resolve, reject) => {
                    this
                        .$refs
                        .teamForm
                        .validate((valid) => {
                            resolve(valid);
                        });
                })
            }
        },
        created() {
            this.readTeams();
            this.readClients();
        }

    }
</script>