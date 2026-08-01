<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" action="<?= URLROOT; ?>/Location/edit_location/<?= $data['location']->location_id ?>">
    <h3>Edit the Location information</h3>
  <div class="form-group row">
    <label for="type_input" class="col-sm-2 col-form-label">Type</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="type_input" name="location_type" value="<?= $data['location']->location_type ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="name_input" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name_input" name="location_name" value="<?= $data['location']->location_name ?>">
    </div>

  </div>

    <div class="form-group row">
        <label for="address_input" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="address_input" name="address" value="<?= $data['location']->address ?>">
        </div>

    </div>

    <div class="form-group row">
        <label for="city_input" class="col-sm-2 col-form-label">City</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="city_input" name="city" value="<?= $data['location']->city ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="province_input" class="col-sm-2 col-form-label">Province</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="province_input" name="province" value="<?= $data['location']->province ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="postal_code_input" class="col-sm-2 col-form-label">Postal Code</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="postal_code_input" name="postal_code" value="<?= $data['location']->postal_code ?>">
        </div>

    </div>

    <div class="form-group row">
        <label for="phone_number_input" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="phone_number_input" name="phone_number" value="<?= $data['location']->phone_number ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="web_address_input" class="col-sm-2 col-form-label">Web Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="web_address_input" name="web_address" value="<?= $data['location']->web_address ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="max_capacity_input" class="col-sm-2 col-form-label">Max Capacity</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="max_capacity_input" name="max_capacity" value="<?= $data['location']->max_capacity ?>">
        </div>
    </div>

    <button class="btn btn-primary" type="submit" name="submit">Update Location</button>
</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>