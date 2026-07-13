// resources/js/pengembalian.js

document.addEventListener('DOMContentLoaded', () => {
    const validasiModal = document.getElementById('validasiModal');
    const closeValidasiModalBtn = document.getElementById('closeValidasiModalBtn');
    const cancelValidasiModalBtn = document.getElementById('cancelValidasiModalBtn');
    const validasiForm = document.getElementById('validasiForm');

    // Element modal detail
    const valAnggotaNama = document.getElementById('valAnggotaNama');
    const valAnggotaKode = document.getElementById('valAnggotaKode');
    const valBukuJudul = document.getElementById('valBukuJudul');
    const valBukuKode = document.getElementById('valBukuKode');
    const valTglPinjam = document.getElementById('valTglPinjam');
    const valJatuhTempo = document.getElementById('valJatuhTempo');
    const valTglKembali = document.getElementById('valTglKembali');

    const boxTepatWaktu = document.getElementById('boxTepatWaktu');
    const boxTerlambat = document.getElementById('boxTerlambat');
    const valTerlambatText = document.getElementById('valTerlambatText');
    const valNominalDenda = document.getElementById('valNominalDenda');
    const valDetailDenda = document.getElementById('valDetailDenda');

    document.querySelectorAll('.btn-validasi-pengembalian').forEach(button => {
        button.addEventListener('click', async function() {
            const id = this.dataset.id;

            try {
                const response = await fetch(`/admin/pengembalian/${id}`);
                const data = await response.json();

                // 1. Isikan Data Teks ke Modal Detail
                if (valAnggotaNama) valAnggotaNama.textContent = data.anggota_nama;
                if (valAnggotaKode) valAnggotaKode.textContent = data.anggota_kode;
                if (valBukuJudul) valBukuJudul.textContent = data.buku_judul;
                if (valBukuKode) valBukuKode.textContent = data.buku_kode;
                if (valTglPinjam) valTglPinjam.textContent = data.tgl_pinjam;
                if (valJatuhTempo) valJatuhTempo.textContent = data.jatuh_tempo;
                if (valTglKembali) valTglKembali.textContent = data.tgl_kembali;

                const dendaNominal = parseInt(data.denda, 10) || 0;
                const terlambatHari = parseInt(data.terlambat_hari, 10) || 0;

                // 2. Tampilkan Box Denda Terlambat atau Box Tepat Waktu
                if (dendaNominal > 0 || terlambatHari > 0) {
                    if (boxTepatWaktu) boxTepatWaktu.style.setProperty('display', 'none', 'important');
                    if (boxTerlambat) {
                        boxTerlambat.style.setProperty('display', 'block', 'important');
                        boxTerlambat.classList.remove('hidden');
                    }

                    if (valTerlambatText) valTerlambatText.textContent = `BUKU TERLAMBAT ${terlambatHari} HARI`;
                    if (valNominalDenda) valNominalDenda.textContent = data.denda_formatted;
                    if (valDetailDenda) valDetailDenda.textContent = `Denda Rp 1.000 × ${terlambatHari} hari keterlambatan`;
                } else {
                    if (boxTerlambat) boxTerlambat.style.setProperty('display', 'none', 'important');
                    if (boxTepatWaktu) {
                        boxTepatWaktu.style.setProperty('display', 'flex', 'important');
                        boxTepatWaktu.classList.remove('hidden');
                    }
                }

                if (validasiForm) {
                    validasiForm.action = `/admin/pengembalian/${id}`;
                }

                if (validasiModal) {
                    validasiModal.classList.remove('hidden');
                }

            } catch (error) {
                console.error("Gagal mengambil detail transaksi:", error);
            }
        });
    });

    if (closeValidasiModalBtn && validasiModal) {
        closeValidasiModalBtn.addEventListener('click', () => validasiModal.classList.add('hidden'));
    }
    if (cancelValidasiModalBtn && validasiModal) {
        cancelValidasiModalBtn.addEventListener('click', () => validasiModal.classList.add('hidden'));
    }
});