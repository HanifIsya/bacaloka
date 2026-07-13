// resources/js/buku.js

document.addEventListener('DOMContentLoaded', () => {
    // Modal Tambah Buku
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

    // Modal Edit Buku
    const editModal = document.getElementById('editModal');
    const closeEditModalBtn = document.getElementById('closeEditModalBtn');
    const cancelEditModalBtn = document.getElementById('cancelEditModalBtn');
    const editForm = document.getElementById('editForm');

    // Attach click event ke setiap tombol edit
    document.querySelectorAll('.btn-edit-buku').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.dataset.id;
            const judul = this.dataset.judul;
            const pengarang = this.dataset.pengarang;
            const penerbit = this.dataset.penerbit;
            const stok = this.dataset.stok;
            const kategori = this.dataset.kategori;

            // Isi nilai ke input modal edit
            document.getElementById('edit_judul').value = judul;
            document.getElementById('edit_pengarang').value = pengarang;
            document.getElementById('edit_penerbit').value = penerbit;
            document.getElementById('edit_stok').value = stok;
            document.getElementById('edit_kategori').value = kategori;

            // Set dynamic action URL pada form
            if (editForm) {
                editForm.action = `/admin/buku/${id}`;
            }

            // Tampilkan Modal
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