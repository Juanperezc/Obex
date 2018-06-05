/*<template>
	<form-wizard @on-complete="onComplete" shape="tab" color="#18A689" ref="wizard" error-color="#ff4949" v-bind:title="title" v-bind:subtitle="subtitle">
		<tab-content title="Personal details" icon="fa fa-user" :before-change="validateFirstStep">
			<el-form :inline="true" :model="formGeneral" class="demo-form-inline" :rules="grules" ref="generalForm" label-width="220px">
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
				<el-form-item label="Fechas" prop="dates">
	
					<el-date-picker  format="yyyy-MM-dd"  value-format="yyyy-MM-dd" v-model="formGeneral.dates" type="daterange" start-placeholder="Fecha de inicio" end-placeholder="Fecha de finalización">
					</el-date-picker>
	
				</el-form-item>
	
	
			</el-form>
	
		</tab-content>
		<tab-content title="Equipos" icon="fa fa-users" :before-change="validateSecondStep">
			<el-form :inline="true" :model="formTeam" class="demo-form-inline" :rules="trules" ref="teamForm" label-width="220px">
				<el-form-item label="Equipos" prop="teams">
					<el-select v-model=" formTeam.teams" multiple="multiple" placeholder="Select">
						<el-option v-for="item in formTeam.oTeams" :key="item.value" :label="item.label" :value="item.value"></el-option>
					</el-select>
				</el-form-item>
				<el-form-item label="Cliente" prop="client">
					<el-select v-model="formTeam.client" placeholder="Selecciona un Cliente">
						<el-option v-for="item in formTeam.oClient" :key="item.value" :label="item.label" :value="item.value"></el-option>
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
	import {
		FormWizard,
		TabContent
	} from 'vue-form-wizard'
	import 'vue-form-wizard/dist/vue-form-wizard.min.css'
	
	export default {
		// ...
	
		components: {
			FormWizard,
			TabContent
		},
		data() {
			return {
	
				title: '',
				subtitle: '',
				formGeneral: {
					name: '',
					type: '',
					description: '',
					start: '',
					finish: '',
					dates: [],
				},
				grules: {
					name: [{
						required: true,
						message: 'Porfavor escribe un nombre del proyecto',
						trigger: 'blur'
					}],
					type: [{
						required: true,
						message: 'Porfavor selecciona un tipo',
						trigger: 'change'
					}],
					description: [{
						required: true,
						message: 'Porfavor escribe una descripcion',
						trigger: 'blur'
					}],
					dates: [{
	
						required: true,
						message: 'Porfavor selecciona una fecha',
						trigger: 'change'
					}],
	
				},
				formTeam: {
					teams: [],
					client: '',
					oTeams: [],
					oClient: []
				},
	
				trules: {
					teams: [{
						required: true,
						message: 'Porfavor selecciona al menos un equipo',
						trigger: 'blur'
					}],
					client: [{
						required: true,
						message: 'Porfavor selecciona un cliente',
						trigger: 'blur'
					}]
				},
				mute: ''
			}
		},
		methods: {
			readTeams() {
	
				window
					.axios
					.get('/api/teams')
					.then(({
						data
					}) => {
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
						// this.mute = false;
					});
			},
			saveProject() {
	
				var Form = this.formGeneral;
				this.formGeneral.other = this.formTeam;
				this.formGeneral.idedit = this.id
				console.log(Form);
				window
					.axios
					.post('/api/projects', Form)
					.then(({
						resp
					}) => {

						this.$swal({
							position: 'top-end',
							type: 'success',
							title: 'El Proyecto se ha guardado correctamente',
							showConfirmButton: false,
							timer: 1500
						})
						if (this.id == null){
                         this.resetFormresetForms();
						}
						
						//   this.mute = true;
					})
					.catch(({
						resp
					}) => {
						console.log(resp);
						alert("Could not create your company");
					});
	
			},
			readEdit() {
				window
					.axios
					.get('/api/projects/' + this.id)
					.then(({
						data
					}) => {
						this.formGeneral.name = data.name;
						this.formGeneral.description = data.description;
						this.formGeneral.type = data.type;
						this.formGeneral.dates.push(data.start);
						this.formGeneral.dates.push(data.finish);
						this.formTeam.client = data.clients.id;
						data.teams.forEach(t => {
							this.formTeam.teams.push(t.id);
						});

					//	this.formGeneral.dates[1] = data.end;
					});
			},
			readClients() {
	
				window
					.axios
					.get('/api/clients')
					.then(({
						data
					}) => {
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
	
					});
	
			},
			onComplete: function() {
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
			},
			resetFormresetForms() {
				this.$refs["generalForm"].resetFields();
				this.$refs["teamForm"].resetFields();
				this.$refs.wizard.reset();
			}
		},
		watch: {
			mute(val) {
	
				console.log(val);
	
				// document.getElementById('mute').className = val ? "on" : "";
			}
		},
		props: ['id'],
		created() {
			this.readTeams();
			this.readClients();
			if (this.id != null) {
	this.readEdit() 
			}
		}
	
	}
</script>*/