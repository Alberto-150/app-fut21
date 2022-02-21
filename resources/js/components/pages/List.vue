<template>
    <div class="container-main">
        <div class="container-main--list-players">
            <ListPlayers></ListPlayers>
        </div>
    </div>
</template>

<script>
import ListPlayers from './ListPlayers.vue'

export default {
    components: {
        'ListPlayers': ListPlayers,
    },
}
</script>
