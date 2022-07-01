 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="card card-bordered">
                     <div class="card-inner">
                         <div class="card-head">
                             <h5 class="card-title">Liste des Poles</h5>
                         </div>
                         <div class="card card-bordered card-preview">
                             <div class="card-inner">
                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                     data-bs-target="#modalForm">Add</button>
                                 </br></br>
                                 <table class="datatable-init nowrap table">
                                     <thead>
                                         <tr>
                                             <th>ID</th>
                                             <th>Nom</th>
                                             <th>Actions</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php foreach ($poles as $pole) { ?>
                                         <tr>
                                             <td><?= $pole['RefPole']; ?></td>
                                             <td><?= $pole['nomPole']; ?></td>
                                             <td class="td-actions">
                                                 <a href="/poles-activites/update/<?= $pole['RefPole']; ?>"
                                                     class="btn btn-success"><i class="fas fa-edit"> </i></a>
                                                 <a href="/poles-activites/delete/<?= $pole['RefPole']; ?>"
                                                     class="btn btn-danger "
                                                     onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');"><i
                                                         class="fas fa-trash-alt"> </i></a>
                                             </td>
                                         </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>


 <div class="modal fade" id="modalForm">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Pole d'Activite</h5>
                 <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                     <em class="icon ni ni-cross"></em>
                 </a>
             </div>
             <div class="modal-body">
                 <form method="POST" class="form-validate is-alter">
                     <div class="form-group">
                         <label class="form-label" for="full-name">Nom</label>
                         <div class="form-control-wrap">
                             <input type="text" class="form-control" id="full-name" name="nomPole" required>
                         </div>
                     </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-lg btn-primary">Valider</button>
                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>