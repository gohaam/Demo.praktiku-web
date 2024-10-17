// Array untuk menyimpan daftar tugas
let todoList = [];

// Fungsi untuk menambahkan tugas baru ke daftar
function addTask() {
    // Ambil elemen input dan nilai yang dimasukkan oleh pengguna
    const inputElement = document.getElementById('todo-input');
    const task = inputElement.value.trim(); // Menghapus spasi di awal/akhir

    // Jika nilai input valid (tidak kosong), tambahkan ke todoList
    if (task) {
        // Tambahkan objek tugas ke dalam array todoList
        todoList.push({ text: task, isEditable: false });
        inputElement.value = ''; // Kosongkan input setelah tugas ditambahkan
        renderTasks(); // Perbarui tampilan daftar tugas
    } else {
        // Tampilkan pesan peringatan jika input kosong
        alert('Please enter a valid task.');
    }
}

// Fungsi untuk menampilkan daftar tugas
function renderTasks() {
    // Ambil elemen daftar <ul> di mana tugas-tugas akan ditampilkan
    const listElement = document.getElementById('todo-list');
    listElement.innerHTML = ''; // Kosongkan daftar sebelum diperbarui

    
    // Iterasi melalui setiap tugas di todoList
    todoList.forEach((task, index) => {
        // Buat elemen <li> untuk setiap tugas
        const listItem = document.createElement('li');

        // Jika tugas sedang dalam mode edit
        if (task.isEditable) {
            // Buat input teks untuk mengedit tugas
            const editInput = document.createElement('input');
            editInput.value = task.text; // Masukkan teks tugas yang ada
            listItem.appendChild(editInput);

            // Buat tombol "Save" untuk menyimpan perubahan
            const saveButton = document.createElement('button');
            saveButton.textContent = 'Save';
            saveButton.className = 'edit-btn'; // Tambahkan kelas CSS untuk styling
            // Saat tombol diklik, simpan perubahan dengan memanggil fungsi saveEdit()
            saveButton.onclick = () => saveEdit(index, editInput.value);
            listItem.appendChild(saveButton);
        } else {
            // Jika tidak dalam mode edit, tampilkan teks tugas
            const taskText = document.createElement('span');
            taskText.textContent = task.text; // Tampilkan teks tugas
            listItem.appendChild(taskText);

            // Buat tombol "Edit" untuk mengedit tugas
            const editButton = document.createElement('button');
            editButton.textContent = 'Edit';
            editButton.className = 'edit-btn'; // Tambahkan kelas CSS untuk styling
            // Saat tombol diklik, ubah tugas ke mode edit
            editButton.onclick = () => editTask(index);
            listItem.appendChild(editButton);
        }

        // Buat tombol "Delete" untuk menghapus tugas
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.className = 'delete-btn'; // Tambahkan kelas CSS untuk styling
        // Saat tombol diklik, hapus tugas dengan memanggil fungsi deleteTask()
        deleteButton.onclick = () => deleteTask(index);
        listItem.appendChild(deleteButton);

        // Tambahkan elemen <li> ke dalam <ul>
        listElement.appendChild(listItem);
    });
}

// Fungsi untuk mengubah tugas ke mode edit
function editTask(index) {
    todoList[index].isEditable = true; // Ubah isEditable menjadi true
    renderTasks(); // Perbarui tampilan daftar tugas
}

// Fungsi untuk menyimpan perubahan yang dilakukan pada tugas yang diedit
function saveEdit(index, newValue) {
    // Periksa apakah nilai baru tidak kosong
    if (newValue.trim()) {
        todoList[index].text = newValue; // Simpan nilai baru
        todoList[index].isEditable = false; // Kembalikan mode non-edit
        renderTasks(); // Perbarui tampilan daftar tugas
    } else {
        // Tampilkan pesan peringatan jika nilai baru kosong
        alert('Task cannot be empty.');
    }
}

// Fungsi untuk menghapus tugas dari daftar
function deleteTask(index) {
    todoList.splice(index, 1); // Hapus tugas di posisi index
    renderTasks(); // Perbarui tampilan daftar tugas
}