import Vue from 'vue';
import Vuex from 'vuex';
import {
    getLocalUsers
} from "./helpers/auth";


const user = getLocalUsers();

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        isLoading: false,
        listAgenda: [
        ],
        /**
         * 
         * 
         * login dev 
         */
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
        auth_error: null,


    },
    getters: {
        isLoading(state) {
            return state.loading;
        },
        isLoggedIn(state) {
            return state.isLoggedIn;
        },
        currentUser(state) {

            return state.currentUser;
        },
        auth_error(state) {
            return state.auth_error;

        },

    },
    mutations: {
        KONFIRMASI_AGENDA: (state, agenda) => {
            state.listAgenda.push(agenda)
        },
        login(state) {
            state.loading = true;
            state.auth_error = null;
        },
        loginSuccess(state, payload) {
            state.auth_error = null;
            state.isLoggedIn = true;
            state.loading = false;
            state.currentUser = Object.assign({}, payload.user, {
                token: payload.access_token
            });

            localStorage.setItem("user", JSON.stringify(state.currentUser));
        },
        loginFailed(state, payload) {
            state.loading = false;
            state.auth_error = payload.error;
        },
        logOut(state) {
            localStorage.removeItem("user");
            state.isLoggedIn = false;
            state.currentUser = null;

        }

    },
    actions: {
        simpanAgenda({
            commit,
            state
        }, agenda) {
            state.isLoading = true
            setTimeout(() => {
                commit('KONFIRMASI_AGENDA', agenda)
                state.isLoading = false
            }, 1500)
        },
        login(context) {
            context.commit("login");
        }
    }
})
