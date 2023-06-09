// Global variable to store selected checkboxes
var selectedCheckboxes = [];

// Function to handle file upload
function handleFileUpload() {
  var fileInput = document.getElementById('fileInput');
  var file = fileInput.files[0];

  // Process the file (example: reading data using FileReader)
  var reader = new FileReader();
  reader.onload = function(e) {
    var data = e.target.result;
    // Process the data (example: parsing CSV data)
    var parsedData = parseCSVData(data);
    // Update the table with parsed data
    updateTable(parsedData);
  };
  reader.readAsText(file);
}

// Function to parse CSV data (example)
function parseCSVData(data) {
  // Example: Splitting data by line and comma
  var rows = data.split('\n');
  var parsedData = [];
  for (var i = 0; i < rows.length; i++) {
    var columns = rows[i].split(',');
    parsedData.push(columns);
  }
  return parsedData;
}

// Function to update the table with parsed data
function updateTable(data) {
  var tableBody = document.querySelector('#table tbody');
  // Clear existing table rows
  tableBody.innerHTML = '';
  // Create new rows based on data
  for (var i = 0; i < data.length; i++) {
    var row = document.createElement('tr');
    for (var j = 0; j < data[i].length; j++) {
      var cell = document.createElement('td');
      cell.textContent = data[i][j];
      row.appendChild(cell);
    }
    var checkboxCell = document.createElement('td');
    var actionPanel = document.createElement('div');
    actionPanel.className = 'action-panel';
    var actionButton = document.createElement('button');
    actionButton.className = 'action-button';
    actionButton.onclick = function() {
      toggleCheckbox(this);
    };
    actionPanel.appendChild(actionButton);
    var checkbox = document.createElement('div');
    checkbox.className = 'checkbox';
    actionPanel.appendChild(checkbox);
    checkboxCell.appendChild(actionPanel);
    row.appendChild(checkboxCell);
    tableBody.appendChild(row);
  }
}

// Function to toggle checkbox selection
function toggleCheckbox(button) {
  var actionPanel = button.parentNode;
  var checkbox = actionPanel.querySelector('.checkbox');
  checkbox.classList.toggle('checked');
  var tableRow = actionPanel.parentNode.parentNode;
  var isChecked = checkbox.classList.contains('checked');
  if (isChecked) {
    tableRow.classList.add('selected');
    selectedCheckboxes.push(tableRow);
  } else {
    tableRow.classList.remove('selected');
    var index = selectedCheckboxes.indexOf(tableRow);
    if (index > -1) {
      selectedCheckboxes.splice(index, 1);
    }
  }
  // Enable or disable upload button based on checkbox selection
  var uploadButton = document.getElementById('uploadButton');
  uploadButton.disabled = selectedCheckboxes.length === 0;
}

// Function to upload selected data
function uploadSelection() {
  // Example: Get selected data from table rows
  var selectedData = [];
  for (var i = 0; i < selectedCheckboxes.length; i++) {
    var row = selectedCheckboxes[i];
    var kode = row.querySelector('.kode').textContent;
    var mataKuliah = row.querySelector('.mata-kuliah').textContent;
    var sks = row.querySelector('.sks').textContent;
    var dosen = row.querySelector('.dosen').textContent;
    var rowData = [kode, mataKuliah, sks, dosen];
    selectedData.push(rowData);
  }
  // Example: Perform an upload request with selected data
  // Replace this code with your own upload implementation
  var message = document.getElementById('message');
  message.textContent = 'Uploading...';
  setTimeout(function() {
    message.textContent = 'Upload completed!';
  }, 2000);
}

function uploadSelection() {
  var selectedData = [];
  var rows = document.querySelectorAll('#table tbody tr');
  for (var i = 0; i < rows.length; i++) {
    var row = rows[i];
    var checkbox = row.querySelector('.checkbox');
    if (checkbox.classList.contains('checked')) {
      var kode = row.querySelector('.kode').textContent;
      var mataKuliah = row.querySelector('.mata-kuliah').textContent;
      var sks = row.querySelector('.sks').textContent;
      var dosen = row.querySelector('.dosen').textContent;
      var rowData = [kode, mataKuliah, sks, dosen];
      selectedData.push(rowData);
    }
  }
  // Store selectedData in local storage
  localStorage.setItem('selectedData', JSON.stringify(selectedData));
  // Example: Perform an upload request with selected data
  // Replace this code with your own upload implementation
  var message = document.getElementById('message');
  message.textContent = 'Uploading...';
  setTimeout(function() {
    message.textContent = 'Upload completed!';
  }, 2000);
}