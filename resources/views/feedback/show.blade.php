<x-app-layout>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h2><strong>Feedback Listing</strong></h2>
                            </div>
                            <div class="table-responsive">
                                <table id="feedback" class="table table-bordered table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Vote Count</th>
                                        <th>Submitted By</th>
                                        <th>Comments</th>
                                        <th>Add Comment</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($feedback as $key => $feedbackItem)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ @$feedbackItem->title }}</td>
                                            <td>{{ @$feedbackItem->category }}</td>
                                            <td>{{ count($feedback) }}</td>
                                            <td>{{ @$feedbackItem->user->name }}</td>
{{--                                            <td>  @foreach (@$feedbackItem->comments as $comment)--}}
{{--                                                    @php--}}
{{--                                                        $words = explode(' ', $comment->content);--}}
{{--                                                        $contentPreview = implode(' ', array_slice($words, 0, 5));--}}
{{--                                                        if (str_word_count($comment->content) > 5) {--}}
{{--                                                            $contentPreview .= '...';--}}
{{--                                                        }--}}
{{--                                                    @endphp--}}
{{--                                                    <div style="white-space: pre-wrap; margin-bottom: 10px;">{!! @$contentPreview  !!} </div>--}}
{{--                                                @endforeach</td>--}}
                                            <td>
                                                @foreach ($feedbackItem->comments as $comment)
                                                    @php
                                                        $words = explode(' ', $comment->content);
                                                        $contentPreview = implode(' ', array_slice($words, 0, 5));
                                                        if (str_word_count($comment->content) > 5) {
                                                            $contentPreview .= '...';
                                                        }
                                                    @endphp
                                                    <div style=" margin-bottom: 10px;">
                                                        User: {{ @$comment->user->name }} <br>
                                                        Date: {{ @$comment->created_at->format('Y-m-d H:i:s') }} <br>
                                                        Comment: {!! @$contentPreview !!}
                                                        <hr>
                                                    </div>
                                                @endforeach
                                            </td>

                                            <td>
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#commentModal" data-feedback-id="{{ $feedbackItem->id }}">Comment</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @include('partials.commentModal')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center my-3">
        {!! $feedback->links() !!}
    </div>
</x-app-layout>


<!-- Main Content End -->

<script>
    $(document).ready(function () {
        $('#feedback').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<!--   This will update the modal hidden feedback Id  -->
<script>
    var commentModal = document.getElementById('commentModal');
    commentModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var feedbackId = button.getAttribute('data-feedback-id');
        var modalInput = commentModal.querySelector('#feedbackModalInput');
        modalInput.value = feedbackId;
    });


</script>
<script>
    //Rich Text Editor
    var editor1cfg = {}
    editor1cfg.toolbar = "basic";
    var editor1 = new RichTextEditor(".div_editor1", editor1cfg);
</script>
