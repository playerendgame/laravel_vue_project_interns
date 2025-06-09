<template>

    <b-modal id="editInfo" title="Edit Profile Information" :hide-footer="true" size="lg" centered hide-header-close="false" @hidden="resetForm" @show="fetchUserInfo">
        
    <div class="modal-body px-4 py-3">
        <div class="mb-3">
            <label class="form-label fw-semibold">Fullname</label>
            <input class="form-control form-control-lg" v-model="info.name" type="text" placeholder="Enter new name" required />
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Age</label>
            <input class="form-control form-control-lg" v-model="info.age" type="text" placeholder="Enter your age" required />
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Address</label>
            <textarea class="form-control" rows="4" v-model="info.address" placeholder="Enter your address..." required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Contact</label>
          <input class="form-control form-control-lg" v-model="info.contact" type="text" placeholder="Enter your contact" required />
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold">Profile Image</label>
            <input class="form-control" type="file" @change="handleFileChange" required />
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Birthday</label>
            <input class="form-control" type="date" v-model="info.birthday" required />
        </div>

        <div class="d-flex justify-content-end" style="gap: 10px">
            <button class="btn btn-success" @click="save">Save</button>
            <button class="btn btn-secondary me-2" @click="hideModal">Cancel</button>
        </div>
    </div>
    </b-modal>
</template>
<script>
import Swal from 'sweetalert2';
import axios from 'axios';

export default {
  data() {
    return {
      info: {
        name: '',
        age: '',
        address: '',
        contact:'',
        birthday: '',
        birthday_formatted: '',
      },
      image: null,
    };
  },
  methods: {
    fetchUserInfo() {
      axios.get('/get-user-info')
        .then(response => {
          this.info.name = response.data.name || '';
          this.info.age = response.data.age || '';
          this.info.address = response.data.address || '';
          this.info.contact = response.data.contact || '';
          this.info.birthday = response.data.birthday || '';
          this.info.birthday_formatted = response.data.birthday_formatted;
          this.image = null; 
        })
        .catch(error => {
          console.error('Failed to fetch profile info:', error);
          Swal.fire('Error', 'Unable to fetch profile info.', 'error');
          this.hideModal();
        });
    },
    resetForm() {
      this.info = {
        name: '',
        age: '',
        address: '',
        contact: '',
        birthday: '',
      };
      this.image = null;
    },
    handleFileChange(event) {
      this.image = event.target.files[0];
    },
    hideModal() {
      this.$bvModal.hide('editInfo');
    },
    save() {
      if (!this.info.name || !this.info.age || !this.info.address || !this.info.birthday || !this.info.contact) {
        Swal.fire('Error', 'Please fill in all fields.', 'error');
        return;
      }
      Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to save this profile?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, save it!',
        cancelButtonText: 'Cancel',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.showLoading();
          let formData = new FormData();
          formData.append('name', this.info.name);
          formData.append('age', this.info.age);
          formData.append('address', this.info.address);
          formData.append('contact', this.info.contact);
          formData.append('birthday', this.info.birthday);
          if (this.image) {
            formData.append('image', this.image);
          }

          axios.post('/save/data', formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          })
          .then((response) => {
            Swal.hideLoading();
            Swal.fire({
              title: "Done Saving",
              icon: 'success',
              text: response.data.message || 'Profile updated successfully!'
            });
            this.resetForm();
            this.hideModal();
            this.$emit('refresh-table'); 
          })
          .catch((error) => {
            Swal.hideLoading();
            Swal.fire({
              title: 'Error',
              icon: 'error',
              text: error.response?.data?.message || 'Error saving profile.'
            });
          });
        }
      });
    }
  }
};
</script>