import { createApp } from 'vue';
import Vuex from 'vuex'
import Axios from 'axios'

let app = createApp({});
app.use(Vuex)

export default new Vuex.Store({
    state: {
        token: [],
        players: [],
    },
    mutations: {
        setToken(state, token){
            state.token = token
        },
        setPlayers(state, players){
            state.players = players
        },
    },
    actions: {
        getToken(context){
            Axios.post(location.origin + '/api/login', {
                    headers: {
                        'Accept': 'application/json',
                    },
                    userAgent: navigator.userAgent
                }
            ).then(function (response) {
                context.commit('setToken', response.data.token);

                context.dispatch('getPlayers');
            }).catch(function (error) {
                console.log(error);
            })
        },
        getPlayers(context){
            Axios.get(location.origin + '/api/v1/players', {
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${context.state.token}`,
                    },
                }
            ).then(function (response) {
                context.commit('setPlayers', response.data.Players);
            }).catch(function (error) {
                console.log(error);
            })
        },
        getPlayersForTeam(context, team){
            Axios.post(location.origin + '/api/v1/players', 
                {
                    name: team
                }, 
                {
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${context.state.token}`,
                    },
                }
            ).then(function (response) {
                context.commit('setPlayers', response.data.Players);
            }).catch(function (error) {
                console.log(error);
            })
        },
    }
})