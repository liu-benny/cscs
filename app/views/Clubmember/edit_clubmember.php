<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" action="<?= URLROOT; ?>/ClubMember/edit_clubmember/<?= $data['clubmember']->membership_number ?>">
    <h3>Edit the Club Member information <button type="button" class="btn btn-warning" onclick="window.location.href='<?= URLROOT; ?>/ClubMember/change_location/<?= $data['clubmember']->membership_number ?>'">Change Location: <?= $data['current_location']->location_name ?></button></h3>
        
        <div class="form-group row">
        <label for="first_name_input" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="first_name_input" name="first_name" value="<?= $data['clubmember']->first_name ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="last_name_input" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="last_name_input" name="last_name" value="<?= $data['clubmember']->last_name ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="date_of_birth_input" class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="date_of_birth_input" name="date_of_birth" value="<?= $data['clubmember']->date_of_birth ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="gender_input" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-4">
                <select id="gender_input" class="form-control" name="gender">
                    <option selected hidden><?= $data['clubmember']->gender ?></option>
                    <option>Male</option>
                    <option>Female</option>
                </select>  
            </div>
        </div>

        <div class="form-group row">
        <label for="height_input" class="col-sm-2 col-form-label">Height (cm)</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="height_input" name="height_cm" value="<?= $data['clubmember']->height_cm ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="weight_input" class="col-sm-2 col-form-label">Weight (kg)</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="weight_input" name="weight_kg" value="<?= $data['clubmember']->weight_kg ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="ssn_input" class="col-sm-2 col-form-label">SSN</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ssn_input" name="ssn" value="<?= $data['clubmember']->ssn ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="medicare_input" class="col-sm-2 col-form-label">Medicare</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="medicare_input" name="medicare_number" value="<?= $data['clubmember']->medicare_number ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="phone_number_input" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="phone_number_input" name="phone_number" value="<?= $data['clubmember']->phone_number ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="address_input" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="address_input" name="address" value="<?= $data['clubmember']->address ?>">
        </div>

    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city_input">City</label>
      <input type="text" class="form-control" id="city_input" name="city" value="<?= $data['clubmember']->city ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="province_input">Province</label>
      <select id="province_input" class="form-control" name="province">
        <option selected hidden><?= $data['clubmember']->province ?></option>
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
      <input type="text" class="form-control" id="postal_code_input" name="postal_code" value="<?= $data['clubmember']->postal_code ?>">
    </div>
  </div>

    
    <button class="btn btn-primary" type="submit" name="submit">Update Club Member</button>
</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>