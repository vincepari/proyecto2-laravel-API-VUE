<template>
    <h1>MIii Perfil</h1>
    <h2>{{usuario?.email}}</h2>
    <button @click="funSalir()">Salir</button>

</template>

<script setup>
import {ref, onMounted} from "vue";
import { useRoute, useRouter } from "vue-router";
import * as authService from "../../services/auth.service"

const usuario = ref(null);
const router = useRouter()

onMounted(()=>{
    funPerfil()
})

async function funPerfil(){
    const {data} = await authService.obtenerPerfil()
    usuario.value = data
}

const funSalir = async()=>{
    const {data} = await authService.obtenerSalir();
    localStorage.removeItem("access_token");
    router.push("/login")
}
</script>
