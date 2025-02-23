<div class="row">
    <div class="col-md-12">
        <?php if ($this->session->flashdata('success_message')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success_message'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error_message')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error_message'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Konfigurasi SMTP Email</h3>
            </div>
            <form role="form" action="<?php echo base_url('admin/systemconfig/update_smtp_config'); ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="smtp_host">SMTP Host</label>
                        <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="<?php echo isset($smtp_config['smtp_host']) ? html_escape($smtp_config['smtp_host']) : ''; ?>" placeholder="Masukkan SMTP Host">
                    </div>
                    <div class="form-group">
                        <label for="smtp_port">SMTP Port</label>
                        <input type="number" class="form-control" id="smtp_port" name="smtp_port" value="<?php echo isset($smtp_config['smtp_port']) ? intval($smtp_config['smtp_port']) : ''; ?>" placeholder="Masukkan SMTP Port">
                    </div>
                    <div class="form-group">
                        <label for="smtp_user">SMTP User</label>
                        <input type="text" class="form-control" id="smtp_user" name="smtp_user" value="<?php echo isset($smtp_config['smtp_user']) ? html_escape($smtp_config['smtp_user']) : ''; ?>" placeholder="Masukkan SMTP User">
                    </div>
                    <div class="form-group">
                        <label for="smtp_pass">SMTP Password</label>
                        <input type="password" class="form-control" id="smtp_pass" name="smtp_pass" value="<?php echo isset($smtp_config['smtp_pass']) ? html_escape($smtp_config['smtp_pass']) : ''; ?>" placeholder="Masukkan SMTP Password">
                    </div>
                    <div class="form-group">
                        <label for="smtp_encryption">SMTP Encryption</label>
                        <select class="form-control" id="smtp_encryption" name="smtp_encryption">
                            <option value="tls" <?php echo (isset($smtp_config['smtp_encryption']) && $smtp_config['smtp_encryption'] == 'tls') ? 'selected' : ''; ?>>TLS</option>
                            <option value="ssl" <?php echo (isset($smtp_config['smtp_encryption']) && $smtp_config['smtp_encryption'] == 'ssl') ? 'selected' : ''; ?>>SSL</option>
                            <option value="" <?php echo (isset($smtp_config['smtp_encryption']) && $smtp_config['smtp_encryption'] == '') ? 'selected' : ''; ?>>None</option>
                        </select>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="smtp_enabled" <?php echo (isset($smtp_config['smtp_enabled']) && $smtp_config['smtp_enabled']) ? 'checked' : ''; ?>> SMTP Enabled
                        </label>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update SMTP Config</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Konfigurasi Payment Gateway</h3>
            </div>
            <form role="form" action="<?php echo base_url('admin/systemconfig/update_payment_gateway_config'); ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="payment_gateway_provider">Payment Gateway Provider</label>
                        <select class="form-control" id="payment_gateway_provider" name="payment_gateway_provider">
                            <option value="xendit" <?php echo (isset($payment_gateway_config['payment_gateway_provider']) && $payment_gateway_config['payment_gateway_provider'] == 'xendit') ? 'selected' : ''; ?>>Xendit</option>
                            <option value="midtrans" <?php echo (isset($payment_gateway_config['payment_gateway_provider']) && $payment_gateway_config['payment_gateway_provider'] == 'midtrans') ? 'selected' : ''; ?>>Midtrans</option>
                            <option value="" <?php echo (isset($payment_gateway_config['payment_gateway_provider']) && $payment_gateway_config['payment_gateway_provider'] == '') ? 'selected' : ''; ?>>None</option>
                        </select>
                    </div>
                    <!-- Tambahkan form field konfigurasi spesifik untuk Xendit/Midtrans di sini -->
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="payment_gateway_enabled" <?php echo (isset($payment_gateway_config['payment_gateway_enabled']) && $payment_gateway_config['payment_gateway_enabled']) ? 'checked' : ''; ?>> Payment Gateway Enabled
                        </label>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Payment Gateway Config</button>
                </div>
            </form>
        </div>
    </div>
</div>