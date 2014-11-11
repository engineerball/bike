<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('renter', $attributes); ?>

<p>
        <label for="renter_name">Name <span class="required">*</span></label>
        <?php echo form_error('renter_name'); ?>
        <br /><input id="renter_name" type="text" name="renter_name" maxlength="255" value="<?php echo set_value('renter_name'); ?>"  />
</p>

<p>
        <label for="renter_id_card">ID Card <span class="required">*</span></label>
        <?php echo form_error('renter_id_card'); ?>
        <br /><input id="renter_id_card" type="text" name="renter_id_card" maxlength="13" value="<?php echo set_value('renter_id_card'); ?>"  />
</p>

<p>
        <label for="renter_phone">Tel <span class="required">*</span></label>
        <?php echo form_error('renter_phone'); ?>
        <br /><input id="renter_phone" type="text" name="renter_phone" maxlength="10" value="<?php echo set_value('renter_phone'); ?>"  />
</p>

<p>
        <label for="renter_email">E-Mail <span class="required">*</span></label>
        <?php echo form_error('renter_email'); ?>
        <br /><input id="renter_email" type="text" name="renter_email" maxlength="255" value="<?php echo set_value('renter_email'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
