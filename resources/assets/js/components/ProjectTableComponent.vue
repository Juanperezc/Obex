<template>
<table class="table table-hover">
                <tbody v-for="p in projects">
                <tr>
                    <td class="project-status">
                        <span class="label label-primary">Activo</span>
                    </td>
                    <td class="project-title">
                        <a href="project_detail.html">{{ p.name }}</a>
                        <br>
                        <small>Creado el {{ p.start }}</small>
                    </td>
                    <td class="project-completion">
                            <small>Completación: 48%</small>
                            <div class="progress progress-mini">
                                <div style="width: 48%;" class="progress-bar"></div>
                            </div>
                    </td>
                    <td class="project-people">
                        <a href=""><img alt="image" class="img-circle" src="/images/a3.png"></a>
                        <a href=""><img alt="image" class="img-circle" src="/images/a1.png"></a>
                        <a href=""><img alt="image" class="img-circle" src="/images/a2.png"></a>
                        <a href=""><img alt="image" class="img-circle" src="/images/a4.png"></a>
                        <a href=""><img alt="image" class="img-circle" src="/images/a5.png"></a>
                    </td>
                    <td class="project-actions">
                        <a href="project/1" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> Ver </a>
                        
                    </td>
                </tr>
                <tr>
                    <td class="project-status">
                        <span class="label label-primary">Activo</span>
                    </td>
                    <td class="project-title">
                        <a href="project_detail.html">Hay diferentes variaciones</a>
                        <br>
                        <small>Creado el 11.08.2014</small>
                    </td>
                    <td class="project-completion">
                        <small>Completación: 28%</small>
                        <div class="progress progress-mini">
                            <div style="width: 28%;" class="progress-bar"></div>
                        </div>
                    </td>
                    <td class="project-people">
                        <a href=""><img alt="image" class="img-circle" src="/images/a7.png"></a>
                        <a href=""><img alt="image" class="img-circle" src="/images/a6.png"></a>
                        <a href=""><img alt="image" class="img-circle" src="/images/a3.png"></a>
                    </td>
                    <td class="project-actions">
                        <a href="project/2" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> Ver </a>
                        
                    </td>
                </tr>
                <tr>
                    <td class="project-status">
                        <span class="label label-default">Inactivo</span>
                    </td>
                    <td class="project-title">
                        <a href="project_detail.html">Muchos paquetes disponibles para la web</a>
                        <br>
                        <small>Creado el 10.08.2014</small>
                    </td>
                    <td class="project-completion">
                        <small>Completación: 8%</small>
                        <div class="progress progress-mini">
                            <div style="width: 8%;" class="progress-bar"></div>
                        </div>
                    </td>
                    <td class="project-people">
                        <a href=""><img alt="image" class="img-circle" src="/images/a3.png"></a>
                        <a href=""><img alt="image" class="img-circle" src="/images/a5.png"></a>
                    </td>
                    <td class="project-actions">
                        <a href="project/1" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> Ver </a>
                        
                    </td>
                </tr>
                <tr>
                    <td class="project-status">
                        <span class="label label-primary">Activo</span>
                    </td>
                    <td class="project-title">
                        <a href="project_detail.html">Lorem ipsum dolor sit, amersdfa</a>
                        <br>
                        <small>Creado el 22.07.2014</small>
                    </td>
                    <td class="project-completion">
                        <small>Completación: 83%</small>
                        <div class="progress progress-mini">
                            <div style="width: 83%;" class="progress-bar"></div>
                        </div>
                    </td>
                    <td class="project-people">
                        <a href=""><img alt="image" class="img-circle" src="/images/a2.png"></a>
                        <a href=""><img alt="image" class="img-circle" src="/images/a3.png"></a>
                        <a href=""><img alt="image" class="img-circle" src="/images/a1.png"></a>
                        <a href=""><img alt="image" class="img-circle" src="/images/a7.png"></a>
                    </td>
                    <td class="project-actions">
                        <a href="project/3" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> Ver </a>
                        
                    </td>
                </tr>
                <tr>
                    <td class="project-status">
                        <span class="label label-primary">Activo</span>
                    </td>
                    <td class="project-title">
                        <a href="project_detail.html">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis non doloremque, at sapiente atque a qui veritatis, nihil hic fugiat totam! Aliquid nobis culpa maiores tempora ipsum laborum itaque blanditiis.</a>
                        <br>
                        <small>Creado el 22.07.2014</small>
                    </td>
                    <td class="project-completion">
                        <small>Completación: 83%</small>
                        <div class="progress progress-mini">
                            <div style="width: 83%;" class="progress-bar"></div>
                        </div>
                    </td>
                    <td class="project-people">
                        <a href=""><img alt="image" class="img-circle" src="/images/a2.png"></a>
                        <a href=""><img alt="image" class="img-circle" src="/images/a3.png"></a>
                        <a href=""><img alt="image" class="img-circle" src="/images/a1.png"></a>
                    </td>
                    <td class="project-actions">
                        <a href="project/4" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> Ver </a>
                        
                    </td>
                </tr>
                </tbody>
            </table>
</template>
<script>
  function Project({ id, name, description }) {
    this.id = id;
    this.name = name;
    this.description = description;
  }
  export default {
    data() {
      return {
        projects: [],
        working: false
      }
    },
    methods: {
      read() {
        this.mute = true;
        window.axios.get('/api/projects').then(({ data }) => {
          data.forEach(project => {
            this.projects.push(project);
          });
          this.mute = false;
        });
      }
    },
 
  
    created() {
      this.read();
    }
  }
</script>