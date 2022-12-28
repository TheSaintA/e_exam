<?php if($message = $this->session->flashdata('success')): ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Info!</strong> <?= $message; ?>
    </div>
    <?php else: endif; ?>