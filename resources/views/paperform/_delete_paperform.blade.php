{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('paperform.destroy', $paperform->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Are you sure you want to delete {{ $paperform->pavadinimas }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Atšaukti</button>
        <button type="submit" class="btn btn-danger">Taip, trinti</button>
    </div>
</form>