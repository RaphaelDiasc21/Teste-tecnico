<template>
    <Clients />
</template>

<script>
import Clients from './clients/Clients';

import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'jquery';
import 'popper.js/dist/popper';
import 'bootstrap/dist/js/bootstrap';
export default {
  name: 'Main',
  components:{
    Clients
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
