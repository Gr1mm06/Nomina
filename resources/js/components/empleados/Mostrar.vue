<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <router-link :to='{name:"crear"}' class="btn btn-success">
                    <i class="fa-solid fa-circle-plus"></i>
                    Nuevo
                </router-link>
            </div>
            <div class="col-md-12 mb-4">
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th>
                                    Codigo
                                </th>
                                <th>
                                    Nombre Empleado
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Tipo Contrato
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="empleado in empleados" :key="empleado.id">
                                <td>{{ empleado.codigo }}</td>
                                <td>{{ empleado.nombre }} {{ empleado.apellido_paterno }} {{ empleado.apellido_materno }}   </td>
                                <td>{{ empleado.email }} </td>
                                <td>{{ empleado.tipo_contrato }} </td>
                                <td>
                                    <p v-if="empleado.estado == 1">Activo</p>
                                    <p v-else>Inactivo</p>
                                </td>
                                <td>
                                    <div v-if="empleado.estado == 1">
                                        <router-link
                                            :to='{name:"editar", params:{id:empleado.id}}'
                                            class="btn btn-primary"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Editar empleado"
                                        >
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </router-link>
                                        <a
                                            type="button"
                                            @click="borrarEmpleado(empleado.id)"
                                            class="btn btn-danger"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Borrar empleado"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                    <a
                                        type="button"
                                        @click="cambiarEstado(empleado.id,empleado.estado)"
                                        class="btn btn-warning"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Cambiar de estado"
                                    >
                                        <i class="fa-solid fa-shield-halved"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Empleados",
    data(){
        return {
            empleados : []
        }
    },
    mounted() {
        this.mostrarEmpleados()
    },
    methods : {
        async mostrarEmpleados() {
           await this.axios.get('/api/empleado')
               .then( response => {
                   this.empleados = response.data
               })
               .catch( error => {
                   this.empleados = []
               })
        },
        borrarEmpleado(id){
            if (confirm('¿Desea borrar el empleado?')) {
                this.axios.delete(`/api/empleado/${id}`)
                    .then( response => {
                        this.mostrarEmpleados()
                    })
                    .catch( error => {
                        console.log(error)
                    })
            }
        },
        cambiarEstado(id, estado){
            if (confirm('¿Desea cambiar el estado del empleado?')) {
                this.axios.get(`/api/cambiarEstado/${id}/${estado}`)
                    .then( response => {
                        this.mostrarEmpleados()
                    })
                    .catch( error => {
                        console.log(error)
                    })
            }
        }
    }
}
</script>

