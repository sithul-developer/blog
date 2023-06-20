<div class="modal fade" id="deletetModsl">
    <form action="{{ url('category/delete/')}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="modal-dialog modal-sm  ">
            <div class="modal-content">
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
                    <input type='hidden' name='categories' id='deleteid' />
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
