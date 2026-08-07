<?php require APPROOT . '/views/includes/header.php'; ?>

<h3 class="mb-4">Add New Club Member</h3>

<form method="POST"
      action="<?= URLROOT ?>/ClubMember/add_clubmember">

    <div class="form-group row">

        <label for="first_name_input"
               class="col-sm-2 col-form-label">
            First Name
        </label>

        <div class="col-sm-10">

            <input type="text"
                   class="form-control"
                   id="first_name_input"
                   name="first_name"
                   required>

        </div>

    </div>


    <div class="form-group row">

        <label for="last_name_input"
               class="col-sm-2 col-form-label">
            Last Name
        </label>

        <div class="col-sm-10">

            <input type="text"
                   class="form-control"
                   id="last_name_input"
                   name="last_name"
                   required>

        </div>

    </div>


    <div class="form-group row">

        <label for="date_of_birth_input"
               class="col-sm-2 col-form-label">
            Date of Birth
        </label>

        <div class="col-sm-4">

            <input type="date"
                   class="form-control"
                   id="date_of_birth_input"
                   name="date_of_birth"
                   required>

        </div>

    </div>


    <div class="form-group row">

        <label for="gender_input"
               class="col-sm-2 col-form-label">
            Gender
        </label>

        <div class="col-sm-4">

            <select id="gender_input"
                    class="form-control"
                    name="gender"
                    required>

                <option value="" selected disabled>
                    Select gender
                </option>

                <option value="Boy">Boy</option>
                <option value="Girl">Girl</option>

            </select>

        </div>

    </div>


    <div class="form-group row">

        <label for="height_input"
               class="col-sm-2 col-form-label">
            Height (cm)
        </label>

        <div class="col-sm-4">

            <input type="number"
                   class="form-control"
                   id="height_input"
                   name="height_cm"
                   min="0"
                   step="0.01">

        </div>

    </div>


    <div class="form-group row">

        <label for="weight_input"
               class="col-sm-2 col-form-label">
            Weight (kg)
        </label>

        <div class="col-sm-4">

            <input type="number"
                   class="form-control"
                   id="weight_input"
                   name="weight_kg"
                   min="0"
                   step="0.01">

        </div>

    </div>


    <div class="form-group row">

        <label for="ssn_input"
               class="col-sm-2 col-form-label">
            SSN
        </label>

        <div class="col-sm-10">

            <input type="text"
                   class="form-control"
                   id="ssn_input"
                   name="ssn"
                   maxlength="9">

        </div>

    </div>


    <div class="form-group row">

        <label for="medicare_input"
               class="col-sm-2 col-form-label">
            Medicare Number
        </label>

        <div class="col-sm-10">

            <input type="text"
                   class="form-control"
                   id="medicare_input"
                   name="medicare_number">

        </div>

    </div>


    <div class="form-group row">

        <label for="phone_number_input"
               class="col-sm-2 col-form-label">
            Phone Number
        </label>

        <div class="col-sm-10">

            <input type="text"
                   class="form-control"
                   id="phone_number_input"
                   name="phone_number">

        </div>

    </div>


    <div class="form-group row">

        <label for="email_input"
               class="col-sm-2 col-form-label">
            Email
        </label>

        <div class="col-sm-10">

            <input type="email"
                   class="form-control"
                   id="email_input"
                   name="email">

        </div>

    </div>


    <div class="form-group row">

        <label for="address_input"
               class="col-sm-2 col-form-label">
            Address
        </label>

        <div class="col-sm-10">

            <input type="text"
                   class="form-control"
                   id="address_input"
                   name="address">

        </div>

    </div>


    <div class="form-row">

        <div class="form-group col-md-6">

            <label for="city_input">
                City
            </label>

            <input type="text"
                   class="form-control"
                   id="city_input"
                   name="city">

        </div>


        <div class="form-group col-md-4">

            <label for="province_input">
                Province
            </label>

            <select id="province_input"
                    class="form-control"
                    name="province">

                <option value="" selected>
                    Select province
                </option>

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

            <label for="postal_code_input">
                Postal Code
            </label>

            <input type="text"
                   class="form-control"
                   id="postal_code_input"
                   name="postal_code">

        </div>

    </div>


    <button type="submit"
            name="submit"
            class="btn btn-primary">
        Add Club Member
    </button>

    <a href="<?= URLROOT ?>/ClubMember/index"
       class="btn btn-secondary">
        Cancel
    </a>

</form>

<?php require APPROOT . '/views/includes/footer.php'; ?>