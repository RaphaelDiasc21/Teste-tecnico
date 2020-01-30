<template>
    <div class="client-area">
        <ClientsForm @insert="insertClient"></ClientsForm>
        <hr>
        <div>
            <div v-if="deleteErr">Clientes do estado de São Paulo que tenham o Plano Free, Não podem ser excluídos</div>
            <h3>Clientes</h3>
            <Client v-bind:key="client.id" @delete="deleteClient" @plan_deleted="getClients" :client="client" v-for="client in clients" />
        </div>
    </div>
</template>
<script>
import ClientsForm from './form/ClientsForm';
import Client from './client/Client';
import axios from 'axios';

export default {
    name:'Clients',
    data(){
        return{
            clients:[],
            deleteErr:false
        }
    },
    components:{ClientsForm, Client},
    mounted(){
        this.getClients()
    },
    methods:{

        deleteClient(id){
            axios.delete("http://localhost:8000/api/clients/"+id)
            .then(resp =>{
                console.log(resp)
                this.deleteErr = false;
                this.getClients();
            }).catch(err =>{
                this.deleteErr = true;
            })
        },
        getClients(){
            axios.get("http://localhost:8000/api/clients")
            .then(resp =>{

                this.clients = resp.data.clients
            })
        },
        insertClient(client){
            axios.post("http://localhost:8000/api/clients",client)
            .then(resp =>{
                this.getClients();
            })
        }
    }
}
</script>
<style scoped>
    .client-area{
        margin:0 auto;
        width:50%;
    }
</style>