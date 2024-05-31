<!-- The Modal -->

{{-- stile personalizzato per il modal --}}
<link rel="stylesheet" type="text/css" href="css/modal.css">

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-dark text-white">
                <h4 class="modal-title" id="deleteModalLabel">Elimina <span id="type"></span></h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p>Vuoi davvero eliminare <span id="title"></span>?</p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#delete').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget);
        let id = button.data('id');
        let title = button.data('title');
        let type = button.data('type');
        document.getElementById("type").innerHTML = type;
        document.getElementById("title").innerHTML = title;
        let form = document.getElementById('deleteForm');

        // Set form action URL with project ID
        if(type == 'progetto'){
            form.action = `/projects/${id}/destroy`;
        }else{
            form.action = `/users/${id}/destroy`;
        }


    });
</script>
