export function createFileApi(payload) {
    console.log("mencoba membuat data");

    return new Promise((res, rej) => {
        axios.post('/api/auth/add-new-document', payload).then(response => {
            res(response.data);
        }).catch(err => {
            rej(response.data)
        })

    })
}
