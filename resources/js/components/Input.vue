<template>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Agenda</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Hari</label>
                    <input type="text" v-model="agenda.hari" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Kegiatan</label>
                    <input type="text" v-model="agenda.kegiatan" class="form-control" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger btn-sm" @click.prevent="simpan">Tambahkan</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'Input',
        data() {
            return {
                agenda: {
                    hari: '',
                    kegiatan: ''
                }
            }
        },
        methods: {
            simpan() {
                this.$store.dispatch('simpanAgenda', this.agenda)
                this.agenda = {
                    hari: '',
                    kegiatan: ''
                }
            },
            simpanAgenda({ commit, state }, agenda) {
                state.isLoading = true
                setTimeout(() => {
                    commit('KONFIRMASI_AGENDA', agenda)
                    state.isLoading = false
                }, 1500)
            }
        }
    }
</script>