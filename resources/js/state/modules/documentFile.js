import Vue from 'vue';
import {
    getField,
    updateField
} from "vuex-map-fields";


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
            id: '',
            dataPayload: ''


        },



        isUpToDate: true,
        isAcceptChange: false,
        categoryId: 1

    },
    getters: {
        getField,

        getDocumentFields(state) {
            return getField(state.data_dokumen);
        },
        getDocumentData(state) {
            return state.data_dokumen
        },
        getCategoryId(state) {
            return state.categoryId
        },
        getIdDokumen(state) {
            return state.data_dokumen.id
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
        },
        getDataPayload(state) {
            return state.data_dokumen.dataPayload
        }

    },
    mutations: {
        updateField,
        INCEREMENT_CATEGORYID(state) {
            state.categoryId++
        },
        DELETE_CATEGORY(state, idNumber) {
            state.data_categories.splice(idNumber, 1);
        },


        updateDocumentFields(state, field) {
            updateField(state.data_dokumen, field)
            state.data_dokumen.updated_at = new Date().getTime()
            // state.data_dokumen.dataPayload = 
            console.log("field", field)
            localStorage.setItem(`document-${state.data_dokumen.id}`, JSON.stringify(state.data_dokumen))
            console.log("new saved")
        },

        NOT_UPDATE(state) {
            console.log("value updated")
            state.isUpToDate = false
        },
        RESET_UPDATE(state) {
            console.log("value reset")
            state.isUpToDate = true
        },
        STORE_DATA(state, payload) {
            state.data_dokumen = Object.assign({}, payload)
            console.log("state data dokumen", state.data_dokumen)
        },

        SAVE_TO_LOCALSTORAGE(state) {
            console.log(state.data_dokumen.id)
            if (state.data_dokumen.id.length != 0) {
                console.log("saving to local storage", state.data_dokumen.id)

                localStorage.setItem(`document-${state.data_dokumen.id}`, JSON.stringify(state.data_dokumen))
            } else {
                console.log('Not Saving To Local Storage !')
                console.log("data dokumen", state.data_dokumen)

            }
        },
        SET_TO_LOCAL(state) {
            let dataReplace = JSON.parse(localStorage.getItem(`document-${state.data_dokumen.id}`))
            console.log("data replace", dataReplace)
            state.data_dokumen = Object.assign({}, dataReplace)
        },


        UPDATE_PAYLOAD_DATA(state, payload) {
            console.log("payload data", payload)
            // state.data_dokumen.dataPayload = payload
            let dataPayload = {
                dataPayload: JSON.stringify(payload),
                updated_at: new Date().getTime()
            }
            // let dataReplace = Object.assign({
            //     state
            // })
            // console.log("data_replace", dataReplace)
            Vue.set(state.data_dokumen, 'updated_at', dataPayload.updated_at)
            Vue.set(state.data_dokumen, 'dataPayload', dataPayload.dataPayload)
            // state.data_dokumen = Object.assign({}, dataReplace)
            // state.data_dokumen = {
            //     ...state.data_dokumen,
            //     dataPayload
            // }
            console.log("data dokumen stelah update", state.data_dokumen)
        }



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

        },
        updatepayloadData(context, payload) {
            console.log("payload di updatepaload", payload)
            context.commit("UPDATE_PAYLOAD_DATA", payload)
            context.commit("SAVE_TO_LOCALSTORAGE")
        }




    }

}
