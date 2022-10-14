<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Crear Empleado
                        </h4>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="crear">
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">Codigo Empleado: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="empleado.codigo"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nombre: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="empleado.nombre"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Apellido Paterno: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="empleado.apellido_paterno"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Apellido Materno: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="empleado.apellido_materno"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="empleado.email"
                                    >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tipo de contrato: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="empleado.tipo_contrato"
                                    >
                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-success" type="submit">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "crear-empleado",
    data(){
        return{
            empleado:{
                codigo:"",
                nombre:"",
                apellido_paterno:"",
                apellido_materno:"",
                email:"",
                tipo_contrato:"",
            }
        }
    },
    methods:{
        async  crear(){
            await this.axios.post('/api/empleado', this.empleado)
                .then(response =>{
                    this.$router.push({name:"mostrar"})
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>
