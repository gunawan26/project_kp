import store from '@/js/store.js'


export function setup(axios_param) {
    axios_param.interceptors.request.use(function (config) {
        let user = JSON.parse(localStorage.getItem('user'))
        if (user != null) {
            console.log("token dari user", user)
            config.headers.Authorization = `Bearer ${user.token}`;
        }
        return config;

    }, function (err) {
        console.log("error nih")
        return Promise.reject(err);
    });

    axios_param.interceptors.response.use(function (config) {
        console.log("no error")
        return config
    }, function (err) {

        console.log("respone error di interceptor", err.response.status)
        if (err.response.status == 401) {
            store.dispatch('authFailed')
            next('/login');
            console.log("keluar cuy")
        }
        // console.log()

        return Promise.reject(err);
    });
}
