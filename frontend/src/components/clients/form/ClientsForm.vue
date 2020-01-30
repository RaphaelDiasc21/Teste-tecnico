<template>
    <form class="form-group" @submit.prevent="getClient">
        <label>Nome:</label>
        <input class="form-control" type="text" v-model="nome" />

        <label>Email:</label>
        <input class="form-control" type="text" v-model="email" />

        <label>Telefone:</label>
        <input class="form-control" type="text" v-model="telefone" />

        <label>Estado:</label>
        <input class="form-control" type="text" v-model="estado" />

        <label>Cidade:</label>
        <input class="form-control" type="text" v-model="cidade" />

        <label>Data de nascimento</label>
        <input class="form-control" type="date" v-model="data_de_nascimento">
        
        Assinatura:<select class="form-control" v-model="plan_id">
                        <option v-for="plan in plans" :value="plan.id">{{plan.nome}}</option>
                    </select>
        <button class="btn btn-primary">Cadastrar</button>
    </form>
</template>
<script>
    import axios from 'axios';

    export default{
        data:function(){
            return {
                nome:'',
                email:'',
                telefone:'',
                estado:'',
                cidade:'',
                data_de_nascimento:'',
                plans:[],
                plan_id:''
            }
        },
        methods:{
            getClient(){
                let client = {
                    nome:this.nome,
                    email:this.email,
                    telefone:this.telefone,
                    estado:this.estado,
                    cidade:this.cidade,
                    data_de_nascimento:this.data_de_nascimento,
                    plan_id:this.plan_id
                }
                this.$emit('insert',client);
            },
            getPlans(){
                axios.get('http://localhost:8000/api/plans')
                .then(resp =>{
                    this.plans = resp.data.plans
                    console.log(resp)
                })
            }   
        },
        mounted(){
            this.getPlans()
        }
    }
</script>