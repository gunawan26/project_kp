import {
    getLocalUsers
} from "../../helpers/auth";


const user = getLocalUsers();

export default {

    state: {
        isLoading: false,
        listAgenda: [],
        /**
         * 
         * 
         * login dev 
         */
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
        auth_error: null,
        token: null,
        header: {}

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

        get_header() {
            let json_token = JSON.parse(localStorage.getItem('user'))
            console.log("get header", json_token.token)
            // console.log(String(json_token.token))
            return json_token.token
        }

    },
    mutations: {
        KONFIRMASI_AGENDA: (state, agenda) => {
            state.listAgenda.push(agenda)
        },
        LOGIN(state) {
            state.loading = true;
            state.auth_error = null;
        },
        LOGINSUCCESS(state, payload) {
            state.auth_error = null;
            state.isLoggedIn = true;
            state.loading = false;
            state.currentUser = Object.assign({}, payload.user, {
                token: payload.access_token
            });
            localStorage.setItem("user", JSON.stringify(state.currentUser));
            console.log("sukses login")

        },
        LOGINFAILED(state, payload) {
            state.loading = false;
            state.auth_error = payload.error;
        },
        logOut(state) {
            localStorage.removeItem("user");
            state.isLoggedIn = false;
            state.currentUser = null;

        },
        TOKENAUTHFAILED(state) {
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
            context.commit("LOGIN");
        },
        authFailed(context) {
            context.commit("TOKENAUTHFAILED");
        },
        loginSuccess(context, payload) {
            context.commit("LOGINSUCCESS", payload)
        },
        loginFailed(context, payload) {
            context.commit("LOGINFAILED", payload)
        }
    }
}
