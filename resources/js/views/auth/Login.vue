<template>
<h1>INGRESAR:{{titulo}}</h1>
<p>{{descripcion}}</p>
{{token}}
<pre>
    {{datos}}
</pre>

<hr>
<label for="e">Ingrese su Correo:</label>
<input type="email" id="e" v-model="datos.email">

 <br>
 <label for="c">Ingrese su contraseña:</label>
<input type="password" id="c" v-model="datos.password">
<br>
<input type="button" value="Ingresar" v-on:click="funIngresar"/>
</template>

<script setup>
import {ref} from "vue"
import * as authService from "../../services/auth.service"
import { useRouter } from "vue-router";
const router = useRouter()
 //variable
        const titulo = ref ("Otro Tilulo 23");
        const descripcion ="Otra descripcion2";
        const token = ref({})
        const datos = ref({email: "admin@mail.com", password: "123456"})
        //metodos
       async function funIngresar(){
        //alert ("Ingresando..2..")
     const {data } = await authService.login(datos.value)
      console.log(data)
      token.value = data
      localStorage.setItem("access_token", data.access_token);

      router.push("/Perfil")
    }
</script>

<!---
<script>
export default {
    setup() {
        //variable
        const titulo = "Otro Tilulo";
        const descripcion = "Otra descripcion";
        //metodos
        function funIngresar(){
        alert ("Ingresando....")
    } return{titulo,descripcion, funIngresar}
    },
}
</script>
--->


