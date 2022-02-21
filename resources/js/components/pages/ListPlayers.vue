<template>
    <div class="container-main">
        <div class="container-main--list-players">
            <div class="search">
                <input type="text" v-model="team" placeholder="Buscar por equipo...">
                <button @click="search()">BUSCAR</button>
            </div>
            <ul class="list">
                <li v-for="(player) in players" @click="select(player)">
                    <img src="/assets/img/avatar.png" alt="">
                    <p v-text="player.name"></p>
                    <p v-text="player.position"></p>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import store from '../../store'

export default {
    data() {
        return {
            team: "",
        }
    },

    mounted: () => {
        store.dispatch('getToken');
    },

    methods: {
        search: function() {
            store.dispatch('getPlayersForTeam', this.team);
        },
        select(player){
            let route = {
                name: 'player.detail',
                params: {
                    name: player.name, 
                    position: player.position, 
                    team: player.team, 
                    nation: player.nation
                }
            };

            this.$router.push(route);
        }
    },

    computed: {
        players: () => store.state.players
    },
}
</script>
