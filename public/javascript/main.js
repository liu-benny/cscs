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