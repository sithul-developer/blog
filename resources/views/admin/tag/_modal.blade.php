<div class="modal fade" id="deletetModsl">
    <form action="{{ url('tags/delete/')}} " method="POST">
        @csrf
       @method('DELETE')
        <div class="modal-dialog modal-sm " style="border-top: 5px solid #ffc107;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;">
            <div class="modal-content" style="border: none;">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <p class="text-dark fs-5">Are your sure delete ? <i
                            class="bi bi-question-lg"></i>
                    </p>
                    <input type='hidden' name='tags_id' id='deleteid' />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-sm btn-danger "
                        data-dismiss="modal">No</button>
                    <button type="submit" class="btn bnt-sm btn-sm btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </form>
</div>
