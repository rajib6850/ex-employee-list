<?php if($employees->have_posts(  )): ?>
<div id="ex_employee_card_container">
    <?php while($employees->have_posts()): $employees->the_post(); ?>
    <div class="card">
        <div class="infos">
          <div class="name">
            <h2><?php echo get_post_meta(get_the_ID(), '_employee_name', true) ; ?></h2>
            <h4><?php echo get_post_meta(get_the_ID(), '_employee_job_title', true) ; ?></h4>
          </div>

          <div class="text">
            <?php $employee_department = get_post_meta(get_the_ID(), '_employee_department', true) ; ?>
            <p><b>Department:</b> <?php if(isset($employee_department) && !empty($employee_department)){ echo $employee_department; } ?>  </p>

            <?php $employee_email = get_post_meta(get_the_ID(), '_employee_email', true) ; ?>
            <p><b>E-mail:</b> <?php if(isset($employee_email) && !empty($employee_email)){ echo $employee_email; } ?></p>

            <?php $employee_call = get_post_meta(get_the_ID(), '_employee_call', true) ; ?>
            <p>
              <b>Phone:</b> 
              <?php if(isset($employee_call) && !empty($employee_call)){ echo $employee_call; } ?>
            </p>  

            <?php $employee_date_of_birth = get_post_meta(get_the_ID(), '_employee_date_of_birth', true) ; ?>
            <p><b>DOB:</b> <?php if(isset($employee_date_of_birth) && !empty($employee_date_of_birth)){ echo $employee_date_of_birth; } ?></p>    
            
            <?php $employee_address = get_post_meta(get_the_ID(), '_employee_address', true) ; ?>

             <p>
                <b>Address:</b> 
                <?php if(isset($employee_address) && !empty($employee_address)){ echo $employee_address; } ?>
              </p>           
          
          </div>


        </div>

        <div class="img">
          <img src="<?php the_post_thumbnail_url(); ?>">
          <div class="links">
            <br>
            <!-- <button class="follow">Follow</button> -->
            <a href="<?php the_permalink(); ?>" class="view">View profile</a>
          </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php else: ?>

  <div id="ex_employee_card_container">
    <div class="card">
      <p>No Employee found..!</p>
    </div>
  </div>


<?php endif; ?>