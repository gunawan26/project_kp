// import Axios from "axios";


export function createOrUpdateHeader(payload) {

    return new Promise((resolve, reject) => {
        axios.post('/api/auth/update-insert-data-header',
                payload, {
                    config: {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                }

            )
            .then((result) => {
                console.log(result)
                resolve(result.data)
            }).catch((err) => {
                console.log(err)
                reject(err)
            });
    });

}

export function loadHeaderdata() {

    return new Promise((resolve, reject) => {
        axios.get('/api/auth/get-data-header').then((result) => {
            resolve(result.data)
        }).catch((err) => {
            reject(err)
        });
    })


}
