<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Validasi Sertifikat</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
  /* CSS untuk menempatkan QR code scanner di tengah */
  .scanner-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 60vh;
    flex-direction: column; /* Mengatur agar elemen berada dalam kolom */
    position: relative; /* Menyediakan kerangka acuan untuk elemen .light */
  }

  .scanner .light {
      position: absolute;
      width: 100%;
      height: 2px; /* Mengatur ketebalan garis pemindaian */
      background-color: red;
      left: 50%;
      transform: translateX(-50%);
      top: -2px; /* Menempatkan garis di atas teks */
      animation: scan 2s linear infinite;
  }

  @keyframes scan {
      0% {
          top: -2px;
      }
      50% {
          top: calc(100% - 2px); /* Animasi pemindaian berada di tengah */
      }
      100% {
          top: -2px; /* Kembali ke posisi awal */
      }
  }
  
</style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <h1 class="text-center mt-5">Validasi Sertifikat</h1>
      <div class="scanner-container">
        <!-- Perangkat pemindai QR code -->
        <div id="scanner2" class="scanner">
            <video id="scanner" style="max-width: 100%"></video>
          <!-- Placeholder untuk hasil pemindaian QR code -->
          <div class="light"></div> <!-- Menambahkan elemen untuk garis pemindaian -->
        </div>
        </div>
    <div id="result" class="text-center text-muted">Hasil pemindaian QR code akan ditampilkan di sini.</div>
      <!-- Tombol untuk melakukan validasi manual -->
      <div class="text-center mt-3">
        <button class="btn btn-primary">Validasi Manual</button>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Instascan JS untuk pemindai QR code -->
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
  // Inisialisasi pemindai QR code
  let scanner = new Instascan.Scanner({ video: document.getElementById('scanner') });
  scanner.addListener('scan', function (content) {
    // Ketika QR code terbaca, tampilkan hasilnya
    document.getElementById('result').innerHTML = content;
  });
  // Memulai pemindai QR code
  Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
      console.error('No cameras found.');
    }
  }).catch(function (e) {
    console.error(e);
  });
</script>
</body>
</html>
