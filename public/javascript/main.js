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

const phoneInput = document.getElementById('phone_number_input');
if (phoneInput) {
  phoneInput.addEventListener('input', function () {
    this.value = formatPhoneNumber(this.value);
  });
}

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

function addPhoneInput() {
      const container = document.getElementById('input-container');
      
      // Create a new input element
      const newInput = document.createElement('input');
      newInput.type = 'text';
      newInput.className = 'form-control mb-2';
      newInput.placeholder = 'Enter additional phone number';
      
      // Append it to the container div
      container.appendChild(newInput);
    }