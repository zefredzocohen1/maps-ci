<?php if(!empty($this->session->flashdata('message'))): ?>
    <?php $typeFlashData = mConfig('type_flash_data'); $type = $this->session->flashdata('type');?>
    <?php foreach ($typeFlashData as $i => $typeFlash) : ?>
        <?php if($type==$typeFlash):?>
        <div class="alert alert-<?php echo $i?>" style="display: inline-block">
            <strong><?php echo $i?>! </strong> <?php echo $this->session->flashdata('message');?>
        </div>
        <?php break;?>
        <?php endif;?>
    <?php endforeach;?>
<?php endif; ?>
