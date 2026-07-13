// resources/js/user_katalog.js

document.addEventListener('DOMContentLoaded', () => {
    const detailModal = document.getElementById('detailModal');
    const closeDetailModalBtn = document.getElementById('closeDetailModalBtn');
    const cancelDetailModalBtn = document.getElementById('cancelDetailModalBtn');

    // Field Modal
    const modalKodeBuku = document.getElementById('modalKodeBuku');
    const modalJudul = document.getElementById('modalJudul');
    const modalPengarang = document.getElementById('modalPengarang');
    const modalPenerbit = document.getElementById('modalPenerbit');
    const modalPenerbitBody = document.getElementById('modalPenerbitBody');
    const modalKategoriPill = document.getElementById('modalKategoriPill');
    const modalKategoriBody = document.getElementById('modalKategoriBody');
    const modalStokPill = document.getElementById('modalStokPill');
    const modalStokBody = document.getElementById('modalStokBody');
    const modalPinjamBtnLink = document.getElementById('modalPinjamBtnLink');

    // Handle Klik Kartu Buku
    document.querySelectorAll('.card-buku').forEach(card => {
        card.addEventListener('click', async function() {
            const id = this.dataset.id;

            try {
                const response = await fetch(`/user/buku/${id}`);
                const data = await response.json();

                if (modalKodeBuku) modalKodeBuku.textContent = data.kode_buku;
                if (modalJudul) modalJudul.textContent = data.judul;
                if (modalPengarang) modalPengarang.textContent = data.pengarang;
                if (modalPenerbit) modalPenerbit.textContent = data.penerbit;
                if (modalPenerbitBody) modalPenerbitBody.textContent = data.penerbit;
                if (modalKategoriPill) modalKategoriPill.textContent = data.kategori;
                if (modalKategoriBody) modalKategoriBody.textContent = data.kategori;
                if (modalStokPill) modalStokPill.textContent = `${data.stok} eks. tersedia`;
                if (modalStokBody) modalStokBody.textContent = `${data.stok} eksemplar`;

                // Set dynamic href ke halaman konfirmasi peminjaman
                if (modalPinjamBtnLink) {
                    if (data.stok <= 0) {
                        modalPinjamBtnLink.href = 'javascript:void(0)';
                        modalPinjamBtnLink.classList.add('opacity-50', 'pointer-events-none');
                        modalPinjamBtnLink.textContent = 'Stok Habis';
                    } else {
                        modalPinjamBtnLink.href = `/user/konfirmasi-pinjam/${data.id_buku}`;
                        modalPinjamBtnLink.classList.remove('opacity-50', 'pointer-events-none');
                        modalPinjamBtnLink.textContent = 'Pinjam Buku Ini';
                    }
                }

                if (detailModal) {
                    detailModal.classList.remove('hidden');
                }

            } catch (error) {
                console.error("Gagal mengambil detail buku:", error);
            }
        });
    });

    if (closeDetailModalBtn && detailModal) {
        closeDetailModalBtn.addEventListener('click', () => detailModal.classList.add('hidden'));
    }
    if (cancelDetailModalBtn && detailModal) {
        cancelDetailModalBtn.addEventListener('click', () => detailModal.classList.add('hidden'));
    }
});