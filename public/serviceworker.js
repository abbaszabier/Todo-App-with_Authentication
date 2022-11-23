if ("serviceWorker" in navigator) {
    // Proses registrasi Service Worker
    console.log("Service Worker dalam peroses registrasi.");
    // Service Worker didaftarkan pada sw.js
    navigator.serviceWorker.register("/sw-build.js").then(
        function () {
            // Jika proses pendaftaran berhasil
            console.log("Service Worker berhasil didaftarkan.");
        },
        function () {
            // Jika proses pendaftaran Service Worker gagal
            console.log("Service Worker gagal didaftarkan.");
        }
    );
} else {
    // atau jika Service Worker tidak didukung
    console.log("Service Worker tidak didukung.");
}
