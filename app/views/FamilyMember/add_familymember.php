<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" action="<?= URLROOT; ?>/FamilyMember/add_familymember">
    <h3>New Family Member</h3>
        
        <div class="form-group row">
        <label for="first_name_input" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="first_name_input" name="first_name" placeholder="First Name" required>
            </div>
        </div>

        <div class="form-group row">
        <label for="last_name_input" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="last_name_input" name="last_name" placeholder="Last Name" required>
            </div>
        </div>

        <div class="form-group row">
        <label for="date_of_birth_input" class="col-sm-2 col-form-label">Date of Birth</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="date_of_birth_input" name="date_of_birth" required>
            </div>
        </div>

        <div class="form-group row">
        <label for="ssn_input" class="col-sm-2 col-form-label">SSN</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="ssn_input" name="ssn" placeholder="SSN" required>
            </div>
        </div>

        <div class="form-group row">
        <label for="medicare_input" class="col-sm-2 col-form-label">Medicare</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="medicare_input" name="medicare_number" placeholder="Medicare" required>
            </div>
        </div>

        <div class="form-group row">
        <label for="phone_number_input" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="phone_number_input" name="phone_number" placeholder="Phone Number" required>
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
      <select id="province_input" class="form-control" name="province" required>
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
        <label for="email_input" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="email_input" name="email" placeholder="Email" required>
        </div>
    </div>

    <div class="form-group row">
    <label for="location_input" class="col-sm-2 col-form-label">Assign a Location</label>
        <div class="col-sm-4">
            <select id="location_input" class="form-control" name="location_id" required>
                <option value="" disabled selected hidden>Please choose an option</option>
                <?php foreach($data['locations'] as $location): ?>
                    <option value="<?= $location->location_id ?>"><?= $location->location_name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="start_date_input" class="col-sm-2 col-form-label">Start Date</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="start_date_input" name="start_date" required>
            </div>
        </div>

    <div class="form-group row">
        <label for="end_date_input" class="col-sm-2 col-form-label">End Date (if no longer associated to location)</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="end_date_input" name="end_date" >
            </div>
        </div>
        
    

    <div class="form-group row">
            <button class="btn btn-primary" type="submit" name="submit">Add Family Member</button>
        </div>  
</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>