<template>
  <div id="app">
    <NavBar 
      :headerLeftTitle="leftTitle"
      :headerRightTitle="rightTitle"
      :imageData="imageUrl"
      :upperCase="upperTitle"
      :options="menuOptions"
    />
    <div class="container" style="margin-top: 30px">
      <div class="row">
        <div class="col col-lg-3">
          <div class="form-group">
            <label>Titulo Izquierda</label>
            <input class="form-control" type="text" v-model="leftTitle"/>
          </div>
        </div>
        <div class="col col-lg-3">
          <div class="form-group">
            <label>Titulo Derecha</label>
            <input class="form-control" type="text" v-model="rightTitle"/>
          </div>
        </div>
        <div class="col col-lg-3">
          <div class="form-group">
            <label>Url de imagen</label>
            <input class="form-control" type="text" v-model="imageUrl"/>
          </div>
        </div>
        <div class="col col-lg-3">
          <div class="form-group">
            <input class="form-check-input" type="checkbox" id="upper" v-model="upperTitle"/>
            <label for="upper">Mayuscula</label>
          </div>
        </div>
      </div>
      <center style="margin-top: 30px;">
        <h1>Con reuso</h1>
        <p>Fuente: <a href="https://www.npmjs.com/package/vue-carousel">https://www.npmjs.com/package/vue-carousel</a></p>
      </center>
      <carousel :per-page="3" :autoplay="true" :speed="500" :loop="true" :autoplayTimeout="3000">
        <slide>
          <div class="card" style="height: 550px;">
            <img src="https://cli.vuejs.org/favicon.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Vue CLI</h5>
              <p class="card-text">Vue CLI es un conjunto de herramientas para la creación rápida de prototipos, la fácil aplicación de andamios y la gestión eficiente de proyectos.</p>
            </div>
          </div>
        </slide>
        <slide>
          <div class="card" style="height: 550px;">
            <img src="https://i.ytimg.com/vi/IqRcH-htzK0/maxresdefault.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">CLI</h5>
              <p class="card-text">CLI es un paquete npm instalado globalmente, que proporciona una funcionalidad central a través del comando vue. Nos permite crear fácilmente un nuevo proyecto (vue create), o simplemente crear prototipos rápidamente de ideas crudas (vue service). Si queremos un control más concreto y visual sobre nuestros proyectos, podemos abrir la versión GUI de la CLI ejecutando el comando vue ui.</p>
            </div>
          </div>
        </slide>
        <slide>
          <div class="card" style="height: 550px;">
            <img src="https://www.luisllamas.es/wp-content/uploads/2018/01/vuejs.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">CLI Service</h5>
              <p class="card-text">Es una dependencia de desarrollo (un archivo binario vue-cli-service), instalado localmente en cada proyecto creado con la CLI. Nos permite desarrollar nuestro proyecto (vue-cli-service serve), empaquetarlo para la producción (vue-cli-service build), y también inspeccionar la configuración interna del proyecto del paquete web (vue-cli-service inspect).</p>
            </div>
          </div>
        </slide>
        <slide>
          <div class="card" style="height: 550px;">
            <img src="https://miro.medium.com/max/3920/1*oZqGznbYXJfBlvGp5gQlYQ.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Complementos de CLI</h5>
              <p class="card-text">son paquetes npm que proporcionan funciones adicionales a nuestros proyectos. Sus nombres comienzan con @ vue / cli-plugin- (para plugins incorporados) o vue-cli-plugin- (para plugins de comunidad). Podemos agregarlos en cualquier momento del proceso de desarrollo a través del comando vue add.</p>
            </div>
          </div>
        </slide>
      </carousel>
    </div>
  </div>
</template>

<script>
  import "./sass/app.scss"
  import NavBar from './components/NavBar.vue'
  import { Carousel, Slide } from 'vue-carousel'

  export default {
    data() {
      return {
        menuOptions: ['uno','dos','tres','cuatro','cinco'],
        leftTitle: 'ingenieria',
        rightTitle: 'de software',
        upperTitle: true,
        imageUrl: 'https://prod-discovery.edx-cdn.org/media/course/image/0785d834-7f3d-4f56-9fcd-41255e67823c-544c50b565a0.small.jpg',
      }
    },
    watch: {
      leftTitle: function(val) {
        this.leftTitle = val
      },
      rightTitle: function(val) {
        this.rightTitle = val
      }
    },
    name: 'app',
    components: {
      NavBar,
      Carousel,
      Slide
    }
  }

</script> 
