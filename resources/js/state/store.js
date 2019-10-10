import Vue from 'vue';
import Vuex from 'vuex';
import auth from '@/js/state/modules/auth';
import dokumenfile from '@/js/state/modules/documentFile';

Vue.use(Vuex)

export default new Vuex.Store({
    strict: true,
    modules: {
        auth,
        dokumenfile
    }

})
