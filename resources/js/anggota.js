// resources/js/anggota.js

document.addEventListener('DOMContentLoaded', () => {
    // Modal Tambah Anggota
    const openCreateModalBtn = document.getElementById('openCreateModalBtn');
    const closeCreateModalBtn = document.getElementById('closeCreateModalBtn');
    const cancelCreateModalBtn = document.getElementById('cancelCreateModalBtn');
    const createModal = document.getElementById('createModal');

    if (openCreateModalBtn && createModal) {
        openCreateModalBtn.addEventListener('click', () => createModal.classList.remove('hidden'));
    }
    if (closeCreateModalBtn && createModal) {
        closeCreateModalBtn.addEventListener('click', () => createModal.classList.add('hidden'));
    }
    if (cancelCreateModalBtn && createModal) {
        cancelCreateModalBtn.addEventListener('click', () => createModal.classList.add('hidden'));
    }

    // Modal Edit Anggota
    const editModal = document.getElementById('editModal');
    const closeEditModalBtn = document.getElementById('closeEditModalBtn');
    const cancelEditModalBtn = document.getElementById('cancelEditModalBtn');
    const editForm = document.getElementById('editForm');

    document.querySelectorAll('.btn-edit-anggota').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.dataset.id;
            const nama = this.dataset.nama;
            const alamat = this.dataset.alamat;
            const status = this.dataset.status;
            const kode = this.dataset.kode;

            document.getElementById('edit_id_anggota').value = kode;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_alamat').value = alamat;

            // Handle Radio Button Status
            if (status === 'Aktif') {
                document.getElementById('edit_status_aktif').checked = true;
            } else {
                document.getElementById('edit_status_nonaktif').checked = true;
            }

            if (editForm) {
                editForm.action = `/admin/anggota/${id}`;
            }

            if (editModal) {
                editModal.classList.remove('hidden');
            }
        });
    });

    if (closeEditModalBtn && editModal) {
        closeEditModalBtn.addEventListener('click', () => editModal.classList.add('hidden'));
    }
    if (cancelEditModalBtn && editModal) {
        cancelEditModalBtn.addEventListener('click', () => editModal.classList.add('hidden'));
    }
});