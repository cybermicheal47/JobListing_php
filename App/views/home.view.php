<?php
 loadPartial('head');
  loadPartial ('navbar');

  loadPartial('showcase-search');
 loadPartial('topbanner');
 use Framework\Session;
?>



<?php if ($message = Session::getFlash('success')): ?>
    <div class="alert alert-success">
        <?= $message ?>
    </div>
<?php endif; ?>

<?php if ($message = Session::getFlash('error')): ?>
    <div class="alert alert-danger">
        <?= $message ?>
    </div>
<?php endif; ?>

<style>
.text-center {
    text-align: center;
  
    
}

.bg-green{
  background: green;
}
.bg-paleGreen{
  background:#f5faf7;
  color: black;
}

.text-black{
  color: black;
}


  </style>



  
    

    <!-- Job Listings -->
    <section>
      <div class="container mx-auto p-4 mt-4">
        <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">Latest Posted Jobs</div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
          <!-- Job Listing 1: Software Engineer -->
           <?php foreach($listings as $listing): ?>
          <div class="rounded-lg shadow-md bg-paleGreen ">
            <div class="p-4">
              <h2 class="text-xl font-semibold text-black"><?= $listing["title"] ?></h2>
              <p class="text-gray-700 text-lg mt-2 text-black">
              <?= $listing["description"] ?>
              </p>
              <ul class="my-4 bg-white  p-4 rounded">
                <li class="mb-2"><strong>Salary:</strong> <?= $listing["salary"] ?></li>
                <li class="mb-2">
                  <strong>Location:</strong> <?= $listing["country"] ?>
                  
                  
                </li>
                <li class="mb-2">
                  <strong>Tags:</strong> <span><?= $listing["tags"] ?></span>
                  
                </li>
              </ul>
              <a href="/listing?id=<?= $listing["id"] ?>"
                class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
              >
                Details
              </a>
            </div>
          </div>

          <?php endforeach ?>

</div>
        <a href="/listings" class="block text-xl text-center">
          <i class="fa fa-arrow-alt-circle-right"></i>
          Show All Jobs
        </a>
      </section>

       <!-- Bottom Banner -->
       <section class="container mx-auto my-6 text-center">
      <div
        class="bg-green text-white rounded p-4 flex items-center justify-center"
      >
        <div>
          <h2 class="text-xl font-semibold"></h2>
          <p class="text-gray-200 text-sm mt-2 text-center">
            All rights Reserved
          </p>
        </div>
      
      </div>
    </section>
     
<?php
 loadPartial('footer');

?>