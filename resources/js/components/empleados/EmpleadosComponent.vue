<template>
    <section>
        <material-transition-group tag="div" class="row">
            <empleado-card-component v-bind:key="empleado.id" :data-index="index" v-bind:empleado="empleado" v-for="(empleado, index) in empleados">
            </empleado-card-component>
        </material-transition-group>
    </section>
</template>

<script>
import Vue from 'vue'
import axios from 'axios'
export default {
    data() {
        return {
            empleados: [],
            endpoint: '/empleados'
        }
    },
    created() {
        this.fetchEmpleados()
    },
    methods: {
        fetchEmpleados() {
            axios.get(this.endpoint).then((response) => {
                console.log(response.data.data)
                this.empleados = response.data.data
            })
        }
    }
}
</script>