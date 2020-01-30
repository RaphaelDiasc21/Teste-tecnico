<template>
    <div>
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

        <button class="btn btn-primary" @update="updateClient">Atualizar</button>
    </div>
</template>
<script>
export default {
    props:["client"],
            data:function(){
                return {
                    nome:this.client.nome,
                    email:this.client.email,
                    telefone:this.client.telefone,
                    estado:this.client.estado,
                    cidade:this.client.cidade,
                    data_de_nascimento:this.client.data_de_nascimento
                }
            },
            methods:{
                updateClient(){
                    console.log(...this.data)
                }
            }
        }
</script>