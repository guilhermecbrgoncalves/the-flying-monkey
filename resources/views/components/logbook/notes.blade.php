@foreach ($logbooks as $logbook )
<!-- Modal -->
<div class="modal fade" id="notesModal_{{$logbook->id}}"
    tabindex="-1" aria-labelledby="notesModal_{{$logbook->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal_{{$logbook->id}}">notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{$logbook->notes}} </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
