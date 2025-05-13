<template>
    <div>
        <b-modal :id="`updata-data-${itemId}`" :hide-footer="true" title="Update Post" @show="showData">
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Title</label>
                    <input class="form-control" v-model="post.title" type="text" />
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <input class="form-control" v-model="post.description" type="text" />
                </div>
                <div class="form-group">
                    <label class="form-label">Date</label>
                    <input class="form-control" v-model="post.date" type="date" />
                </div>
            </div>
            <br />
            <div class="buttons">
                <button class="btn btn-success" @click="update">Save</button>
            </div>
        </b-modal>
    </div>
</template>

<script>
import Swal from 'sweetalert2';
import axios from 'axios';

export default {
    data() {
        return {
            post: {
                title: '',
                description: '',
                date: '',
            }
        };
    },
    props: {
        itemId: {
            type: Number,
            required: true
        }
    },

    methods: {
        showData() {
            this.fetchData();
        },

        fetchData() {
            axios.get(`/fetch/post/${this.itemId}`)
                .then(response => {
                    this.post = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        update() {
            axios.post(`/update/post/${this.itemId}`, this.post)
                .then(response => {
                    Swal.fire({
                        title: 'Success',
                        icon: 'success',
                        text: 'Post data updated successfully!'
                    });
                    this.clearFields();
                    this.hideModal();
                    this.$emit('refresh-table');
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error',
                        icon: 'error',
                        text: 'Error updating post data.'
                    });
                    console.log(error); 
                });
        },

        clearFields() {
            this.post = {
                title: '',
                description: '',
                date: '',
            };
        },

        hideModal() {
            this.$bvModal.hide(`updata-data-${this.itemId}`);
        }
    },

};
</script>
