<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" action="<?= URLROOT; ?>/Personnel/edit_personnel/<?= $data['personnel']->personnel_id ?>">
    <h3>Edit the Personnel information <button type="button" class="btn btn-warning" onclick="window.location.href='<?= URLROOT; ?>/Personnel/change_location/<?= $data['personnel']->personnel_id ?>'">Change Location: <?= $data['current_location']->location_name ?></button></h3>
        
        <div class="form-group row">
        <label for="first_name_input" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="first_name_input" name="first_name" value="<?= $data['personnel']->first_name ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="last_name_input" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="last_name_input" name="last_name" value="<?= $data['personnel']->last_name ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="date_of_birth_input" class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="date_of_birth_input" name="date_of_birth" value="<?= $data['personnel']->date_of_birth ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="ssn_input" class="col-sm-2 col-form-label">SSN</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ssn_input" name="ssn" value="<?= $data['personnel']->ssn ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="medicare_input" class="col-sm-2 col-form-label">Medicare</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="medicare_input" name="medicare_number" value="<?= $data['personnel']->medicare_number ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="phone_number_input" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="phone_number_input" name="phone_number" value="<?= $data['personnel']->phone_number ?>">
            </div>
        </div>

        <div class="form-group row">
        <label for="address_input" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="address_input" name="address" value="<?= $data['personnel']->address ?>">
        </div>

    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city_input">City</label>
      <input type="text" class="form-control" id="city_input" name="city" value="<?= $data['personnel']->city ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="province_input">Province</label>
      <select id="province_input" class="form-control" name="province">
        <option selected hidden><?= $data['personnel']->province ?></option>
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
      <input type="text" class="form-control" id="postal_code_input" name="postal_code" value="<?= $data['personnel']->postal_code ?>">
    </div>
  </div>

    <div class="form-group row">
        <label for="email_input" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="email_input" name="email" value="<?= $data['personnel']->email ?>">
        </div>
    </div>
    <div class="form-group row">
    <label for="role_input" class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-4">
            <select id="role_input" class="form-control" name="personnel_role">
                <option selected hidden><?= $data['personnel']->personnel_role ?></option>
                <option>Administrator</option>
                <option>Coach</option>
                <option>Assisstant Coach</option>
                <option>Other</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
    <label for="mandate_input" class="col-sm-2 col-form-label">Mandate</label>
        <div class="col-sm-4">
            <select id="mandate_input" class="form-control" name="mandate">
                <option selected hidden><?= $data['personnel']->mandate ?></option>
                <option>Salaried</option>
                <option>Volunteer</option>
            </select>
        </div>
    </div>

    <button class="btn btn-primary" type="submit" name="submit">Update Personnel</button>
    <button class="btn btn-danger"
        type="submit"
        formaction="<?= URLROOT ?>/Personnel/delete_personnel/<?= (int) $data['personnel']->personnel_id ?>"
        formmethod="POST"
        onclick="return confirm('Are you sure you want to delete this personnel and all related records?');">
    Delete Personnel
</button>
</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>