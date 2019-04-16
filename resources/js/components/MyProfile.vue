<template>
  <div class="container margin_60">
    <div class="row">
      <div class="col-xl-8 col-lg-8">
        <nav id="secondary_nav">
          <div class="container">
            <ul class="clearfix">
              <li>
                <a class="active text-capitalize">{{ auth_user.name }} Profile</a>
              </li>
              <li>
                <a href="#sidebar">Booking</a>
              </li>
            </ul>
          </div>
        </nav>
        <div id="section_1">
          <div class="box_general_3">
            <slot></slot>
            <div class="profile">
              <div class="row">
                <div class="col-lg-5 col-md-4 text-center">
                  <figure>
                    <a :href="'/images/users/'+ auth_user.profile_image" target="_blank">
                      <img
                        :src="'/images/users/'+ auth_user.profile_image "
                        class="img-fluid"
                        style="max-height: 300px;"
                      >
                    </a>
                    <form
                      method="POST"
                      enctype="multipart/form-data"
                      :action="uploadProfilePictureRoute"
                    >
                      <input type="hidden" name="_token" :value="csrfToken">
                      <div class="form-group">
                        <label for="profile_image">
                          <i class="pe-7s-photo"></i>
                          <span>{{ uploadProfileSelect }}</span>
                        </label>
                        <input
                          type="file"
                          name="profile_image"
                          id="profile_image"
                          style="display:none;"
                        >
                      </div>
                      <div class="form-group">
                        <button class="btn_1 small" type="submit" title="Upload">
                          <i class="pe-7s-cloud-upload"></i>
                          <br>
                        </button>
                      </div>
                    </form>
                  </figure>

                  <h6>
                    <span class="cursor-pointer" @click="editInfo = !editInfo">
                      Info
                      <i class="icon-edit"></i>
                    </span>
                  </h6>
                  <h6 id="infoSpan" v-if="!editInfo">{{ auth_user.about }}</h6>
                  <form v-if="editInfo">
                    <div class="form-group">
                      <textarea
                        name="info"
                        rows="10"
                        class="form-control"
                        placeholder="Info"
                        style="resize:none;"
                        :value="auth_user.about"
                        ref="newAbout"
                      ></textarea>
                    </div>
                    <button class="btn_1 medium" @click.prevent="updateInfo">
                      <i class="pe-7s-check"></i>
                    </button>
                  </form>
                </div>
                <div class="col-lg-7 col-md-12">
                  <small>{{ auth_user.level }}</small>
                  <h1 class="text-capitalize">{{ auth_user.name }}</h1>
                  <span class="rating">
                    <i
                      class="icon_star voted"
                      v-for="(stars, key, index) in parseInt(userRating)"
                      :key="index"
                    ></i>
                    <small>({{ userRating }})</small>
                    <a
                      data-toggle="tooltip"
                      data-placement="top"
                      data-original-title="Who Rated Me ?"
                      class="badge_list_1"
                    >
                      <img src="/img/badges/badge_1.svg" width="15" height="15" alt>
                    </a>
                  </span>

                  <ul class="statistic">
                    <li>{{ auth_user.viewed }} {{ viewed }}</li>
                    <li>124 Patients</li>
                  </ul>

                  <ul class="contacts">
                    <li>
                      <h6>
                        {{ address }}
                        <span
                          class="cursor-pointer"
                          @click="editAddress = !editAddress; showAddress()"
                        >
                          <i class="icon-edit"></i>
                        </span>
                      </h6>
                      <span ref="addressSpan" v-if="!editAddress">{{ auth_user.address }}</span>
                      <form v-if="editAddress">
                        <div class="form-group">
                          <input
                            type="text"
                            name="address"
                            id="address"
                            class="form-control"
                            ref="newAddress"
                            :value="auth_user.address"
                          >
                        </div>
                        <div class="form-group text-center">
                          <button class="btn_1 medium" @click.prevent="updateAddress">
                            <i class="pe-7s-check"></i>
                          </button>
                        </div>
                      </form>
                    </li>
                    <li>
                      <h6>
                        {{ phone }}
                        <span
                          class="cursor-pointer"
                          @click="editPhone = !editPhone; showPhone()"
                        >
                          <i class="icon-edit"></i>
                        </span>
                      </h6>
                      <span v-if="!editPhone">{{ auth_user.phone }}</span>
                      <form v-if="editPhone">
                        <div class="form-group">
                          <input
                            type="text"
                            name="phone"
                            :value="auth_user.phone"
                            class="form-control"
                            ref="newPhone"
                          >
                        </div>
                        <div class="form-group text-center">
                          <button class="btn_1 medium" @click.prevent="updatePhone">
                            <i class="pe-7s-check"></i>
                          </button>
                        </div>
                      </form>
                    </li>
                    <li>
                      <h6>
                        {{ password }}
                        <span
                          class="cursor-pointer"
                          @click="editPassword = !editPassword; showPassword()"
                        >
                          <i class="pe-7s-settings"></i>
                        </span>
                      </h6>
                      <form :action="changePasswordRoute" method="POST" v-if="editPassword">
                        <input type="hidden" name="_token" :value="csrfToken">
                        <div class="form-grou">
                          <label></label>
                        </div>
                        <div class="form-group">
                          <input
                            type="password"
                            class="form-control"
                            id="password"
                            name="password"
                            :placeholder="password"
                            @input="password_help_desk_1"
                            :class="[passowrd_1_ ? 'is-valid' : 'is-invalid']"
                            ref="password_1"
                            required
                          >
                        </div>
                        <div class="form-group">
                          <input
                            type="password"
                            class="form-control"
                            id="password_confirmation"
                            name="password_confirmation"
                            :placeholder="passwordConfirmation"
                            @input="password_help_desk_2"
                            :class="passowrd_2_ ? 'is-valid' : 'is-invalid'"
                            ref="password_2"
                            required
                          >
                          <small id="passwordHelpBlock" class="form-text text-muted">
                            <br>
                          </small>
                        </div>
                        <div class="form-group text-center">
                          <button class="btn_1 medium" type="submit">{{ update }}</button>
                        </div>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <aside
        class="col-xl-4 col-lg-4"
        id="sidebar"
        style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;"
      >
        <!-- /box_general -->
        <div
          class="theiaStickySidebar"
          style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"
        >
          <div class="box_general_3 booking">
              <div class="title">
                <h3>
                    {{ getLevelTag() }}
                </h3>
              </div>
              <div class="summary" v-for="consultant in user_consultants" :key="consultant.id">
                <ul style="height:100%;overflow: overlay;">
                  <li>
                    Date:
                    <strong class="float-right" :title="consultant.created_at">{{ consultant.created_at | getTime}}</strong>
                  </li>
                  <li>
                    Firstname:
                    <strong class="float-right">{{ consultant.firstname_booking }}</strong>
                  </li>
                  <li>
                    Lastname:
                    <strong class="float-right">{{ consultant.lastname_booking }}</strong>
                  </li>
                  <li>
                    Message:
                    <strong class="float-right">{{ consultant.message.substr(0, 50) }}</strong>
                  </li>
                  <a :href="'/consultant/'+consultant.consultant_id+'/'" class="btn btn-primary form-control mt-2">
                    See The Consultant
                  </a>
                </ul>
                <hr>
              </div>
          </div>
          <div
            class="resize-sensor"
            style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;"
          >
            <div
              class="resize-sensor-expand"
              style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"
            >
              <div
                style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 390px; height: 1542px;"
              ></div>
            </div>
            <div
              class="resize-sensor-shrink"
              style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"
            >
              <div
                style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"
              ></div>
            </div>
          </div>

        </div>
      </aside>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      editAddress: false,
      editInfo: false,
      editPhone: false,
      editPassword: false,
      csrfToken: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      auth_user: "",
      passowrd_1_: false,
      passowrd_2_: false,
      user_consultants: "" ,
      consultants_Images: ""
    };
  },
  props: {
    authUser: {
      type: String
    },
    uploadProfilePictureRoute: {
      type: String
    },
    uploadProfileSelect: String,
    viewed: String,
    address: String,
    userRating: String,
    phone: String,
    password: String,
    changePasswordRoute: String,
    passwordConfirmation: String,
    update: String,
    consultants: String,
    consultantsImages: String,
  },
  methods: {
    updateAddress() {
      this.$http
        .put("/profile/update/address", {
          address_value: this.$refs.newAddress.value,
          _token: this.csrfToken
        })
        .then(result => {
          if (result.status == 200 && result.body !== "error") {
            this.editAddress = false;
            this.auth_user = result.body;
            toast.fire({
              type: "success",
              title: "Updated successfully"
            });
          } else {
            toast.fire({
              type: "error",
              title: "An Error Occured Please Try Again Later"
            });
          }
        })
        .catch(err => {
          console.log(err);
        });
    },
    updatePhone() {
      this.$http
        .put("/profile/update/phone", {
          phone_value: this.$refs.newPhone.value,
          _token: this.csrfToken
        })
        .then(result => {
          if (result.status === 200 && result.body !== "error") {
            this.editPhone = false;
            this.auth_user = result.body;
            toast.fire({
              type: "success",
              title: "Updated successfully"
            });
          } else {
            toast.fire({
              type: "error",
              title: "An Error Occured Please Try Again Later"
            });
          }
        })
        .catch(err => {
          console.log(err);
        });
    },
    updateInfo() {
      this.$http
        .put("/profile/update/about", {
          info: this.$refs.newAbout.value,
          _token: this.csrfToken
        })
        .then(result => {
          if (result.status === 200 && result.body !== "error") {
            this.editInfo = false;
            this.auth_user = result.body;
            toast.fire({
              type: "success",
              title: "Updated successfully"
            });
          } else {
            toast.fire({
              type: "error",
              title: "An Error Occured Please Try Again Later"
            });
          }
        })
        .catch(err => {
          console.log(err);
        });
    },
    showPassword() {
      this.editAddress = false;
      this.editInfo = false;
      this.editPhone = false;
    },
    showAddress() {
      this.editPassword = false;
      this.editInfo = false;
      this.editPhone = false;
    },
    showPhone() {
      this.editPassword = false;
      this.editInfo = false;
      this.editAddress = false;
    },
    showInfo() {
      this.editPassword = false;
      this.editAddress = false;
      this.editPhone = false;
    },
    password_help_desk_1() {
      if (this.$refs.password_1.value.length >= 6) {
        this.passowrd_1_ = true;
      } else {
        this.passowrd_1_ = false;
      }
    },
    password_help_desk_2() {
      if (this.$refs.password_2.value !== this.$refs.password_1.value) {
        this.passowrd_2_ = false;
      } else {
        this.passowrd_2_ = true;
      }
    } ,
    getLevelTag() {
        if (this.auth_user.level === 'doctor') {
            return 'Your Consultants';
        } else if (this.auth_user.level === 'pharmacy'){
            return 'Your Products';
        } else if (this.auth_user.level === '') {
            return '';
        }
    }
  },
  created() {
    this.auth_user = JSON.parse(this.authUser);
    this.user_consultants = JSON.parse(this.consultants);
    this.consultants_Images = JSON.parse(this.consultantsImages);
  }
};
</script>

<style scoped>
.cursor-pointer {
  cursor: pointer;
}
</style>
