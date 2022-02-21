<template>
    <div class="container-main">
        <div class="container-main--detail-player">
            <div class="container-main--detail-player--foto">
                <img src="/assets/img/avatar.png" alt="">
            </div>
            <div class="container-main--detail-player--information">
                <strong>Nombre: </strong>{{ name }}<br>
                <strong>Equipo: </strong>{{ team }}<br>
                <strong>Posición: </strong>{{ position }}<br>
                <strong>Nación: </strong>{{ nation }}<br>
            </div>
            <router-link class="container-main--detail-player--back-btn" :to="{ name: 'list' }">Volver</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['name', 'position', 'team', 'nation'],

        mounted: function() {
            console.log(this.name)
        },
    }

</script>