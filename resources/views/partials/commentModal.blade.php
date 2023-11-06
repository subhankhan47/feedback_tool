<div class="modal" id="commentModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1"
     tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel1"><strong>
                        Enter Your Comment</strong></h5>
            </div>
            <div class="modal-body pb-4">
                <div class="container">
                    <form action="" method="post" enctype="multipart/form-data" id="commentModalForm" class="commentModalForm">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="feedback_id" id="feedbackModalInput" value="">

                        <div class="mb-3">
                            <label for="content" class="form-label"><strong>Content</strong></label>
                            <textarea name="content" class="textarea_editor form-control div_editor1" rows="3" required></textarea>
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-success bg-success ms-auto w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



