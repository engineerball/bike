
<h2>Reset password</h2>
<?php
            echo form_open('customer/submit_reset_password'); ?>
                <div class="form-group">
                    <label class="formgroup-label">E-mail*</label>
                    <input type="email" name="email" id="email" class="form-control input-sm" placeholder="E-mail address">               
                </div>
               <?php echo form_submit('submit', 'Send E-mail to reset password');
?>