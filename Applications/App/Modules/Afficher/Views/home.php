 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="nk-block-between">
                     <div class="nk-block-head-content">
                         <h3 class="nk-block-title page-title">Tableau de Bord </h3>
                         <div class="nk-block-des text-soft">
                             <p>Groupe</p>
                         </div>
                     </div><!-- .nk-block-head-content -->
                     <div class="nk-block-head-content">
                         <div class="toggle-wrap nk-block-tools-toggle">
                             <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                     class="icon ni ni-more-v"></em></a>
                             <?php if ($_SESSION['Statut'] != 'user') { ?>
                             <form method="POST">
                                 <div class="toggle-expand-content" data-content="pageMenu">
                                     <ul class="nk-block-tools g-3">
                                         <li>
                                             <div class="dropdown">
                                                 <select class="form-control" name="RefPole">
                                                     <option">Pole</option>
                                                         <?php foreach ($poles as $pole) { ?>
                                                         <option value="<?= $pole['RefPole']; ?>">
                                                             <?= $pole['nomPole']; ?></option>
                                                         <?php } ?>
                                                 </select>
                                             </div>
                                         </li>
                                         <li>
                                             <div class="dropdown">
                                                 <select class="form-control" name="RefEntreprise">
                                                     <option>Entreprise</option>
                                                     <?php foreach ($entreprises as $key => $entreprise) { ?>
                                                     <option value="<?= $entreprise['RefEntreprise']; ?>">
                                                         <?= $entreprise['nomEntreprise']; ?></option>
                                                     <?php } ?>
                                                 </select>
                                             </div>
                                         </li>
                                         <li class="nk-block-tools-opt"><button type="submit"
                                                 class="btn btn-primary"><em
                                                     class="icon ni ni-search"></em><span></span></button>
                                         </li>

                                     </ul>
                                 </div>
                             </form>
                             <?php } ?>
                         </div>
                     </div><!-- .nk-block-head-content -->
                 </div><!-- .nk-block-between -->
             </div><!-- .nk-block-head -->
             <div class="nk-block">
                 <div class="row g-gs">
                     <div class="col-xxl-6">
                         <div class="row g-gs">
                             <div class="col-lg-6 col-xxl-12">
                                 <div class="card card-bordered">
                                     <div class="card-inner">
                                         <div class="card-title-group align-start mb-2">
                                             <div class="card-title">
                                                 <h6 class="title"></h6>
                                                 <p>In last 30 days revenue from subscription.</p>
                                             </div>
                                             <div class="card-tools">
                                                 <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip"
                                                     data-bs-placement="left" title="Revenue from subscription"></em>
                                             </div>
                                         </div>
                                         <div
                                             class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                             <div class="nk-sale-data-group flex-md-nowrap g-4">
                                                 <div class="nk-sale-data">
                                                     <span class="amount">14,299.59 <span
                                                             class="change down text-danger"><em
                                                                 class="icon ni ni-arrow-long-down"></em>16.93%</span></span>
                                                     <span class="sub-title">This Month</span>
                                                 </div>
                                                 <div class="nk-sale-data">
                                                     <span class="amount">7,299.59 <span
                                                             class="change up text-success"><em
                                                                 class="icon ni ni-arrow-long-up"></em>4.26%</span></span>
                                                     <span class="sub-title">This Week</span>
                                                 </div>
                                             </div>
                                             <div class="nk-sales-ck sales-revenue">
                                                 <canvas class="sales-bar-chart" id="salesRevenue"></canvas>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div><!-- .col -->
                             <div class="col-lg-6 col-xxl-12">
                                 <div class="row g-gs">
                                     <div class="col-sm-6 col-lg-12 col-xxl-6">
                                         <div class="card card-bordered">
                                             <div class="card-inner">
                                                 <div class="card-title-group align-start mb-2">
                                                     <div class="card-title">
                                                         <h6 class="title">Active Subscriptions</h6>
                                                     </div>
                                                     <div class="card-tools">
                                                         <em class="card-hint icon ni ni-help-fill"
                                                             data-bs-toggle="tooltip" data-bs-placement="left"
                                                             title="Total active subscription"></em>
                                                     </div>
                                                 </div>
                                                 <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                     <div class="nk-sale-data">
                                                         <span class="amount">9.69K</span>
                                                         <span class="sub-title"><span
                                                                 class="change down text-danger"><em
                                                                     class="icon ni ni-arrow-long-down"></em>1.93%</span>since
                                                             last month</span>
                                                     </div>
                                                     <div class="nk-sales-ck">
                                                         <canvas class="sales-bar-chart"
                                                             id="activeSubscription"></canvas>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div><!-- .card -->
                                     </div><!-- .col -->
                                     <div class="col-sm-6 col-lg-12 col-xxl-6">
                                         <div class="card card-bordered">
                                             <div class="card-inner">
                                                 <div class="card-title-group align-start mb-2">
                                                     <div class="card-title">
                                                         <h6 class="title">Avg Subscriptions</h6>
                                                     </div>
                                                     <div class="card-tools">
                                                         <em class="card-hint icon ni ni-help-fill"
                                                             data-bs-toggle="tooltip" data-bs-placement="left"
                                                             title="Daily Avg. subscription"></em>
                                                     </div>
                                                 </div>
                                                 <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                     <div class="nk-sale-data">
                                                         <span class="amount">346.2</span>
                                                         <span class="sub-title"><span
                                                                 class="change up text-success"><em
                                                                     class="icon ni ni-arrow-long-up"></em>2.45%</span>since
                                                             last week</span>
                                                     </div>
                                                     <div class="nk-sales-ck">
                                                         <canvas class="sales-bar-chart"
                                                             id="totalSubscription"></canvas>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div><!-- .card -->
                                     </div><!-- .col -->
                                 </div><!-- .row -->
                             </div><!-- .col -->
                         </div><!-- .row -->
                     </div><!-- .col -->
                     <div class="col-xxl-6">
                         <div class="card card-bordered h-100">
                             <div class="card-inner">
                                 <div class="card-title-group align-start gx-3 mb-3">
                                     <div class="card-title">
                                         <h6 class="title">Sales Overview</h6>
                                         <p>In 30 days sales of product subscription. <a href="#">See
                                                 Details</a></p>
                                     </div>
                                     <div class="card-tools">
                                         <div class="dropdown">
                                             <a href="#" class="btn btn-primary btn-dim d-none d-sm-inline-flex"
                                                 data-bs-toggle="dropdown"><em
                                                     class="icon ni ni-download-cloud"></em><span><span
                                                         class="d-none d-md-inline">Download</span>
                                                     Report</span></a>
                                             <a href="#" class="btn btn-icon btn-primary btn-dim d-sm-none"
                                                 data-bs-toggle="dropdown"><em
                                                     class="icon ni ni-download-cloud"></em></a>
                                             <div class="dropdown-menu dropdown-menu-end">
                                                 <ul class="link-list-opt no-bdr">
                                                     <li><a href="#"><span>Download Mini
                                                                 Version</span></a></li>
                                                     <li><a href="#"><span>Download Full
                                                                 Version</span></a></li>
                                                     <li class="divider"></li>
                                                     <li><a href="#"><em class="icon ni ni-opt-alt"></em><span>More
                                                                 Options</span></a></li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="nk-sale-data-group align-center justify-between gy-3 gx-5">
                                     <div class="nk-sale-data">
                                         <span class="amount">$82,944.60</span>
                                     </div>
                                     <div class="nk-sale-data">
                                         <span class="amount sm">1,937
                                             <small>Subscribers</small></span>
                                     </div>
                                 </div>
                                 <div class="nk-sales-ck large pt-4">
                                     <canvas class="sales-overview-chart" id="salesOverview"></canvas>
                                 </div>
                             </div>
                         </div><!-- .card -->
                     </div><!-- .col -->
                     <div class="col-xxl-8">
                         <div class="card card-bordered card-full">
                             <div class="card-inner">
                                 <div class="card-title-group">
                                     <div class="card-title">
                                         <h6 class="title"><span class="me-2">KPIs</span>
                                     </div>

                                 </div>
                             </div>
                             <div class="card-inner p-0 border-top">
                                 <div class="nk-tb-list nk-tb-orders">
                                     <div class="nk-tb-item nk-tb-head">
                                         <div class="nk-tb-col"><span>Nom.</span></div>
                                         <div class="nk-tb-col tb-col-sm"><span>Mois en cours</span></div>
                                         <div class="nk-tb-col tb-col-md"><span>Mois N-1</span></div>
                                         <div class="nk-tb-col tb-col-lg"><span>Mois Precedent</span></div>
                                         <div class="nk-tb-col"><span>Previsions</span></div>
                                     </div>

                                     <?php foreach ($kpis as $kpi) { ?>
                                     <div class="nk-tb-item">
                                         <div class="nk-tb-col">
                                             <span class="tb-lead"><?= $kpi['nomRapport']; ?></span>
                                         </div>
                                         <div class="nk-tb-col">
                                             <span class="tb-lead"><?= $kpi['moisencours']; ?></span>
                                         </div>
                                         <div class="nk-tb-col tb-col-md">
                                             <span class="tb-lead"><?= $kpi['moisn1']; ?></span>
                                         </div>
                                         <div class="nk-tb-col tb-col-lg">
                                             <span class="tb-lead "><?= $kpi['moisprecedent']; ?></span>
                                         </div>
                                         <div class="nk-tb-col">
                                             <span class="tb-lead "><?= $kpi['previsions']; ?></span>
                                         </div>

                                     </div>
                                     <?php } ?>

                                 </div>
                             </div>

                         </div><!-- .card -->
                     </div><!-- .col -->
                     <div class="col-md-12 col-xxl-8">
                         <div class="card card-bordered card-full">
                             <div class="card-inner border-bottom">
                                 <div class="card-title-group">
                                     <div class="card-title">
                                         <h6 class="title">COMMENTAIRES</h6>
                                     </div>
                                     <div class="card-tools">
                                     </div>
                                 </div>
                             </div>
                             <ul class="nk-activity">
                                 <li class="nk-activity-item">
                                     <div class="nk-activity-media user-avatar bg-success"><img
                                             src="/images/avatar/c-sm.jpg" alt=""></div>
                                     <div class="nk-activity-data">
                                         <div class="label">Keith Jensen requested to Widthdrawl.
                                         </div>
                                         <span class="time">2 hours ago</span>
                                     </div>
                                 </li>

                             </ul>
                         </div><!-- .card -->
                     </div><!-- .col -->


                 </div><!-- .row -->
             </div><!-- .nk-block -->
         </div>
     </div>
 </div>