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
              <h1 class="m-0">Buat Pemesanan</h1>
            </div>
            <!-- /.col -->
            <div class="col-lg-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <a href="<?= base_url("dashboard") ?>">Home</a>
                </li>
                <li class="breadcrumb-item active">Buat Pemesanan</li>
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
                  <div class="mb-3 font-weight-bold"><span class="text-danger font-weight-bold">&#42;</span> Wajib diisi</div>
                  <div class="form-group row">
                    <div class="col-md-4 p-0" style="position: relative;">
                      <h6><span class="text-danger font-weight-bold">&#42;</span> Form Cari Konsumen</h6>
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
                            <td id="namaKonsumen">-</td>
                          </tr>
                          <tr>
                            <td>Usia</td>
                            <td>:</td>
                            <td id="umurKonsumen">- Tahun</td>
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
                            <td id="kontakKonsumen">-</td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td id="alamatKonsumen">-</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <form id="buat_pemesanan" action="<?= base_url("buat-pemesanan/create") ?>" method="post">
                    <input type="hidden" id="idKonsumen" name="id_konsumen" />
                    <div class="row mb-3">
                      <div class="col-lg-4">
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputSP"><span class="text-danger font-weight-bold">&#42;</span> No. SP : </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <input type="text" class="form-control" name="sp" id="inputSP" placeholder="Input No SP.." required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputFrame"><span class="text-danger font-weight-bold">&#42;</span> Frame : </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <input type="text" class="form-control" name="frame" id="inputFrame" placeholder="Input Frame.." required />
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
                              ?>
                                <option value="<?= $lens["jenis_lensa"] ?>"><?= $lens["jenis_lensa"] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputBahanFlattop"><span class="text-danger font-weight-bold">&#42;</span> Bahan Lensa :
                            </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <select id="inputBahanFlattop" name="flattop" class="form-control" required>
                              <?php
                              foreach ($flattop as $flat) {
                              ?>
                                <option value="<?= $flat["bahan_lensa"] ?>"><?= $flat["bahan_lensa"] ?></option>
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
                              ?>
                                <option value="<?= $coat["nama_coating"] ?>"><?= $coat["nama_coating"] ?></option>
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
                              ?>
                                <option value="<?= $w["nama"] ?>"><?= $w["nama"] ?></option>
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
                            <input type="text" id="inputHarga" name="harga" class="form-control" placeholder="0" required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputDP"><span class="text-danger font-weight-bold">&#42;</span> DP : </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8 input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" id="inputDP" name="dp" class="form-control" placeholder="0" required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputTanggal"><span class="text-danger font-weight-bold">&#42;</span> Tanggal Pengiriman:
                            </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <input type="date" id="inputTanggal" name="tgl_pengiriman" class="form-control" placeholder="0" required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputTanggalJatuhTempo"><span class="text-danger font-weight-bold">&#42;</span> Tanggal Jatuh Tempo:
                            </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8">
                            <input type="date" id="inputTanggalJatuhTempo" name="tgl_jatuh_tempo" class="form-control" placeholder="0" required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-xl-4 col-lg-12 col-md-4">
                            <label for="inputSales"><span class="text-danger font-weight-bold">&#42;</span> Sales: </label>
                          </div>
                          <div class="col-xl-7 col-lg-12 col-md-8 position-relative">
                            <select id="inputSales" class="mb-3 form-control">
                              <option value="none">Pilih sales..</option>
                              <?php
                              foreach ($sales as $sale) {
                              ?>
                                <option value="<?= $sale["username"] ?>"><?= $sale["username"] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                            <div id="list_sales" class="mb-4"></div>
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
                                <td><span class="text-danger font-weight-bold">&#42;</span> R</td>
                                <td><input type="text" name="r_sph" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="r_cyl" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="r_axis" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="r_add" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="r_mpd" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="r_prism" class="form-control" placeholder="0.00" /></td>
                              </tr>
                              <tr>
                                <td><span class="text-danger font-weight-bold">&#42;</span> L</td>
                                <td><input type="text" name="l_sph" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="l_cyl" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="l_axis" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="l_add" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="l_mpd" class="form-control" placeholder="0.00" /></td>
                                <td><input type="text" name="l_prism" class="form-control" placeholder="0.00" /></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <p id="danger_dp_besar" class="mb-4 alert alert-danger" style="display: none;"></p>
                    <button type="submit" style="
                          background-color: #02a09e;
                          border-color: #02a09e;
                        " class="btn btn-primary">
                      Buat Pemesanan
                    </button>
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
      var idx_sales = 1;

      // First initiate
      $("#cariKonsumen").val("");

      $("#cariKonsumen").on("input", function(evt) {
        $("#listSearchResult").empty();
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

            if (result.length == 0) {
              var emptyResult = jQuery("<span />", {
                class: "d-block p-3 font-weight-bold text-center",
                text: "Pencarian Tidak Ditemukan"
              });
              $("#listSearchResult").append(emptyResult);
              return; // finish the task
            }

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
      $("#buat_pemesanan").submit(function(evt) {
        var harga = parseInt($("#inputHarga").val());
        var dp = parseInt($("#inputDP").val());

        // Set default first
        $("#danger_dp_besar").css({
          "display": "none"
        });
        $("#inputHarga").css({
          "border": "1px solid #ced4da"
        });
        $("#inputDP").css({
          "border": "1px solid #ced4da"
        });
        $("#inputSales").css({
          "border": "1px solid #ced4da"
        });
        $("#cariKonsumen").css({
          "border": "1px solid #ced4da"
        });

        // Check if customer name has been choosen
        var id_konsumen = $("#idKonsumen").val();
        if (id_konsumen === "") {
          $("#danger_dp_besar").css({
            "display": "block"
          }).html("<i class='fas fa-exclamation-triangle'></i> Konsumen Belum Dipilih untuk Pemesanan Ini.");
          $("#cariKonsumen").css({
            "border": "1px solid red"
          });
          evt.preventDefault();
          return;
        }

        // Check if sisa lower than 0
        var sisa = harga - dp;
        if (sisa < 0) {
          $("#danger_dp_besar").css({
            "display": "block"
          }).html("<i class='fas fa-exclamation-triangle'></i> Jumlah DP Lebih Besar dari Harga.");
          $("#inputHarga").css({
            "border": "1px solid red"
          });
          $("#inputDP").css({
            "border": "1px solid red"
          });
          evt.preventDefault();
          return;
        }

        // Check if no sales name list input
        var jmlh_sales = $(".data-sales").length;
        if (jmlh_sales === 0) {
          $("#danger_dp_besar").css({
            "display": "block"
          }).html("<i class='fas fa-exclamation-triangle'></i> Nama Sales Belum Diinput.");
          $("#inputSales").css({
            "border": "1px solid red"
          });
          evt.preventDefault();
          return;
        }
      })

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
          class: "d-inline-block bg-secondary py-1 px-3 mr-2 mb-2 rounded-pill data-sales",
          style: "cursor:pointer",
          html: "<i class='fas fa-times-circle'></i> " + tmp_sales
        }).click(function(evt) {
          var idx_hid_sales = evt.target.id.split("-")[1];
          $("#hid-sales-" + idx_hid_sales).remove();
          $(this).remove();
        });

        $("#buat_pemesanan").append(hidden_sales);
        $("#list_sales").append(span_sales);

        idx_sales += 1;
      });
    });
  </script>
</body>

</html>