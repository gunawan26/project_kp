// import Axios from "axios";

export function login(credentials) {
    console.log("masuk sini")
    return new Promise((res, rej) => {
        axios.post('/api/auth/login', credentials)
            .then((response) => {
                res(response.data);
                console.log(response.data)
            })
            .catch((err) => {
                rej("wrong email or password");
                console.log(err)
            })
    })
}

export function logout(axios_param) {
    return new Promise((resolve, reject) => {

        axios_param.post('/api/auth/logout').then((result) => {
            resolve(result)
        }).catch((err) => {
            reject(err)
        });

    })

}

export function addUser(axios_param, payload) {
    return new Promise((resolve, reject) => {

        axios_param.post('/api/auth/add_user', payload).then((result) => {
            resolve(result)
        }).catch((err) => {
            reject(err)
        });
    })

}

export function getUserInformation(axios_param) {
    return new Promise((resolve, reject) => {
        axios_param.get('/api/auth/show_user_info').then((result) => {
            resolve(result);
        }).catch((err) => {
            reject(err)
        });
    })

}

export function changeUserInformation(axios_param, payload, type) {

    let route = ''

    if (type === 'change_user_name') {
        route = '/api/auth/change_user_name'
    } else {
        route = '/api/auth/change_password'
    }

    return new Promise((resolve, reject) => {
        axios_param.post(route, payload).then((result) => {
            resolve(result);
        }).catch((err) => {
            reject(err)
        });
    });
}




export function getLocalUsers() {
    const userStr = localStorage.getItem("user");

    if (!userStr) {
        return null;
    }

    return JSON.parse(userStr);
}
