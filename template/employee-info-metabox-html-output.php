

<div class="ex_tab_container">
    <div class="naccs">
        <div class="grid">
            <div class="gc gc--1-of-3">
                <div class="menu">
                    <div class="active"><span class="light"></span><span>Personal Info:</span></div>
                    <div><span class="light"></span><span>Office Info</span></div>
                </div>
            </div>
            <div class="gc gc--2-of-3">
                <ul class="nacc">
                    <li class="active">
                        <div>
                            <label for="employee_name">Name:</label>
                            <input type="text" name="employee_name"  value="<?php echo $employee_name; ?>" id="employee_name" placeholder="Enter employee full name" >
                            
                            <label for="employee_call">Phone:</label>
                            <input type="number" name="employee_call" value="<?php echo $employee_call; ?>" id="employee_call" placeholder="Enter employee phone Number" >
                            
                            <label for="employee_email">E-mail:</label>
                            <input type="email" name="employee_email" value="<?php echo $employee_email; ?>" id="employee_email" placeholder="Enter employee email" >
                            
                            <label for="employee_gender">Gender:</label>
                            <select name="employee_gender" id="employee_gender">
                                <option <?php selected( $employee_gender, 'male' ); ?> value="male">Male</option>
                                <option <?php selected( $employee_gender, 'female' ); ?> value="female">Female</option>
                            </select>
                            
                            <label for="employee_date_of_birth">Date of birth:</label>
                            <input type="date" value="<?php echo $employee_date_of_birth; ?>" name="employee_date_of_birth" id="employee_date_of_birth" placeholder="Date of Birth" >
                                                                
                            <label for="employee_address">Address:</label>
                            <input type="text" value="<?php echo $employee_address; ?>" name="employee_address" id="employee_address" placeholder="Enter employee address" >
                            

                        </div>
                    </li>
                    <li>
                        <div>
                            <label for="employee_job_title">Job Title:</label>
                            <input type="text" value="<?php echo $employee_job_title; ?>" name="employee_job_title" id="employee_job_title" placeholder="Job Title" >

                            <label for="employee_salary">Salary:</label>
                            <input type="number" value="<?php echo $employee_salary; ?>" name="employee_salary" id="employee_salary" placeholder="Enter employee salary" >
                            

                            <label for="employee_department">Department:</label>

                            <?php  
                            
                                // Department Array

                                $departments =  array (
                                    'Human Resources',
                                    'Marketing',
                                    'Sales',
                                    'Finance',
                                    'Information Technology',
                                    'Customer Support',
                                    'Research and Development',
                                    'Administration',
                                    'Operations',
                                    'Legal',
                                );
                            
                            ?>
                            <select name="employee_department" id="employee_department">
                                <option value="">Select Department</option>
                                
                                <?php foreach($departments as $department): ?>
                                <option <?php selected( $employee_department, $department ); ?> value="<?= $department ?>"><?= $department ?></option>
                                <?php endforeach; ?>

                            </select>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
