        <div id="right">
        <h2>Breeds list</h2>


        <?php foreach ($data as $bean){ ?>
		  <p>
		    <h4><?php echo $bean->getNombre(); ?></h4>
		    <div class="main">
		        <?php echo $bean->getMainFeatures(); ?>
		    </div>
		    <p><a href="dogBreeds/<?php echo $bean->getNombre(); ?>">View article</a></p>
		  </p>
         <?php } ?>

        </div><!--end right-->



