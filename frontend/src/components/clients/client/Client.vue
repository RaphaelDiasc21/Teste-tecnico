<template>
    <div>
    <div class="card mt-4 p-3">
        <div class="client-title">
            <div>
                <h4>{{client.nome}}</h4>
                <small>{{client.data_de_nascimento}}</small>
            </div>
            <div>
                <button class="btn btn-danger" @click="deleteClient">Excluir</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-6">
               Telefone: {{client.telefone}}
            </div>
            <div class="col-sm-12 col-md-6">
                Estado: {{client.estado}}
            </div>
            <div class="col-sm-12 col-md-6">
                Cidade: {{client.cidade}}
            </div>
        </div>
        <h3>Planos</h3>
        <div class="row">
            <div class="col-sm-12 col-md-3" v-bind:key="plan.id" v-for="plan in client.planos">
                {{plan.nome}}
                <button class="btn btn-danger" @click="deletePlan(plan.id)">Excluir Plano</button>
            </div>
        </div>
    </div>    
    </div>
</template>
<script>
import Client_modal from '../modal/Client_modal'
import axios from 'axios';

export default {
    props:{
        client:Object
    },
    data(){
        return{
            id:this.client.id,
            deletedPlan:0
        }
    },
    methods:{
        deletePlan(plan_id){
            console.log(plan_id);
            axios.delete("http://localhost:8000/api/clients/"+this.client.id+"/plan/"+plan_id)
            .then(resp=>{
                console.log(resp)
                this.$emit('plan_deleted')
            })
        },
        getModal(){
            return <Client_modal client="this.client" />
        },
        deleteClient(){
            this.$emit('delete',this.client.id)
        }
    },
    mounted(){
        console.log(this.client.planos[0].nome)
    },
    components:{Client_modal}
}
</script>   
<style scoped>
    .client-title{
        display: flex;
        justify-content: space-around;
    }
</style>