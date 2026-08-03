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
      <input type="text" class="form-control" id="name_input" name="location_name" placeholder="Name" required>
    </div>

  </div>

    <div class="form-group row">
        <label for="address_input" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="address_input" name="address" placeholder="Address" required>
        </div>

    </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city_input">City</label>
      <input type="text" class="form-control" id="city_input" name="city" placeholder="City" required>
    </div>
    <div class="form-group col-md-4">
      <label for="province_input">Province</label>
      <select id="province_input" class="form-control" name="province">
        <option value="" disabled selected hidden>Please choose an option</option>
        <option>Alberta</option>
        <option>British Columbia</option>
        <option>Manitoba</option>
        <option>New Brunswick</option>
        <option>Newfoundland and Labrador</option>
        <option>Nova Scotia</option>
        <option>Ontario</option>
        <option>Prince Edward Island</option>
        <option>Quebec</option>
        <option>Saskatchewan</option>

      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="postal_code_input">Postal Code</label>
      <input type="text" class="form-control" id="postal_code_input" name="postal_code" placeholder="Postal Code" required>
    </div>
  </div>

    

    <div class="form-group row">
        <label for="phone_number_input" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
        <input type="tel" class="form-control" id="phone_number_input" name="phone_number" placeholder="Phone Number"  required>
        </div>
    </div>

    <div class="form-group row">
        <label for="web_address_input" class="col-sm-2 col-form-label">Web Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="web_address_input" name="web_address" placeholder="Web Address" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="max_capacity_input" class="col-sm-2 col-form-label">Max Capacity</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" id="max_capacity_input" name="max_capacity" placeholder="Max Capacity" required>
        </div>
    </div>

    <button class="btn btn-primary" type="submit" name="submit">Add Location</button>
</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>