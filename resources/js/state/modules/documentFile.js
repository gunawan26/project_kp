import {
    createHelpers
} from 'vuex-map-fields';

import {
    getField,
    updateField
} from "vuex-map-fields";
import store from '../store';

export default {


    state: {
        data_dokumen: {
            number: '',
            attachmentname: '',
            customername: '',
            subject: '',
            discussion_date: '',
            discussion_loc: '',
            offerprice: '',
            duration: '',
            offerduetime: '',
            updated_at: '',
            id: ''
        },

        isUpToDate: true,
        isAcceptChange: false,


    },
    getters: {
        getDocumentFields(state) {
            return getField(state.data_dokumen);
        },
        dataDokumen(state) {
            return state.data_dokumen
        },
        getUpdateLocal(state, documentId) {
            return localStorage.getItem(`document-${documentId}`)
        },
        isUpToDate(state) {
            console.log("kesini")
            return state.isUpToDate;
        }
    },
    mutations: {
        updateDocumentFields(state, field) {
            updateField(state.data_dokumen, field)
            localStorage.setItem(`document-${state.data_dokumen.id}`, JSON.stringify(state.data_dokumen))

        },
        NOT_UPDATE(state) {
            console.log("value updated")
            state.isUpToDate = false
        },


        STORE_DATA(state, payload) {
            state.data_dokumen = Object.assign({}, payload)
            console.log("state data dokumen", state.data_dokumen)
        },

        SAVE_TO_LOCALSTORAGE(state) {
            console.log("saving", state.data_dokumen.id)
            localStorage.setItem(`document-${state.data_dokumen.id}`, JSON.stringify(state.data_dokumen))
        },
        SET_TO_LOCAL(state) {
            let dataReplace = JSON.parse(localStorage.getItem(`document-${state.data_dokumen.id}`))
            state.data_dokumen = Object.assign({}, dataReplace)
        },



    },
    actions: {
        fetchDataDokumen(context, payload) {
            try {
                let onlineDateUpdate = new Date(payload.dataFromDb.updated_at)
                context.commit("STORE_DATA", payload.dataFromDb)
                console.log("last database update", onlineDateUpdate, payload.idDoc)

                let localDateUpdate = JSON.parse(localStorage.getItem(`document-${payload.idDoc}`))
                localDateUpdate = new Date(localDateUpdate.updated_at)

                console.log("last local update", localDateUpdate)
                if (localDateUpdate > onlineDateUpdate) {
                    context.commit("NOT_UPDATE")
                    console.log("database behind the local")

                }

            } catch (error) {
                console.log(error)
                context.commit("STORE_DATA", payload.dataFromDb)
            }
            console.log("dia keisni")
        },
        saveToLocalStorage(context) {
            context.commit("SAVE_TO_LOCALSTORAGE")
        },
        changeToLocal(context) {
            context.commit("SET_TO_LOCAL")

        }


    }

}
