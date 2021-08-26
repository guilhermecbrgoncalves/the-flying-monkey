@foreach ($logbooks as $logbook )
<!-- Modal -->
<div class="modal fade" id="updateModal_{{$logbook->id}}" tabindex="-1" aria-labelledby="updateModal_{{$logbook->id}}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModal_{{$logbook->id}}">edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @component('components.logbook.update.form', ['logbook' => $logbook])
                @endcomponent
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
