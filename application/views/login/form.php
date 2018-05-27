<style type="text/css">
	.form-error {
		color: #ff0000;
	}
</style>

<?php $error_message = $this->session->flashdata('error_message'); ?>
<?php if (!empty($error_message)) : ?>
	<p class="form-error"><?= $error_message ?></p>
<?php endif; ?>

<?= form_open('login')  ?>
	<p>
		<?= form_label('Username: ', 'username') ?>
		<?= form_input('username', $input->password) ?>
		<?= form_error('username') ?>
	</p>
	<p>
		<?= form_label('Password: ', 'password') ?>
		<?= form_password('password', $input->password) ?>
		<?= form_error('password') ?>
	</p>
	<p>
		<?= form_button(['type' => 'submit', 'content' => 'Login']) ?>
	</p>
<?= form_close() ?>
