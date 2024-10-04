// Menjalankan kode setelah seluruh halaman HTML telah dimuat
document.addEventListener("DOMContentLoaded", function() {
    // Mendapatkan URL lengkap dari halaman saat ini
    const currentLocation = window.location.href;
    
    // Memilih semua elemen dengan kelas "nav-link"
    const menuItems = document.querySelectorAll(".nav-link");
    
    // Melakukan pengecekan untuk setiap link navigasi
    menuItems.forEach(item => {
        // Memeriksa apakah link navigasi ini sama dengan URL halaman saat ini
        if (item.href === currentLocation) {
            // Menambahkan kelas "active" untuk menandai link navigasi yang aktif
            item.classList.add("active");
        }
    });
});
