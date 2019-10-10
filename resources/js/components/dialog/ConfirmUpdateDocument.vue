<template>
  <v-row justify="center">
    <v-btn
      color="primary"
      dark
      @click.stop="dialog = true"
    >
      Open Dialog
    </v-btn>

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
export default {
  data() {
    return {
      dialog: true
    };
  },
  methods: {
    updateSts(status_val) {
      this.dialog = false;

      this.$emit("update", status_val);
    }
  },
  props: ["update-status"]
};
</script>