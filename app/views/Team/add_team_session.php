<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" action="<?= URLROOT; ?>/Team/add_team_session">
    <h3>First, Create a Team Session</h3>
        
        <div class="form-group row"> 
            <label for="type_input" class="col-sm-2 col-form-label">Session Type</label> 
        <div class="col-sm-4"> 
                <select id="type_input" class="form-control" name="session_type" required>
                    <option selected disable hidden>Please choose an option</option>
                    <option>Game</option>
                    <option>Training</option>
                </select>  
            </div>
        </div>

        <div class="form-group row"> 
        <label for="date_input" class="col-sm-2 col-form-label">Date</label> 
        <div class="col-sm-4"> 
            <?php $max_date = date('Y-m-d', strtotime('+1 year')); ?>
            <input 
                type="date" 
                class="form-control" 
                id="date_input" 
                name="date" 
                max="<?= $max_date; ?>" 
                required> 
        </div>
        </div>

        <div class="form-group row"> 
        <label for="start_time" class="col-sm-2 col-form-label">Choose a time:</label>
            <div class="col-sm-4">
                <input type="time" min="08:00" max="20:00" id="start_time" name="start_time" required> 
            </div>
        </div>

        <div class="form-group row">
            <label for="address_input" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="address_input" name="address" placeholder="Address" required>
            </div>
        </div>

        <div class="form-group row">
        <label for="gender_input" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-4">
                <select id="gender_input" class="form-control" name="gender" required>
                    <option selected disable hidden>Please choose an option</option>
                    <option>Boy</option>
                    <option>Girl</option>
                </select>  
            </div>
        </div>

        

    <button class="btn btn-primary" type="submit" name="submit">Next</button>
</form>

<?php require APPROOT . '/views/includes/footer.php';  ?>