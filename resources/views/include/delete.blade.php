 <!-- The Modal -->
 <div class="modal fade" id="delete">
     <div class="modal-dialog modal-dialog-centered modal-md">
         <div class="modal-content" style="background-color: #d9534f; color:white;">
             <!-- Modal Header -->
             <div class="modal-header">
                 <h4 class="modal-title">Elimina progetto</h4>
                 <button type="button" style="color:white;"class="close" data-dismiss="modal">&times;</button>
             </div>

             <!-- Modal body -->
             <div class="modal-body">
                 Vuoi eliminare l'progetto <span id="idprogetto"> </span> ?
             </div>

             <!-- Modal footer -->
             <div class="modal-footer">
                 <button id="sendBtn_progetto" class="btn btn-success"
                     style="background-color: #5cb85c; color: white;">Elimina</button>
             </div>
         </div>
     </div>
 </div>
 <script>
    $('#delete').on('show.bs.modal', function(event) {
         let button = $(event.relatedTarget);
         let id = button.data('id_progetto');
         console.log(id)
         document.getElementById("idprogetto").innerHTML = id;
         const sendBtn_progetto = document.getElementById('sendBtn_progetto');

         sendBtn_progetto.addEventListener('click', () => {
             const token_progetto = document.querySelector('meta[name="csrf-token"]').getAttribute(
                 'content');
             let data = {
                 'idprogetto': id,
             };

             // Realizar la solicitud POST
             fetch("https://customers.onetyres1.com/delete_progetto", {
                     method: 'POST',
                     headers: {
                         'Content-Type': 'application/json',
                         'X-CSRF-TOKEN': token_progetto
                     },
                     body: JSON.stringify(data)
                 })
                 .then((response) => {
                     return response.json().then((data) => {

                         console.log(data);
                         window.location.reload()
                     }).catch((err) => {
                         console.log(err);
                         window.location.reload()
                     });
                 });
         });

     });
 </script>
