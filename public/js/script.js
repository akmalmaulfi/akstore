$(document).ready(function () {
  // Tombol tambah kategori
  $(".tombolTambahData").on("click", function () {
    $("#kategori-modal-title").html("Tambah Kategori");
    $(".modal-footer-kategori button[type=submit]").html("Tambah");
    $(".modal-content-kategori form").attr(
      "action",
      "/item-handler/create-kategori"
    );
    $("#judul-kategori").val("");
  });

  // Tombol Ubah Kategori
  $(".tampilModalUbah").on("click", function () {
    $("#kategori-modal-title").html("Ubah Kategori");
    $(".modal-footer-kategori button[type=submit]").html("Ubah Data");
    $(".modal-content-kategori form").attr("action", "/kategori/update");

    const id = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "/kategori/getKategoriJSON",
      data: { id: id },
      dateType: "json",
      success: function (response) {
        $("#judul-kategori").val(response.nama);
        $("#id").val(response.id);
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });

  // Tombol tambah Produk
  $(".tombolTambahProduk").on("click", function () {
    $("#foto").attr("required", "required");
    $("#produk-modal-title").html("Tambah Produk");
    $(".modal-footer-title button[type=submit]").html("Tambah");
    $(".modal-content-produk form").attr("action", "/produk/create");
    $("#produk").val("");
    $("#kategori").val("");
    $("#size").val("");
    $("#stok").val("");
    $("#harga").val("");
    $("#keterangan").val("");
    $("#foto").val("");
  });

  // Tombol ubah produk
  $(".tombolUbahProduk").on("click", function () {
    $("#produk-modal-title").html("Ubah Produk");
    $(".modal-footer-title button[type=submit]").html("Ubah");
    $(".modal-content-produk form").attr("action", "/produk/update");
    $("#foto").removeAttr("required");

    const id = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "/produk/getProdukJSON",
      data: { id: id },
      dateType: "json",
      success: function (response) {
        console.log(response);
        $("#id-produk").val(response.id);
        $("#kategoriLama").val(response.id_kategori);
        $("#sizeLama").val(response.size);
        $("#fotoLama").val(response.foto);
        $("#produk").val(response.produk);
        $("#kategori").val(response.id_kategori);
        $("#size").val(response.size);
        $("#stok").val(response.stok);
        $("#harga").val(response.harga);
        $("#keterangan").val(response.keterangan);
        $("#foto").val(response.foto);
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });

  $(".tombolUbahProduk").on("click", function () {
    $("#produk-modal-title").html("Ubah Produk");
    $(".modal-footer-title button[type=submit]").html("Ubah");
    $(".modal-content-produk form").attr("action", "/produk/update");
    $("#foto").removeAttr("required");

    const id = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "/produk/getProdukJSON",
      data: { id: id },
      dateType: "json",
      success: function (response) {
        $("#ukuran").first().remove();
        if (response.ukuran) {
          const ukuranContainer = document.getElementById("testing");
          ukuranContainer.innerHTML = ""; // Membersihkan container sebelum menambah input baru
          response.ukuran.forEach(function (ukuran) {
            const newInput = document.createElement("input");
            newInput.className = "form-control";
            newInput.type = "text";
            newInput.name = "ukuran[]";
            newInput.value = ukuran; // Mengisi nilai input dengan ukuran dari database
            ukuranContainer.appendChild(newInput);
          });
        }
        $("#id-produk").val(response.id);
        $("#kategoriLama").val(response.id_kategori);
        $("#sizeLama").val(response.size);
        $("#fotoLama").val(response.foto);
        $("#produk").val(response.produk);
        $("#kategori").val(response.id_kategori);
        $("#size").val(response.size);
        $("#stok").val(response.stok);
        $("#harga").val(response.harga);
        $("#keterangan").val(response.keterangan);
        $("#foto").val(response.foto);
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });
});

function tambahInput() {
  let input = document.createElement("input");
  input.type = "text";
  input.name = "ukuran[]";
  input.required = true;
  input.classList.add("form-control");

  let br = document.createElement("br");

  document
    .querySelector("#modal-produk form #testing")
    .insertBefore(
      input,
      document.querySelector("#modal-produk form #testing").lastChild
    );
  document
    .querySelector("#modal-produk form #testing")
    .insertBefore(
      br,
      document.querySelector("#modal-produk form #testing").lastChild
    );
}

function showRatingPopup() {
  if (confirm("Barang sudah sampai?")) {
    // document.getElementById("ratingPopup").style.display = "block";
    document.getElementById("modalRate").click();
    // Menambahkan logika untuk men-submit form setelah memberikan rating
    document
      .getElementById("submitButton")
      .addEventListener("click", function (event) {
        // Pastikan rating sudah diisi sebelum form dikirim
        if (document.getElementById("ratingStars").value !== "") {
          // Mengizinkan form untuk di-submit setelah rating diisi
          document.getElementById("orderArrivedForm").submit();
        } else {
          // Jika rating belum diisi, tampilkan pesan kesalahan atau lakukan tindakan lain
          alert("Harap isi rating sebelum mengirimkan form!");
          event.preventDefault(); // Mencegah form dikirim jika rating belum diisi
        }
      });
  }
}

function submitRating() {
  // const rating = document.getElementById("ratingStars").value;
  const rating = getSelectedRating();
  const idProduk = document.querySelector('input[name="idProduk"]').value;
  const idCustomer = document.querySelector('input[name="idCustomer"]').value;

  // Kirim rating, idProduk, dan idCustomer ke backend menggunakan AJAX (misalnya dengan fetch)
  fetch("/rate", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      rating: rating,
      idProduk: idProduk,
      idCustomer: idCustomer,
    }),
  })
    .then((response) => {
      // Handle respons dari backend
      if (response.ok) {
        // Jika respons berhasil (status code 200-299), lakukan sesuatu (misalnya, tampilkan pesan)
        console.log("Rating berhasil dikirim!");
        localStorage.setItem("submitButtonClicked", "true");
        document.getElementById("submitButton").click();
      } else {
        // Jika terdapat kesalahan dari server, tampilkan pesan atau lakukan penanganan kesalahan yang sesuai
        console.error("Gagal mengirim rating:", response.statusText);
      }
    })
    .catch((error) => {
      // Handle jika terjadi kesalahan saat mengirim data ke backend
      console.error("Kesalahan dalam mengirim rating:", error);
    });
}

function getSelectedRating() {
  // Ambil semua elemen radio button dalam fieldset dengan class "rating"
  var ratingInputs = document.querySelectorAll(
    'fieldset.rating input[type="radio"]'
  );

  var selectedValue = null;

  // Periksa apakah ada elemen radio button yang terpilih
  var selectedInput = Array.from(ratingInputs).find((input) => input.checked);

  if (selectedInput) {
    // Jika elemen radio button terpilih, simpan nilainya
    selectedValue = selectedInput.value;
  }

  // Kembalikan nilai dari elemen radio button yang terpilih
  return selectedValue;
}

function checkButtonClickAndShowModal() {
  const buttonClicked = localStorage.getItem("submitButtonClicked");

  if (buttonClicked) {
    // Hapus status dari local storage
    localStorage.removeItem("submitButtonClicked");

    // Pemanggilan fungsi atau skrip untuk memunculkan modal di sini
    // Contoh:
    document.getElementById("btnRecommend").click(); // Ganti 'tombolModal' dengan ID tombol yang memunculkan modal
  }
}

window.onload = checkButtonClickAndShowModal;
