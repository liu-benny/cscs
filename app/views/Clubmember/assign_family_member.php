<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" action="<?= URLROOT; ?>/ClubMember/assign_family_member">
<h3><?= $data['first_name'] ;?> <?= $data['last_name'] ;?> is less than 18 years old.</h3>
<h4> Please assign a family member to this club member.</h4>
    <div class="form-group row">
        <label for="family_member_input" class="col-sm-2 col-form-label">Family Member</label>
            <div class="col-sm-4">
                <select id="family_member_input" class="form-control" name="family_member_id" required>
                    <option selected hidden disabled>Please select a family member</option>
                    <?php foreach ($data['familymembers'] as $familymember) : ?>
                        <?= $familymember->family_member_id; ?>
                        <option value="<?= $familymember->family_member_id ?>"><?= $familymember->first_name ?> <?= $familymember->last_name ?></option>
                    <?php endforeach; ?>
                </select>  
            </div>
    </div>
    <div class="form-group row">
        <label for="relationship_input" class="col-sm-2 col-form-label">Relationship</label>
            <div class="col-sm-4">
                <select id="relationship_input" class="form-control" name="relationship_type" required>
                    <option selected hidden disabled>Please select a relationship</option>
                    <option>Father</option>
                    <option>Mother</option>
                    <option>Grandfather</option>
                    <option>Grandmother</option>
                    <option>Tutor</option>
                    <option>Partner</option>
                    <option>Friend</option>
                    <option>Other</option>
                </select>  
            </div>
    </div>
<div class="form-group row">
            <button class="btn btn-primary" type="submit" name="submit">Add Club Member</button>
 </div>  

</form>

  <?php foreach ($data['familymembers'] as $familymember) : ?>
                        <?= $familymember->family_member_id; ?>
                    <?php endforeach; ?>