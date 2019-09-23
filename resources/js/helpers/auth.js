// import Axios from "axios";

export function login(credentials) {
    console.log("masuk sini")
    return new Promise((res, rej) => {
        axios.post('/api/auth/login', credentials)
            .then((response) => {
                res(response.data);
            })
            .catch((err) => {
                rej("wrong email or password");
            })
    })
}


export function getLocalUsers() {
    const userStr = localStorage.getItem("user");

    if (!userStr) {
        return null;
    }

    return JSON.parse(userStr);
}
