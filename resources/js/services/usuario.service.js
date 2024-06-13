import {http} from "./axios-interceptor";

export default {
    listar(){
        return http().get("/usuario");
    },

    guardar(datos){
        return http().post("/usuario", datos);
    },

    mostrar(id){
        return http().get(`/usuario/${id}`);
    },

    modificar(){
        return http().put(`/usuario/${id}`, datos);
    },

    eliminar(){
        return http().delete(`/usuario/${id}`);
    },

}
