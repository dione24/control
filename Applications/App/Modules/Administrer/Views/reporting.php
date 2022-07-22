 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="card card-bordered">
                     <div class="card-inner">
                         <div class="card-head">
                             <h5 class="card-title">KPI | <?= $rapport['nomRapport']; ?></h5>
                         </div>
                         <form method="POST">
                             <input type="hidden" name="RefTypeRapport" value="<?= $rapport['RefTypeRapport']; ?>" />
                             <div class="row g-4">
                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="full-name-1">Pool</label>
                                         <div class="form-control-wrap">
                                             <select class="form-control" id="full-name-1" name="RefPole">
                                                 <?php foreach ($pools as $pool) { ?>
                                                 <option value="<?= $pool['RefPole']; ?>">
                                                     <?= $pool['nomPole']; ?></option>

                                                 </option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="full-name-1">Mois</label>
                                         <div class="form-control-wrap">
                                             <select class="form-control" id="full-name-1" name="RefMois">
                                                 <?php foreach ($mois as $month) {
                                                        if ($verif['RefMois'] != $month['RefMois']) {
                                                    ?>
                                                 <option value="<?= $month['RefMois']; ?>"><?= $month['Mois']; ?>
                                                 </option>
                                                 <?php }
                                                    } ?>
                                             </select>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="full-name-1">Annee</label>
                                         <div class="form-control-wrap">
                                             <input type="text" class="form-control" id="full-name-1" name="annee">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             </br>
                             <div class="col-md-12">
                                 <div class="form-group">
                                     <label class="form-label" for="full-name-1">Reporting</label>
                                     <div class="form-control-wrap">
                                         <textarea class="form-control" id="full-name-1" name="reporting"
                                             rows="10"></textarea>
                                     </div>
                                 </div>
                             </div>
                             </br>
                             <div class="col-12">
                                 <div class="form-group">
                                     <button type="submit" class="btn btn-lg btn-primary">Envoyer</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>