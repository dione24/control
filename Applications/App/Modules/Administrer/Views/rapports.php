 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="card card-bordered">
                     <div class="card-inner">
                         <div class="card-head">
                             <h5 class="card-title">Liste des Rapports</h5>
                         </div>
                         <div class="card card-bordered card-preview">
                             <div class="card-inner">
                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                     data-bs-target="#addTypeRapport">Add</button>
                                 <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                     data-bs-target="#addElements">Add Elements</button>
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
                                         <?php foreach ($rapports as $rapport) { ?>
                                         <tr>
                                             <td><?= $rapport['RefTypeRapport']; ?></td>
                                             <td><?= $rapport['nomRapport']; ?></td>
                                             <td class="td-actions">

                                                 <a href="/rapports/config/view/<?= $rapport['RefTypeRapport']; ?>"
                                                     class="btn btn-primary"><i class="fas fa-eye"> </i></a>
                                                 <a href="/rapports/config/update/<?= $rapport['RefTypeRapport']; ?>"
                                                     class="btn btn-success"><i class="fas fa-edit"> </i></a>
                                                 <a href="/rapport/config/delete/<?= $rapport['RefTypeRapport']; ?>"
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


 <!--TypeRapport-->
 <div class="modal fade" id="addTypeRapport">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Type Rapport</h5>
                 <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                     <em class="icon ni ni-cross"></em>
                 </a>
             </div>
             <div class="modal-body">
                 <form method="POST" class="form-validate is-alter">
                     <div class="form-group">
                         <label class="form-label" for="full-name">Nom</label>
                         <div class="form-control-wrap">
                             <input type="text" class="form-control" id="full-name" name="nomRapport" required>
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




 <!--addElements-->
 <div class="modal fade" id="addElements">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Type Rapport</h5>
                 <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                     <em class="icon ni ni-cross"></em>
                 </a>
             </div>
             <div class="modal-body">
                 <form method="POST" class="form-validate is-alter">

                     <div class="form-group">
                         <label class="form-label" for="full-name">Choisir</label>
                         <div class="form-control-wrap">
                             <select class="form-control" name="RefTypeRapport" required>
                                 <?php foreach ($rapports as $rapports) { ?>
                                 <option value="<?= $rapports['RefTypeRapport']; ?>"> <?= $rapports['nomRapport']; ?>
                                 </option>
                                 <?php } ?>
                             </select>

                         </div>
                     </div>
                     <div class="form-group">
                         <label class="form-label" for="full-name">Nom Element</label>
                         <div class="form-control-wrap">
                             <input type="text" class="form-control" id="full-name" name="nomElement" required>
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