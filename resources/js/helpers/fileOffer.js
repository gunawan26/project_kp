export function createFileApi(payload, token) {



    return new Promise((res, rej) => {
        axios.post('/api/auth/add-new-document', payload).then(response => {

            res(response.data);

        }).catch(err => {
            rej(err)
        })

    })
}


export function openFileApi(id_dokumen, header) {

    return new Promise((res, rej) => {
        axios.get('/api/auth/get-document/' + id_dokumen).then((result) => {
            res(result)
        }).catch((err) => {
            rej(err)
        });
    })
}
