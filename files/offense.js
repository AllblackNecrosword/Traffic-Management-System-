const showTableButton = document.querySelector('.button-text');
const tableContainer = document.getElementById('tableContainer');

showTableButton.addEventListener('click', () => {
  tableContainer.style.display = 'block';
});
//check record
const checkButton = document.getElementById('check-button');
const errorMessage = document.getElementById('error-message');

checkButton.addEventListener('click', function() {
  // Check if offense record exists
  const offenseRecordExists = false; // Replace with actual check

  if (!offenseRecordExists) {
    errorMessage.style.display = 'block';
    errorMessage.textContent = 'Offense Record Not Found';
  } else {
    errorMessage.style.display = 'none';
  }
});
