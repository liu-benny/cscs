<?php require APPROOT . '/views/includes/header.php';  ?>

<h3> Make Payment for a <?=  $data['clubmember']->first_name ?> <?= $data['clubmember']->last_name ?></h3>

<form method="post" action="<?php echo URLROOT; ?>/Payment/make_payment">

    <div class="form-group row">
        <label for="membership_number_input" class="col-sm-2 col-form-label">Membership Number</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="membership_number_input" name="membership_number" value="<?= $data['clubmember']->membership_number ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
        <label for="amount_input" class="col-sm-2 col-form-label">Amount $</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="amount_input" name="amount" placeholder="Enter Amount to Pay" required>
            </div>
        </div>

        <div class="form-group row">
        <label for="payment_year_target_input" class="col-sm-2 col-form-label">Payment Year Target</label>
            <div class="col-sm-4">
                <select id="payment_year_target_input" class="form-control" name="payment_year_target" required>
                    <option disabled selected hidden>Please select a year...</option>
                    <?php foreach (range(2000,2050) as $year): ?>
                    <option value="<?= $year ?>"><?= $year ?></option>
                    <?php endforeach; ?>
                </select> 
            </div> 
        </div>

        <button type="submit" class="btn btn-primary">Submit Payment</button>
</form>
<?php require APPROOT . '/views/includes/footer.php'; ?>