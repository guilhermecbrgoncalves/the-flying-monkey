<!-- Modal -->
<div class="modal" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">add new airport</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mt-5 mb-5 pb-5">
                @component('components.airports.add.search')
                @endcomponent
            </div>
            <div class="modal-footer" id="modal-footer">
                @component('components.airports.add.results')
                @endcomponent
            </div>
            </form>
        </div>
    </div>
</div>