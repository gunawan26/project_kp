export function createFileApi(axios_param, payload, token) {



    return new Promise((res, rej) => {
        axios_param.post('/api/auth/add-new-document', payload).then(response => {
            console.log(response)
            res(response.data);

        }).catch(err => {
            rej(err)
        })

    })
}


export function openFileApi(axios_param, id_dokumen, header) {

    return new Promise((res, rej) => {
        axios_param.get('/api/auth/get-document/' + id_dokumen).then((result) => {
            res(result)
        }).catch((err) => {
            rej(err)
        });
    })
}
