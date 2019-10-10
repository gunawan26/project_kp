export default {


    state: {
        data_dokumen: {},
        isUpToDate: false,
        isAcceptChange: false,


    },
    getters: {
        dataDokumen(state) {
            return state.data_dokumen
        }
    },
    mutations: {
        STORE_DATA(state, payload) {
            state.data_dokumen = Object.assign({}, payload)
            console.log("state data dokumen", state.data_dokumen)
        },

        SAVE_TO_LOCALSTORAGE(state) {
            localStorage.setItem(`document-${state.data_dokumen.id}`, state.data_dokumen)
        }


    },
    actions: {
        fetchDataDokumen(context, payload) {
            context.commit("STORE_DATA", payload)
        }
    }

}
