<div class="modal" id="feedbackModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel1"><strong>
                        Here you can submit your Feedback</strong></h5>
            </div>
            <div class="modal-body pb-4">
                <div class="container">
                    <form action="" method="" enctype="multipart/form-data" id="feedbackModalForm" class="feedbackModalForm">
                        @csrf
                        <input type="hidden" name="product_id" id="productModalInput" value="">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="mb-3">
                            <label for="title" class="form-label"><strong>Feedback Title</strong></label>
                            <input type="text" class="form-control" name="title"
                                   placeholder="Good Product" aria-label="title"
                                   value="" required>
                        </div>
                        <hr>

                        <div class="mb-3">
                            <label for="description" class="form-label"><strong>Description</strong></label>
                           <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <hr>

                        <div class="mb-3">
                            <label for="category" class="form-label"><strong>Select Category</strong></label>
                            <select class="form-select" name="category" required>
                                <option value="bug_report">bug report</option>
                                <option value="feature request">feature request</option>
                                <option value="improvement">improvement</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                        <hr>

                        <button type="submit" class="btn btn-success bg-success ms-auto w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



