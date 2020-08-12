<template>
    <div class="col-xs-12 col-sm-10 col-md-4">
        <div class="card border-secondary bg-light mb-4">
            <img class="card-img-top" src="/images/avatar.jpg" alt="Card image">
            <div class="card-body padding">
                <h2 class="card-title">
                    <a :href="'/empleados/' + empleado.id">
                        {{ empleado.nombre }}
                    </a>
                </h2>
                <h5 class="card-subtitle mb-2">Email: {{ empleado.email }} </h5>
                <h5 class="card-subtitle mb-2">Sexo: {{ empleado.sexo }} </h5>
                <h5 class="card-subtitle mb-2">Área: {{ empleado.area }} </h5>
                <h5 class="card-subtitle mb-2">Boletin: {{ empleado.boletin }} </h5>
                <p class="card-text">{{ empleado.descripcion }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        empleado: {
            type: Object
        }
    }
}
</script>