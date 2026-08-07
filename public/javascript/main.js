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