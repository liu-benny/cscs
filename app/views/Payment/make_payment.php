<?php require APPROOT . '/views/includes/header.php';  ?>

<h3> Make Payment for a <?=  $data['clubmember']->first_name ?> <?= $data['clubmember']->last_name ?></h3>

<form method="post" action="<?= URLROOT; ?>/Payment/make_payment/<?= $data['clubmember']->membership_number ?>">

    <div class="form-group row">
        <label for="membership_number_input" class="col-sm-2 col-form-label">Membership Number</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="membership_number_input" name="membership_number" value="<?= $data['clubmember']->membership_number ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
        <label for="amount_input" class="col-sm-2 col-form-label">Amount $</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" min="0" step="0.01" id="amount_input" name="amount" placeholder="Enter Amount to Pay" required>
            </div>
        </div>

        <div class="form-group row">
        <label for="payment_method_input" class="col-sm-2 col-form-label">Payment Method</label>
            <div class="col-sm-4">
                <select id="payment_method_input" class="form-control" name="payment_method" required>
                    <option disabled selected hidden>Please select a payment method...</option>
                    <option>Cash</option>
                    <option>Credit Card</option>
                    <option>Debit Card</option>
                </select>  
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

        <button type="submit" class="btn btn-primary" name="submit">Submit Payment</button>
</form>
<?php require APPROOT . '/views/includes/footer.php'; ?>