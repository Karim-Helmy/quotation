<template>
  <div class="container margin_60">
    <div class="row">
      <div class="col-xl-12">
        <div class="box_general_3 cart">
          <div class="form_title">
              <slot></slot>
            <h3>
              <strong>1</strong>
              {{ contactinfo }}
            </h3>
          </div>
          <form :action="laravelroute" id="Consultant" method="POST" enctype="multipart/form-data" novalidate>
            <input required type="hidden" name="_token" :value="csrfToken">
            <div class="step">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label>{{ firstname }}</label>
                    <input
                      required
                      type="text"
                      class="form-control"
                      id="firstname_booking"
                      name="firstname_booking"
                      :placeholder="firstname"
                      v-model.lazy="FirstName"
                    >
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label>{{ lastname }}</label>
                    <input
                      required
                      type="text"
                      class="form-control"
                      id="lastname_booking"
                      name="lastname_booking"
                      :placeholder="lastname"
                      v-model.lazy="LastName"
                    >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label>{{ email }}</label>
                    <input
                      required
                      type="email"
                      id="email_booking"
                      name="email_booking"
                      class="form-control"
                      :placeholder="email"
                      v-model.lazy="EmailAddress"
                    >
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label>{{ confirmEmail }}</label>
                    <input
                      required
                      type="email"
                      id="email_booking_confirmation"
                      name="email_booking_confirmation"
                      class="form-control"
                      :placeholder="confirmEmail"
                    >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label>{{ phone }}</label>
                    <input
                      required
                      type="text"
                      id="telephone_booking"
                      name="telephone_booking"
                      class="form-control"
                      :placeholder="phone"
                      v-model.lazy="Phone"
                    >
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="message">{{ message }}</label>
                    <textarea
                      name="message"
                      id="message"
                      style="height: 120px"
                      class="form-control"
                      v-model.lazy="Message"
                    ></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group" v-for="file_ in Files" :key="file_.key">
                    <label :for="'file_'+file_">File / Image</label>
                    <input
                      required
                      type="file"
                      :id="'file_'+file_"
                      name="files[]"
                      @change="showSelectedFile"
                    >
                  </div>
                  <button type="button" class="btn_1" @click="removeFile" v-if="Files > 1">-</button>
                  <button type="button" class="btn_1" @click="addFile">+</button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group text-center mt-30">
                    <b-button v-b-modal.modal-center>{{ submitRequest }}</b-button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <hr>
        </div>
      </div>

      <!-- Modal Component -->
      <b-modal
        id="modal-center"
        no-close-on-backdrop="false"
        :ok-title="'Review Request'"
        centered
        title="BootstrapVue"
      >
        <h5 class="modal-title" slot="modal-header">Submit Request</h5>
        <!-- <div class="text-center"> -->
        <ul>
          <li>
            First Name:
            <strong>{{ FirstName }}</strong>
          </li>
          <li>
            Last Name:
            <strong>{{ LastName }}</strong>
          </li>
          <li>
            Email Address:
            <strong>{{ EmailAddress }}</strong>
          </li>
          <li>
            Phone Number:
            <strong>{{ Phone }}</strong>
          </li>
          <li>
            Message:
            <strong>{{ Message }}</strong>
          </li>
          <li v-if="selectedImages">
            <strong>Selected Files</strong>
            <img
              :src="image"
              v-for="image in selectedImages"
              :key="image.key"
              style="height: 50px;width: 50px; margin: 5px"
            >
          </li>
        </ul>
        <div class="text-center">
            <button form="Consultant" type="submit" class="btn btn-success">Submit Request</button>
        </div>
      </b-modal>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      Files: 1,
      FirstName: "",
      LastName: "",
      EmailAddress: "",
      Message: "",
      Phone: "",
      selectedImages: [],
      csrfToken: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content")
    };
  },
  props: [
    "email",
    "lastname",
    "firstname",
    "contactinfo",
    "laravelroute",
    "confirmEmail",
    "phone",
    "message",
    "submitRequest"
  ],
  methods: {
    addFile() {
      this.Files++;
    },
    removeFile() {
      if (this.Files > 1) {
        this.Files--;
      }
    },
    showSelectedFile(e) {
      let file = e.target.files[0];
      this.selectedImages.push(URL.createObjectURL(file));
    }
  }
};
</script>
<style scoped>
</style>
