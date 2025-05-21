<template>
    <b-modal id="editprofile">
        <div class="container">
            <div class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Profile Image</label>
                            <input class="form-control" type="file" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input class="form-control" type="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </b-modal>
</template>
