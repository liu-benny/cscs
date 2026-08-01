<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" action="<?= URLROOT; ?>/Location/add_location">
  <h3>New Location</h3>
  <div class="form-group row">
    <label for="type_input" class="col-sm-2 col-form-label">Type</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="type_input" name="location_type" value="Branch">
    </div>
  </div>
  <div class="form-group row">
    <label for="name_input" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name_input" name="location_name" placeholder="Name">
    </div>

  </div>

    <div class="form-group row">
        <label for="address_input" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="address_input" name="address" placeholder="Address">
        </div>

    </div>

    <div class="form-group row">
        <label for="city_input" class="col-sm-2 col-form-label">City</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="city_input" name="city" placeholder="City">
        </div>
    </div>

    <div class="form-group row">
        <label for="province_input" class="col-sm-2 col-form-label">Province</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="province_input" name="province" placeholder="Province">
        </div>
    </div>

    <div class="form-group row">
        <label for="postal_code_input" class="col-sm-2 col-form-label">Postal Code</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="postal_code_input" name="postal_code" placeholder="Postal Code">
        </div>

    </div>

    <div class="form-group row">
        <label for="phone_number_input" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="phone_number_input" name="phone_number" placeholder="Phone Number">
        </div>
    </div>

    <div class="form-group row">
        <label for="web_address_input" class="col-sm-2 col-form-label">Web Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="web_address_input" name="web_address" placeholder="Web Address">
        </div>
    </div>

    <div class="form-group row">
        <label for="max_capacity_input" class="col-sm-2 col-form-label">Max Capacity</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="max_capacity_input" name="max_capacity" placeholder="Max Capacity">
        </div>
    </div>

    <button class="btn btn-primary" type="submit" name="submit">Add Location</button>
</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>