<template>
  <v-row justify="center">
    <v-dialog
      v-model="dialog"
      max-width="290" persistent
    >
      <v-card>
        <v-card-title class="headline">Melanjutkan File</v-card-title>

        <v-card-text>
          Terdapat perubahan yang belum disimpan. Apakah anda ingin melanjutkan perubahan tersebut?
        </v-card-text>

        <v-card-actions>
          <div class="flex-grow-1"></div>

          <v-btn
            color="red darken-1"
            text
            @click="updateSts(false)"
          >
            Tidak
          </v-btn>

          <v-btn
            color="green darken-1"
            text
            @click="updateSts(true)"
          >
            Setuju
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>


<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      dialog: false
    };
  },
  mounted(){
    this.dialog = false;
  },
  methods: {
    IsUpdating(stsUpdate) {
      this.dialog = stsUpdate;
    },
    updateSts(status_val) {
      this.dialog = false;
      if (status_val) {
        console.log("id", this.$store.data_dokumen);
        this.$store.dispatch("changeToLocal");
      }
      this.$emit("update", status_val);
    }
  },
  computed: {
    status() {
      return this.$store.getters.isUpToDate;
    }
  },
  watch: {
    status(newValue, oldValue) {
      this.IsUpdating(!newValue);
      console.log("status db sekarang ", newValue);
    }
  },
  props: ["sts-update"]
};
</script>