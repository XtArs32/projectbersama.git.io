// Fungsi untuk menampilkan data mata kuliah ke dalam tabel
function renderCourses() {
  const tableBody = document.getElementById("tableBody");
  tableBody.innerHTML = "";

  courses.forEach((course) => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${course.kode}</td>
      <td>${course.mataKuliah}</td>
      <td>${course.sks}</td>
      <td>
        <div class="checkbox-container">
          <input type="checkbox" id="checkbox-${course.kode}" class="checkbox" onclick="toggleCourse('${course.kode}')" ${course.selected ? 'checked' : ''}>
          <label for="checkbox-${course.kode}" class="checkmark"></label>
        </div>
        <button class="action-button delete-button" data-kode="${course.kode}">
          <i class="fas fa-trash"></i>
        </button>
      </td>
    `;

    const deleteButton = row.querySelector(".delete-button");
    deleteButton.addEventListener("click", () => deleteCourse(course.kode));

    tableBody.appendChild(row);
  });
}

// Fungsi untuk menambahkan mata kuliah baru
function addCourse() {
  const kodeInput = document.getElementById("kodeInput").value;
  const mataKuliahInput = document.getElementById("mataKuliahInput").value;
  const sksInput = document.getElementById("sksInput").value;

  // Validasi input
  const errorKode = document.getElementById("errorKode");
  const errorMataKuliah = document.getElementById("errorMataKuliah");
  const errorSKS = document.getElementById("errorSKS");

  errorKode.textContent = "";
  errorMataKuliah.textContent = "";
  errorSKS.textContent = "";

  if (!kodeInput) {
    errorKode.textContent = "Kode harus diisi";
    return;
  }

  if (!mataKuliahInput) {
    errorMataKuliah.textContent = "Mata kuliah harus diisi";
    return;
  }

  if (!sksInput || parseInt(sksInput) <= 0) {
    errorSKS.textContent = "SKS harus diisi dengan angka positif";
    return;
  }

  const course = { kode: kodeInput, mataKuliah: mataKuliahInput, sks: parseInt(sksInput), selected: false };
  courses.push(course);
  renderCourses();
  clearInputFields();
}

// Fungsi untuk membersihkan input form
function clearInputFields() {
  document.getElementById("kodeInput").value = "";
  document.getElementById("mataKuliahInput").value = "";
  document.getElementById("sksInput").value = "";
}

// Fungsi untuk mengaktifkan/menonaktifkan seleksi mata kuliah
function toggleCourse(kode) {
  const index = courses.findIndex((course) => course.kode === kode);
  if (index > -1) {
    courses[index].selected = !courses[index].selected;
  }
}

// Fungsi untuk menghapus mata kuliah
function deleteCourse(kode) {
  const course = courses.find((course) => course.kode === kode);

  if (!course) {
    return;
  }

  const confirmDelete = confirm("Apakah Anda yakin ingin menghapus mata kuliah ini?");
  if (confirmDelete) {
    const index = courses.indexOf(course);
    courses.splice(index, 1);
    renderCourses();
  }
}

// Fungsi untuk menampilkan/menyembunyikan form tambah mata kuliah
function toggleForm() {
  const formContainer = document.getElementById("formContainer");
  formContainer.classList.toggle("hidden");
}

// Panggil fungsi renderCourses() saat halaman dimuat
renderCourses();
