<?php require $_SERVER['DOCUMENT_ROOT'].'/App/header.php';?>
   <body>
      <div class="loader-wrapper">
         <span class="site-loader"> </span>
      </div>
      <script>
         window.addEventListener('load', function() {
             var loadingOverlay = document.querySelector('.loader-wrapper');
             loadingOverlay.style.display = 'none';
         });
      </script>
      <!-- Menu Start -->
      <?php require $_SERVER['DOCUMENT_ROOT'].'/App/siderbar.php';?>
    
      <main>
         <div class="breadcrumb-bar breadcrumb-bar-info">
            <div class="breadcrumb-img">
               <div class="breadcrumb-left">
                  <img src="assets/images/banner-bg-03.png" alt="img">
               </div>
            </div>
           
         </div>
         <section class="services-filter py-5">
            <div class="container">
               <div class="row mb-40 justify-content-between align-items-end">
                  <div class="col-auto">
                     <h2 class="fw-bold section-title">Sản phẩm nổi bật</h2>
                   
                  </div>
                  <div class="col-auto mt-30 mt-xl-0">
                     <div class="filters-btns d-flex flex-wrap align-items-center gap-3">
                        <button class="service-filter-btn active" data-filter=".category1">
                        Tất cả
                        </button>

                     <?php   foreach($ketnoi->get_list("SELECT * FROM `categories` WHERE `status` = 'Active'   ORDER BY `id` DESC") as $vp):?>
                        <button class="service-filter-btn" data-filter=".category-<?=$vp['id'];?>">
                        <?=$vp['name'];?>
                        </button>
                        <?php endforeach;?>   
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div id="loading-indicator" class="loading-indicator">
                     <div class="spinner"></div>
                  </div>
                  <?php   foreach($ketnoi->get_list("SELECT * FROM `products` WHERE `status` = 'Active'   ORDER BY `id` DESC") as $vp):?>
                  <article class="col-xl-3 col-lg-4 col-md-6 mb-4 grid-item category1 category-<?=$vp['category_id'];?>">
                     <div class="gigs-grid">
                        <div class="gigs-img">
                           <div class="">
                              <a href="page/sanpham/view_product.php?id=<?=$vp['id'];?>"><img src="<?=$vp['image'];?>" class="w-100" height="200" alt="<?=$vp['name'];?>"></a>
                           </div>
                         
                           <div class="fav-selection">
                              <a href="javascript:void(0);" class="fav-icon" data-product-id="46">
                              <i class="fa-regular fa-heart"></i>
                              </a>
                           </div>
                           <div class="user-thumb">
                              <a href="seller/4557.html">
                              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwLeIGjrPAK2i_tTs9x9TqL9LrUXSi9zmS3g&s" alt="User">
                              </a>
                           </div>
                        </div>
                        <div class="gigs-content">
                           <div class="gigs-info">
                              <a href="services-6.html?name=&category=1" class="badge bg-primary-light">ASW</a>
                              <div class="star-rate">
                                 <span><i class="fa-solid fa-star"></i><span id="averageRating" class="me-1">0</span> (0 Reviews)</span>
                              </div>
                           </div>
                           <div class="gigs-title">
                              <h3>
                                 <a href="page/sanpham/view_product.php?id=<?=$vp['id'];?>" class="truncate-2-lines">
                                 <?=$vp['name'];?>   </a>
                              </h3>
                           </div>
                           <div class="gigs-card-footer">
                              <div class="gigs-share">
                                 <a href="https://www.facebook.com/sharer/sharer.php?u=https://sieuthicode.net/product/website-ban-nguyen-lieu-ads-tu-dong">
                                 <i class="fa fa-share-alt"></i>
                                 </a>
                               
                              <h5><?=money($vp['price']);?>đ</h5>
                           </div>
                        </div>
                     </div>
                  </article>
                  <?php endforeach;?>   
               </div>
            </div>
         </section>
      </main>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
   $(document).ready(function() {
       // Filter functionality
       $('.service-filter-btn').click(function() {
           var filterValue = $(this).attr('data-filter'); // Get the data-filter value (category class)
           
           // Remove 'active' class from all filter buttons
           $('.service-filter-btn').removeClass('active');
           
           // Add 'active' class to the clicked filter button
           $(this).addClass('active');
           
           // If "Tất cả" button is clicked, show all products
           if (filterValue == '.category1') {
               $('.grid-item').show(); // Show all items
           } else {
               // Hide all products first, then show the selected category
               $('.grid-item').hide();
               $(filterValue).show();
           }
       });
   });
</script>

      <!-- Main End -->
      <div class="modal new-modal fade" id="modal_notification" data-keyboard="false" data-backdrop="static">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Thông báo</h5>
                  <button type="button" class="close-btn" data-bs-dismiss="modal"><span>×</span></button>
               </div>
               <div class="modal-body service-modal">
                  <p style="text-align:center">Nh&oacute;m zalo ch&iacute;nh thức:&nbsp;<a href="account">https://zalo.me/g/cbzsbc549</a>&nbsp;</p>
                  <p style="text-align:center">Thu&ecirc; api bank:&nbsp;<a href="https://api.sieuthicode.net/login">https://api.sieuthicode.net/login</a></p>
                  <p style="text-align:center">Thu&ecirc; cron:&nbsp;<a href="https://cron.sieuthicode.net/">https://cron.sieuthicode.net/</a></p>
                  <p style="text-align:center">Thu&ecirc; giải captcha:&nbsp;<a href="https://ecaptcha.sieuthicode.net/">https://ecaptcha.sieuthicode.net/</a></p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="dontShowAgainBtn">Không hiển thị lại trong 2 giờ</button>
               </div>
            </div>
         </div>
      </div>
     
      <!-- Logout Modal -->
      <div class="modal new-modal fade" id="logoutModal" data-keyboard="false" data-backdrop="static">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Xác nhận đăng xuất</h5>
                  <button type="button" class="close-btn" data-bs-dismiss="modal"><span>×</span></button>
               </div>
               <div class="modal-body service-modal">
                  <div class="row">
                     <div class="col-md-12">
                        Bạn có chắc chắn muốn Đăng xuất không?
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <div class="btn-item">
                     <a href="#" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</a>
                     <a href="logout.html" class="btn btn-primary" type="submit">Đăng xuất</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Footer  -->
      <?php require $_SERVER['DOCUMENT_ROOT'].'/App/footer.php';?>
   </body>
</html>