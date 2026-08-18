document.addEventListener('DOMContentLoaded', function () {
  const postalCodeInput = document.getElementById('postal_code_input');

  if (postalCodeInput) {
    postalCodeInput.addEventListener('input', function () {
      let value = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
      value = value.slice(0, 6);

      if (value.length > 3) {
        value = value.slice(0, 3) + ' ' + value.slice(3);
      }

      this.value = value;
    });
  }
});

function formatPhoneNumber(value) {
  let digits = value.replace(/\D/g, '').slice(0, 11);

  if (digits.length === 11 && digits[0] === '1') {
    return '1-' +
      digits.slice(1, 4) +
      '-' +
      digits.slice(4, 7) +
      '-' +
      digits.slice(7);
  }

  digits = digits.slice(0, 10);

  if (digits.length <= 3) return digits;
  if (digits.length <= 6) return digits.slice(0, 3) + '-' + digits.slice(3);
  return digits.slice(0, 3) + '-' + digits.slice(3, 6) + '-' + digits.slice(6);
}

// const phoneInput = document.getElementById('phone_number_input');
// if (phoneInput) {
//   phoneInput.addEventListener('input', function () {
//     this.value = formatPhoneNumber(this.value);
//   });
// }

document.addEventListener('input', function (e) {
  if (e.target && e.target.classList.contains('phone-input-field')) {
    e.target.value = formatPhoneNumber(e.target.value);
  }
});

document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form[action$="/Personnel/add_personnel"]') || document.querySelector('form');
  const start = document.getElementById('start_date_input');
  const end = document.getElementById('end_date_input');
  if (!form || !start || !end) return;

  // prevent end < start and keep min in sync
  start.addEventListener('change', () => {
    end.min = start.value || '';
    if (end.value && end.value < start.value) end.value = start.value;
    end.setCustomValidity('');
  });

  form.addEventListener('submit', (e) => {
    if (end.value && start.value > end.value) {
      e.preventDefault();
      alert('End date must be the same day or after Start date.');
    }
  });
});

// 1. Add this brand new function to safely handle row removal
function removePhoneRow(buttonElement) {
  const container = document.getElementById('phone-inputs-container');
  // Count how many total phone rows exist right now
  const totalRows = container.getElementsByClassName('phone-row').length;

  // Only allow removal if there is more than 1 row remaining
  if (totalRows > 1) {
    buttonElement.closest('.phone-row').remove();
  } else {
    alert("You must keep at least one phone number field.");
  }
}

function addPhoneInput() {
  const container = document.getElementById('phone-inputs-container');
  
  // 1. Added the 'phone-row' class here to match the HTML loop structure
  const rowWrapper = document.createElement('div');
  rowWrapper.className = 'input-group mb-2 phone-row'; 

  // 2. Create your phone input element
  const newInput = document.createElement('input');
  newInput.type = 'tel';
  newInput.className = 'form-control phone-input-field'; 
  newInput.placeholder = 'Enter additional phone number';
  newInput.name = 'phone_number[]';
  newInput.required = true; 

  // 3. Create a wrapper div for the button appending element
  const buttonAppend = document.createElement('div');
  buttonAppend.className = 'input-group-append';

  // 4. Create the Bootstrap style Danger / Remove button
  const removeBtn = document.createElement('button');
  removeBtn.type = 'button';
  removeBtn.className = 'btn btn-danger';
  removeBtn.innerHTML = 'Remove'; 

  // 5. Updated this event listener to call our safe deletion helper function
  removeBtn.addEventListener('click', function() {
    removePhoneRow(this);
  });

  // 6. Assemble the components together inside the DOM
  buttonAppend.appendChild(removeBtn);
  rowWrapper.appendChild(newInput);
  rowWrapper.appendChild(buttonAppend);

  // 7. Inject the complete dynamic row group into your parent block
  container.appendChild(rowWrapper);
}


document.addEventListener('DOMContentLoaded', function () {
    const team1Select = document.getElementById('team1_id_input');
    const team2Select = document.getElementById('team2_id_input');

    // Safety check: Only attach listeners if BOTH dropdown elements exist on this page
    if (team1Select && team2Select) {
        function checkDuplicateTeams() {
            if (team1Select.value === team2Select.value && team1Select.value !== "") {
                alert("Teams cannot play against each other. Please select different teams.");
                team2Select.value = ""; // Resets the second dropdown selection
            }
        }

        // Check for duplicates whenever either dropdown changes
        team1Select.addEventListener('change', checkDuplicateTeams);
        team2Select.addEventListener('change', checkDuplicateTeams);
    }
});


window.addEventListener('change', function(event) {
    const currentElement = event.target;

    // Check if the modified element is a Team 1 checkbox
    if (currentElement.matches('input[name="team1_players[]"]')) {
        if (currentElement.checked) {
            const playerValue = currentElement.value;
            // Scan Team 2 checkboxes for a match
            const match = document.querySelector(`input[name="team2_players[]"][value="${playerValue}"]:checked`);
            
            if (match) {
                alert("Warning: This player is already assigned to Team 2.");
                currentElement.checked = false; // Force uncheck
            }
        }
    }

    // Check if the modified element is a Team 2 checkbox
    if (currentElement.matches('input[name="team2_players[]"]')) {
        if (currentElement.checked) {
            const playerValue = currentElement.value;
            // Scan Team 1 checkboxes for a match
            const match = document.querySelector(`input[name="team1_players[]"][value="${playerValue}"]:checked`);
            
            if (match) {
                alert("Warning: This player is already assigned to Team 1.");
                currentElement.checked = false; // Force uncheck
            }
        }
    }

    // --- Coach Validation Helper ---
    if (currentElement.id === 'coach1_id_input' || currentElement.id === 'coach2_id_input') {
        const coach1 = document.getElementById('coach1_id_input');
        const coach2 = document.getElementById('coach2_id_input');
        
        if (coach1 && coach2 && coach1.value && coach2.value && coach1.value === coach2.value) {
            alert("Warning: You cannot assign the same Head Coach to both teams.");
            currentElement.value = ""; // Reset current selection
        }
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('teamForm');
    
    // Safety check: Only run if this specific form exists on the current page
    if (form) {
        form.addEventListener('submit', function(event) {
            // Select all checked elements for both squads
            const checkedPlayers1 = document.querySelectorAll('.team1-checkbox:checked');
            const checkedPlayers2 = document.querySelectorAll('.team2-checkbox:checked');

            // If either team has zero players, block submission and alert
            if (checkedPlayers1.length === 0 || checkedPlayers2.length === 0) {
                event.preventDefault(); 
                alert('A team cannot have zero players assigned. Please ensure both teams have players.');
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('editTeamForm');
    
    // Only attach the listener if the form element exists on the page
    if (form) {
        form.addEventListener('submit', function(event) {
            const checkedPlayers = document.querySelectorAll('.team-checkbox:checked');

            if (checkedPlayers.length === 0) {
                event.preventDefault(); 
                alert('A team cannot have zero players assigned.');
            }
        });
    }
});