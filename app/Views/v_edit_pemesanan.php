<?= $this->include("layout/v_header") ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->include("layout/v_sidebar") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-lg-6">
              <h1 class="m-0">Edit Pemesanan</h1>
            </div>
            <!-- /.col -->
            <div class="col-lg-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="<?= base_url("dashboard") ?>">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="<?= base_url("pemesanan") ?>">Pemesanan</a>
                </li>
                <li class="breadcrumb-item active">Edit Pemesanan</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col-md-12 -->
            <div class="col-lg-12">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  <div class="mb-3 font-weight-bold"><span class="text-danger font-weight-bold">&#42;</span> Jangan kosong saat pengubahan</div>
                  <div class="form-group row">
                    <div class="col-md-4 p-0" style="position: relative;">
                      <h6>Form Cari Konsumen</h6>
                      <input type="text" class="form-control" id="cariKonsumen" placeholder="Cari dgn Nomor / Nama.." />
                      <div id="boxSearchResult" class="list-search-cst-container">
                        <ul id="listSearchResult" class="m-0 p-0 ul-search-cst">
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-lg-5">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td id="namaKonsumen"><?= $pesanan["nama"] ?></td>
                          </tr>
                          <tr>
                            <?php
                            $tgl_lahir = intval(date("Y", strtotime($pesanan["tgl_lahir"])));
                            $year_now = intval(date("Y"));
                            $umur = $year_now - $tgl_lahir;
                            ?>
                            <td>Usia</td>
                            <td>:</td>
                            <td id="umurKonsumen"><?= $umur ?> Tahun</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-5">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>No. Kontak</td>
                            <td>:</td>
                            <td id="kontakKonsumen"><?= $pesanan["no_telepon"] ?></td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td id="alamatKonsumen"><?= $pesanan["alamat"] ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <form id="edit_pemesanan" action="<?= base_url("pemesanan/update") ?>" method="post">
                    <input type="hidden" id="idKonsumen" name="id_konsumen" value="<?= $pesanan["id_konsumen"] ?>" />
                    <input type="hidden" name="id_pemesanan" value="<?= $pesanan["id_pemesanan"] ?>" />
                    <input type="hidden" name="id_history_log" value="<?= $log["id_log"] ?>" />
                    <input type="hidden" id="total_kredit" name="total_kredit" value="<?= $kredit ?>" />
                    <input type="hidden" id="old_kredit" name="old_kredit" value="<?= $log["jmlh_bayar"] ?>" />
                    <div class="row mb-3">
                      <div class="col-lg-4">
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputSP"><span class="text-danger font-weight-bold">&#42;</span> No. SP : </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <input type="text" class="form-control" name="sp" id="inputSP" value="<?= $pesanan["no_sp"] ?>" placeholder="Input No SP.." required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputFrame"><span class="text-danger font-weight-bold">&#42;</span> Frame : </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <input type="text" class="form-control" name="frame" id="inputFrame" value="<?= $pesanan["frame"] ?>" placeholder="Input Frame.." required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputFrame"><span class="text-danger font-weight-bold">&#42;</span> Jenis Lensa : </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <select id="lensSelection" class="form-control" name="jenis_lensa" id="inputFrame" required>
                              <?php
                              foreach ($lensa as $lens) {
                                $selected = "";
                                if ($lens["jenis_lensa"] === $pesanan["lensa"]) $selected = "selected";
                              ?>
                                <option value="<?= $lens["jenis_lensa"] ?>" <?= $selected ?>><?= $lens["jenis_lensa"] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputBahanFlattop"><span class="text-danger font-weight-bold">&#42;</span> Bahan Flattop :</label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <select id="inputBahanFlattop" name="flattop" class="form-control" required>
                              <?php
                              foreach ($flattop as $flat) {
                                $selected = "";
                                if ($flat["bahan_lensa"] === $pesanan["flattop"]) $selected = "selected";
                              ?>
                                <option value="<?= $flat["bahan_lensa"] ?>" <?= $selected ?>><?= $flat["bahan_lensa"] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputCoating"><span class="text-danger font-weight-bold">&#42;</span> Coating : </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <select id="inputCoating" name="coating" class="form-control" required>
                              <?php
                              foreach ($coating as $coat) {
                                $selected = "";
                                if ($coat["nama_coating"] === $pesanan["coating"]) $selected = "selected";
                              ?>
                                <option value="<?= $coat["nama_coating"] ?>" <?= $selected ?>><?= $coat["nama_coating"] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputWarna"><span class="text-danger font-weight-bold">&#42;</span> Warna : </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <select id="inputWarna" name="warna" class="form-control" required>
                              <?php
                              foreach ($warna as $w) {
                                $selected = "";
                                if ($w["nama"] === $pesanan["warna"]) $selected = "selected";
                              ?>
                                <option value="<?= $w["nama"] ?>" <?= $selected ?>><?= $w["nama"] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputHarga"><span class="text-danger font-weight-bold">&#42;</span> Harga : </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8 input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" id="inputHarga" name="harga" class="form-control" value="<?= $pesanan["harga"] ?>" placeholder="0" required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputKredit">Sisa Kredit : </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8 input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" id="sisaKredit" class="form-control" value="<?= $pesanan["sisa_kredit"] ?>" placeholder="0" disabled />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="editDP">DP Lama: </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8 input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" value="<?= $log["jmlh_bayar"] ?>" placeholder="0" disabled />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="editDP"><span class="text-danger font-weight-bold">&#42;</span> DP Baru: </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8 input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" id="editDP" name="dp" class="form-control" value="<?= $log["jmlh_bayar"] ?>" placeholder="0" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputTanggal"><span class="text-danger font-weight-bold">&#42;</span> Tanggal Pemesanan:</label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <input type="date" id="inputTanggalPemesanan" name="tgl_pemesanan" class="form-control" value="<?= $pesanan["tgl_pemesanan"] ?>" required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputTanggal"><span class="text-danger font-weight-bold">&#42;</span> Tanggal Pengiriman:</label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <input type="date" id="inputTanggal" name="tgl_pengiriman" class="form-control" value="<?= $pesanan["tgl_pengiriman"] ?>" required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputTanggalJatuhTempo"><span class="text-danger font-weight-bold">&#42;</span> Tanggal Jatuh Tempo:</label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <input type="date" id="inputTanggalJatuhTempo" name="tgl_jatuh_tempo" class="form-control" value="<?= $pesanan["tgl_jatuh_tempo"] ?>" required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputSales"><span class="text-danger font-weight-bold">&#42;</span> Sales: </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <select id="inputSales" class="mb-3 form-control" required>
                              <option value="none">Pilih Sales..</option>
                              <?php
                              foreach ($sales as $sale) {
                              ?>
                                <option value="<?= $sale["username"] ?>"><?= $sale["username"] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                            <div id="list_sales" class="mb-4">
                              <?php
                              $tmp_list_sales = explode(";", $pesanan["sales"]);
                              $nomor = 1;
                              foreach ($tmp_list_sales as $nama_sales) {
                              ?>
                                <span id="sales-<?= $nomor ?>" class="d-inline-block bg-secondary py-1 px-3 mr-2 mb-2 rounded-pill list-sales" style="cursor:pointer"><i class="fas fa-times-circle"></i> <?= $nama_sales ?></span>
                              <?php
                                $nomor++;
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Sph</th>
                                <th>Cyl</th>
                                <th>Axis</th>
                                <th>Add</th>
                                <th>Mpd</th>
                                <th>Prism</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><span class="text-danger font-weight-bold">&#42;</span>R</td>
                                <td><input type="text" name="r_sph" value="<?= $pesanan["R_sph"] ?>" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="r_cyl" value="<?= $pesanan["R_cyt"] ?>" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="r_axis" value="<?= $pesanan["R_axis"] ?>" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="r_add" value="<?= $pesanan["R_add"] ?>" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="r_mpd" value="<?= $pesanan["R_mpd"] ?>" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="r_prism" value="<?= $pesanan["R_prism"] ?>" class="form-control" placeholder="0.00" /></td>
                              </tr>
                              <tr>
                                <td><span class="text-danger font-weight-bold">&#42;</span>L</td>
                                <td><input type="text" name="l_sph" value="<?= $pesanan["L_sph"] ?>" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="l_cyl" value="<?= $pesanan["L_cyt"] ?>" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="l_axis" value="<?= $pesanan["L_axis"] ?>" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="l_add" value="<?= $pesanan["L_add"] ?>" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="l_mpd" value="<?= $pesanan["L_mpd"] ?>" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="l_prism" value="<?= $pesanan["L_prism"] ?>" class="form-control" placeholder="0.00" /></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <p id="danger_edit" class="mb-4 alert alert-danger" style="display: none;"></p>
                    <button type="submit" style="
                          background-color: #02a09e;
                          border-color: #02a09e;
                        " class="btn btn-primary">
                      Ubah Data Pemesanan
                    </button>
                    <?php
                    $nomor = 1;
                    foreach ($tmp_list_sales as $nama_sales) {
                    ?>
                      <input id="hid-sales-<?= $nomor ?>" type="hidden" name="sales[]" value="<?= $nama_sales ?>" />
                    <?php
                      $nomor++;
                    }
                    ?>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.col-md-12 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?= $this->include("layout/v_footer") ?>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url("plugins/jquery/jquery.min.js") ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url("plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url("dist/js/adminlte.min.js") ?>"></script>
  <script>
    $(function() {
      var typingTimer;
      var doneTypingInterval = 800;
      var searchResult = null;
      var idx_sales = $(".list-sales").length + 1;

      // First initiate
      $("#cariKonsumen").val("");
      $(".list-sales").click(function(evt) {
        var id_sales = evt.target.id.split("-")[1];
        $("#hid-sales-" + id_sales).remove();
        $(this).remove();
      });

      $("#cariKonsumen").on("input", function(evt) {
        clearTimeout(typingTimer);
        var keyword = $(evt.target).val();
        if ($(this).val()) {
          $("#boxSearchResult").css({
            "display": "block"
          });
          typingTimer = setTimeout(doneTyping, doneTypingInterval, keyword);
        } else {
          $("#boxSearchResult").css({
            "display": "none"
          });
          $("#namaKonsumen").empty().append("-");
          $("#umurKonsumen").empty().append("- Tahun");
          $("#kontakKonsumen").empty().append("-");
          $("#alamatKonsumen").empty().append("-");
          $("#idKonsumen").val("");
        }
      });

      function doneTyping(keyword) {
        $.ajax({
          url: "/konsumen/search/" + keyword,
          method: "GET",
          success: function(response) {
            result = JSON.parse(response);
            searchResult = result;

            // Begin generate list of search result
            var listSearchResult = [];
            i = 0;
            result.forEach(data => {
              var list = jQuery("<li />", {
                class: "list-content"
              });

              var a = jQuery("<a />", {
                id: "result-" + i,
                href: "javascript:void(0)"
              }).click(function(evt) {
                var idxData = $(evt.target).attr("id");
                // alert(idxData);
                idxData = idxData.split("-")[1];
                $("#listSearchResult").empty();
                $("#boxSearchResult").css({
                  display: "none"
                })
                updateInfoSelection(parseInt(idxData));
              });

              var span = jQuery("<span />")
                .append(jQuery("<b />").text(data.nama))
                .append(" : " + data.no_telepon);
              var p = jQuery("<p />", {
                  class: "m-0"
                })
                .append(data.alamat);

              $(a).append(span).append(p);
              $(list).append(a);

              listSearchResult[i] = list;
              i++;
            });

            $("#listSearchResult").empty();
            $("#listSearchResult").append(listSearchResult);
          }
        });
      }

      function updateInfoSelection(idx) {
        var data = searchResult[idx];

        // Age
        var age = new Date(data.tgl_lahir);
        age = age.getFullYear();
        age = parseInt(new Date().getFullYear()) - parseInt(age);

        $("#namaKonsumen").empty().append(data.nama);
        $("#umurKonsumen").empty().append(age + " Tahun");
        $("#kontakKonsumen").empty().append(data.no_telepon);
        $("#alamatKonsumen").empty().append(data.alamat);
        $("#idKonsumen").val(data.id_konsumen);
      }

      // Function for validation
      $("#edit_pemesanan").submit(function(evt) {
        var harga = parseInt($("#inputHarga").val()); // The price of pemesanan
        var total_kredit = parseInt($("#total_kredit").val()); // the total of kredit which has been paid
        var new_kredit = parseInt($("#editDP").val()); // new DP
        var old_kredit = parseInt($("#old_kredit").val()); // old DP

        // Set default first
        $("#danger_edit").css({
          "display": "none"
        });
        $("#inputHarga").css({
          "border": "1px solid #ced4da"
        });
        $("#editDP").css({
          "border": "1px solid #ced4da"
        });
        $("#inputSales").css({
          "border": "1px solid #ced4da"
        });
        $("#cariKonsumen").css({
          "border": "1px solid #ced4da"
        });

        // Check if customer name hasn't been choosen
        var id_konsumen = $("#idKonsumen").val();
        if (id_konsumen === "") {
          $("#danger_edit").css({
            "display": "block"
          }).html("<i class='fas fa-exclamation-triangle'></i> Data Konsumen Belum Dipilih untuk Ubah Data Pemesanan Ini.");
          $("#cariKonsumen").css({
            "border": "1px solid red"
          });
          evt.preventDefault();
          return;
        }

        // Check if harga lower than kredit terkumpulkan
        if (harga < total_kredit) {
          $("#danger_edit").css({
            "display": "block"
          }).html("<i class='fas fa-exclamation-triangle'></i> Harga Pemesanan Tidak Boleh Kecil Atau Sama Dengan Total Kredit.");
          $("#inputHarga").css({
            "border": "1px solid red"
          });
          evt.preventDefault();
          return;
        }

        // Check new DP
        if (new_kredit > old_kredit) {
          sisa = new_kredit - old_kredit;
          total_kredit = total_kredit + sisa;
        } else {
          sisa = old_kredit - new_kredit;
          total_kredit = total_kredit - sisa;
        }

        if (total_kredit > harga) {
          $("#danger_edit").css({
            "display": "block"
          }).html("<i class='fas fa-exclamation-triangle'></i> Ubah Jumlah Edit DP Terbaru atau Ubah Harga Pemesanan. Data DP Baru Melebihi Harga Pemesanan.");
          $("#editDP").css({
            "border": "1px solid red"
          });
          evt.preventDefault();
          return;
        }

        // Check if no sales name list input
        var jmlh_sales = $(".list-sales").length;
        if (jmlh_sales === 0) {
          $("#danger_edit").css({
            "display": "block"
          }).html("<i class='fas fa-exclamation-triangle'></i> Nama Sales Belum Diinput.");
          $("#inputSales").css({
            "border": "1px solid red"
          });
          evt.preventDefault();
          return;
        }
      });

      // When sales selection event
      $("#inputSales").change(function(evt) {
        var tmp_sales = $(evt.target).val();

        if (tmp_sales === "none") return;

        // Create hidden type element
        var hidden_sales = jQuery("<input />", {
          id: "hid-sales-" + idx_sales,
          name: "sales[]",
          type: "hidden",
          value: tmp_sales
        });

        // Create button type element
        var span_sales = jQuery("<span />", {
          id: "sales-" + idx_sales,
          class: "d-inline-block bg-secondary py-1 px-3 mr-2 mb-2 rounded-pill list-sales",
          style: "cursor:pointer",
          html: "<i class='fas fa-times-circle'></i> " + tmp_sales
        }).click(function(evt) {
          var idx_hid_sales = evt.target.id.split("-")[1];
          $("#hid-sales-" + idx_hid_sales).remove();
          $(this).remove();
        });

        $("#edit_pemesanan").append(hidden_sales);
        $("#list_sales").append(span_sales);

        idx_sales += 1;
      });
    });
  </script>
</body>

</html>