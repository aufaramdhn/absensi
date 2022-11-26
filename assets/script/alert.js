$(".btn-delete").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  Swal.fire({
    title: "Apakah kamu yakin?",
    text: "Data ini akan di hapus?",
    type: "warning",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Delete Records",
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        icon: "success",
        title: "Data berhasil di hapus",
        showConfirmButton: false,
      });
      setTimeout(function () {
        document.location.href = href;
      }, 1200);
    }
  });
});

$(".btn-logout").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  Swal.fire({
    title: "Are you sure?",
    text: "Want to leave this website?",
    type: "warning",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Logout",
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        icon: "success",
        title: "Anda berhasil logout",
        showConfirmButton: false,
      });
      setTimeout(function () {
        document.location.href = href;
      }, 1200);
    }
  });
});

const notifikasi = $(".info-data").data("infodata");

if (notifikasi == "simpan") {
  Swal.fire({
    icon: "success",
    title: "Data berhasil disimpan",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "gagal") {
  Swal.fire({
    icon: "error",
    title: "Data gagal di proses",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "update") {
  Swal.fire({
    position: "center",
    icon: "success",
    title: "Berhasil",
    text: "Data berhasil di update",
    showConfirmButton: false,
    timer: 2000,
  });
} else if (notifikasi == "login berhasil") {
  Swal.fire({
    icon: "success",
    title: "Login berhasil",
    text: "Selamat datang di website absensi",
    showConfirmButton: false,
    timer: 1500,
  });
} else if (notifikasi == "login gagal") {
  Swal.fire({
    icon: "error",
    title: "error",
    text: "Username atau password anda salah",
    showConfirmButton: false,
    timer: 1500,
  });
}
