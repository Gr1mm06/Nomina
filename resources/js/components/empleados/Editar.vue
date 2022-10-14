<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Editar Empleado
                        </h4>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="actualizar">
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
                                <div class="mb-3">
                                    <label class="form-label">Tipo de contrato: </label>
                                    <select v-model="empleado.estado" class="form-control">
                                        <option :selected="empleado.estado === 0" value="0" > Inactivo </option>
                                        <option :selected="empleado.estado === 1" value="1" > Activo </option>
                                    </select>
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
    name: "editar-empleado",
    data(){
        return{
            empleado:{
                codigo:"",
                nombre:"",
                apellido_paterno:"",
                apellido_materno:"",
                email:"",
                tipo_contrato:"",
                estado:"",
            }
        }
    },
    mounted() {
        this.mostrarEmpleado()
    },
    methods: {
       async mostrarEmpleado() {
           await this.axios.get(`/api/empleado/${this.$route.params.id}`)
               .then( response => {
                   const {
                       codigo,
                       nombre,
                       apellido_paterno,
                       apellido_materno,
                       email,
                       tipo_contrato,
                       estado } = response.data
                   this.empleado.codigo = codigo
                   this.empleado.nombre = nombre
                   this.empleado.apellido_paterno = apellido_paterno
                   this.empleado.apellido_materno = apellido_materno
                   this.empleado.email = email
                   this.empleado.tipo_contrato = tipo_contrato
                   this.empleado.estado = estado
               })
               .catch( error => {
                   console.log(error);
               });
           console.log(this.empleado)
        },
        async actualizar() {
            await this.axios.put(`/api/empleado/${this.$route.params.id}`, this.empleado)
                .then( response => {
                    this.$router.push({
                        name: 'mostrar'
                    })
                })
                .catch( error => {
                    console.log(error);
                });
        }
    }
}
</script>

<style scoped>

</style>
