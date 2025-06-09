<template>

    <b-modal id="readMore" title="Blog Post" :hide-footer="true" size="xl" hide-header-close="false">
        <div class="modal-body px-4 py-4">
                <div class="container-fluid">
                  <div class="row g-4 mb-4 align-items-stretch">
                    
                    <div class="col-lg-7 d-flex">
                      <div class="bg-light rounded shadow-sm w-100 overflow-hidden">
                        <img :src="item.image" @error="useDefaultImage" alt="Post Image" class="img-fluid w-100" style="max-height: 450px; height: 100%; object-fit: cover; border-radius: 0.5rem;">
                      </div>
                    </div>
              
                    <div class="col-lg-5 d-flex">
                      <div class="bg-white p-4 rounded shadow-sm w-100 d-flex flex-column justify-content-between">
                        <p class="text-success small mb-2">
                          {{ item.date_formatted }} &nbsp; • &nbsp; {{ item.category }}
                        </p>

                        <h2 class="fw-bold fonthome mb-3" style="line-height: 1.3;">
                          {{ item.title }}
                        </h2>

                        <div class="d-flex align-items-center mt-auto">
                          <img :src="item.user_image"  alt="Author" class="rounded-circle me-3 shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                          <span class="fontpoppins">{{ item.user_name }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="container py-3">
                    <div class="row g-4 bg-light rounded shadow-sm">
                        <div class = "col-md-12">
                            <h6 class="fw-bold mb-2 fonthome">Description:</h6>
                            <p class=" fontpoppins px-5">{{ item.description}}</p>
                        </div>  
                    </div>
                </div>
            </div>
        </div>  
        <div class="d-flex justify-content-end">  
            <button class="btn btn-secondary me-2" @click="hideModal">Close</button>
        </div>
    
    </b-modal>
</template>
<script>
import Swal from 'sweetalert2';
import axios from 'axios';

export default {
  props: ['postId'],
  data() {
    return {
      item: {}
    };
  },
  watch: {
    postId: {
      immediate: true,
      handler(newId) {
        if (newId) this.fetchUserInfo(newId);
      }
    }
  },
  methods: {
    useDefaultImage(event) {
            event.target.src = '/images/default-profile.png';
        },
    fetchUserInfo(id) {
      axios.get(`/readmore/${id}`)
        .then(response => {
          this.item = response.data;
        })
        .catch(error => {
          console.error('Failed to fetch post details:', error);
          Swal.fire('Error', 'Unable to fetch blog post details.', 'error');
          this.hideModal();
        });
    },
    hideModal() {
      this.$bvModal.hide('readMore');
    }
  }
};
</script>