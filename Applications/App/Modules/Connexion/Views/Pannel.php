 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="card card-bordered">
                     <div class="card-inner">
                         <div class="card-head">
                             <h5 class="card-title">Liste des Utilisateurs</h5>
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
                                             <th>Prenom</th>
                                             <th>Statut</th>
                                             <th>Actions</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php foreach ($users as $user) { ?>
                                         <tr>
                                             <td><?= $user['RefUsers']; ?></td>
                                             <td><?= $user['nom']; ?></td>
                                             <td><?= $user['prenom']; ?></td>
                                             <td><?= $user['status']; ?></td>
                                             <td class="td-actions">
                                                 <a href="/users/update/<?= $user['RefUsers']; ?>"
                                                     class="btn btn-success"><i class="fas fa-edit"> </i></a>
                                                 <a href="/users/delete/<?= $user['RefUsers']; ?>"
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
                 <h5 class="modal-title">Ajouter un Utilisateur</h5>
                 <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                     <em class="icon ni ni-cross"></em>
                 </a>
             </div>
             <div class="modal-body">
                 <form method="POST" class="form-validate is-alter">

                     <div class="form-group">
                         <label class="form-label" for="full-name">Nom Entreprise</label>
                         <div class="form-control-wrap">

                             <select class="form-control" name="RefEntreprise">
                                 <option value="">Selectionner</option>
                                 <?php foreach ($entreprises as $entreprise) { ?>
                                 <option value="<?= $entreprise['RefEntreprise']; ?>">
                                     <?= $entreprise['nomEntreprise']; ?>
                                 </option>
                                 <?php } ?>
                             </select>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="form-label" for="full-name">Nom</label>
                         <div class="form-control-wrap">
                             <input type="text" class="form-control" id="full-name" name="nom" required>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="form-label" for="full-name">Prenom</label>
                         <div class="form-control-wrap">
                             <input type="text" class="form-control" id="full-name" name="prenom" required>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="form-label" for="full-name">Email</label>
                         <div class="form-control-wrap">
                             <input type="text" class="form-control" id="full-name" name="email" required>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="form-label" for="full-name">Statut</label>
                         <div class="form-control-wrap">
                             <select class="form-control" name="status" required>
                                 <option value="">Selectionner</option>
                                 <option value="admin">Admin</option>
                                 <option value="user">User</option>
                                 <option value="control">Control</option>
                             </select>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="form-label" for="full-name">Login</label>
                         <div class="form-control-wrap">
                             <input type="text" class="form-control" id="full-name" name="login" required>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="form-label" for="full-name">Password</label>
                         <div class="form-control-wrap">
                             <input type="password" class="form-control" id="full-name" name="password" required>
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