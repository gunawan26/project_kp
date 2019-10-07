export function createOrUpdateHeader(axios_param, payload) {

    return new Promise((resolve, reject) => {
        axios_param.post('/api/auth/update-insert-data-header',
                payload, {
                    config: {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                }

            )
            .then((result) => {
                console.log("mau buat data", result)
                resolve(result.data)
            }).catch((err) => {
                console.log("err buat data", err)
                reject(err)
            });
    });

}

export function loadHeaderdata(axios_param) {

    return new Promise((resolve, reject) => {
        axios_param.get('/api/auth/get-data-header').then((result) => {
            console.log("mau get data", result)
            resolve(result.data)
        }).catch((err) => {
            console.log("err data", result)
            reject(err)
        });
    })


}
