<?php
 loadPartial('head');
  loadPartial ('navbar');
 loadPartial('topbanner');
 use Framework\Session;
 $currentUserId = Session::get('user')['id'];
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



<section class="container mx-auto p-4 mt-4">
      <div class="rounded-lg shadow-md bg-white p-3">
       <div class="flex justify-between items-center">
      <a class="block p-4 text-blue-700" href="/listings">
        <i class="fa fa-arrow-alt-circle-left"></i>
        Back To Listings
      </a>
      <div class="flex space-x-4 ml-4">
    <?php if ($currentUserId === $listing['user_id']): // Check if the current user is the owner ?>
        <a href="listing/edit?id=<?= htmlspecialchars($listing["id"], ENT_QUOTES, 'UTF-8') ?>" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</a>

        <!-- Delete Form -->
        <form action="/listing/destroy" method="POST" style="display:inline;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= htmlspecialchars($listing['id'], ENT_QUOTES, 'UTF-8') ?>">
            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">Delete</button>
        </form>
        <!-- End Delete Form -->
    <?php endif; ?>
</div>



    </div>
        <div class="p-4">
          <h2 class="text-xl font-semibold"><?=$listing['title']?></h2>
          <p class="text-gray-700 text-lg mt-2">
          <?=$listing['description']?>
          </p>
          <ul class="my-4 bg-gray-100 p-4">
            <li class="mb-2"><strong>Salary:</strong> <?=$listing['salary']?></li>
            <li class="mb-2">
              <strong>Location:</strong> <?=$listing['country']?>
              
              
            </li>
            <li class="mb-2">
              <strong>Tags:</strong> <span><?=$listing['tags']?></span>,
          
            </li>
          </ul>
        </div>
      </div>
    </section>

    <section class="container mx-auto p-4">
      <h2 class="text-xl font-semibold mb-4"></h2>
      <div class="rounded-lg shadow-md bg-white p-4">
        <h3 class="text-lg font-semibold mb-2 text-blue-500">
           Requirements
        </h3>
        <p>
        <?=$listing['requirements']?>
        </p>
      
    
      <a
        href="mailto<?=$listing['email']?>"
        class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
      >
        Apply Now
      </a>
    </section>



    <?php
 loadPartial('footer');

?>