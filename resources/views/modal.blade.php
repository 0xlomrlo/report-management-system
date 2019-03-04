<!-- Delete modal -->
<form action="" method="POST" id="deleteForm" class="remove-record-model">
    @csrf
    {{ method_field('DELETE') }}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel">@lang('layout.sure')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @lang('layout.confirm_delete')
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color:#78909c!important;color:#fff;"
                        data-dismiss="modal">@lang('layout.close')</button>
                    <button type="submit" class="btn btn-danger waves-effect">@lang('layout.delete')</button>
                </div>
            </div>
        </div>
    </div>
</form>