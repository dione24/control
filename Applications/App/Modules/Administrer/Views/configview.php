 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="card card-bordered">
                     <div class="card-inner">
                         <div class="card-head">
                             <h5 class="card-title">Liste des Elements</h5>
                         </div>
                         <div class="card card-bordered card-preview">
                             <div class="card-inner">
                                 <table class="datatable-init nowrap table">
                                     <thead>
                                         <tr>
                                             <th>ID</th>
                                             <th>Nom</th>
                                             <th>Type Rapport</th>
                                             <th>Actions</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php foreach ($elements as $element) { ?>
                                         <tr>
                                             <td><?= $element['RefRapportElements']; ?></td>
                                             <td><?= $element['nomElement']; ?></td>
                                             <td><?= $element['nomRapport']; ?></td>

                                             <td class="td-actions">
                                                 <a href="/rapports/config/view/update/<?= $element['RefRapportElements']; ?>"
                                                     class="btn btn-success"><i class="fas fa-edit"> </i></a>
                                                 <a href="/rapports/config/view/delete/<?= $element['RefRapportElements']; ?>"
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