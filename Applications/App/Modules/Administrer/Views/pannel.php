 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="card card-bordered card-stretch">
                     <div class="card-inner-group">
                         <div class="card-inner p-0">
                             <table class="nk-tb-list nk-tb-ulist">
                                 <thead>
                                     <tr class="nk-tb-item nk-tb-head">
                                         <th class="nk-tb-col nk-tb-col-check">
                                             <div class="custom-control custom-control-sm custom-checkbox notext">
                                                 <input type="checkbox" class="custom-control-input" id="pid-all">
                                                 <label class="custom-control-label" for="pid-all"></label>
                                             </div>
                                         </th>
                                         <th class="nk-tb-col"><span class="sub-text">KPI Name</span></th>
                                         <th class="nk-tb-col"><span class="sub-text">Actions</span></th>

                                     </tr><!-- .nk-tb-item -->
                                 </thead>
                                 <tbody>
                                     <?php foreach ($rapports as $rapport) { ?>
                                     <tr class="nk-tb-item">
                                         <td class="nk-tb-col nk-tb-col-check">
                                             <div class="custom-control custom-control-sm custom-checkbox notext">
                                                 <input type="checkbox" class="custom-control-input" id="pid-01">
                                                 <label class="custom-control-label" for="pid-01"></label>
                                             </div>
                                         </td>
                                         <td class="nk-tb-col">
                                             <a href="/rapports/ajouter/<?= $rapport['RefTypeRapport']; ?>"
                                                 class="project-title">
                                                 <div class="user-avatar sq bg-purple"><span>KPI</span></div>
                                                 <div class="project-info">
                                                     <h6 class="title"><?= $rapport['nomRapport']; ?></h6>
                                                 </div>
                                             </a>
                                         </td>
                                         <td class="nk-tb-col nk-tb-col-tools">
                                             <a href="/rapports/ajouter/<?= $rapport['RefTypeRapport']; ?>"
                                                 class="btn btn-success"><i class="fas fa-plus-circle"> </i></a>
                                             <a href="/rapports/view/<?= $rapport['RefTypeRapport']; ?>"
                                                 class="btn btn-primary"><i class="fas fa-eye"> </i></a>
                                             <a href="/rapports/reporting/<?= $rapport['RefTypeRapport']; ?>"
                                                 class="btn btn-warning"><i class="fas fa-pen"> </i></a>
                                         </td>
                                     </tr>
                                     <?php } ?>
                                 </tbody>
                             </table><!-- .nk-tb-list -->
                         </div><!-- .card-inner -->

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>