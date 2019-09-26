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


export function getLocalUsers() {
    const userStr = localStorage.getItem("user");

    if (!userStr) {
        return null;
    }

    return JSON.parse(userStr);
}
