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
            <div class="col-sm-6">
              <h1 class="m-0">Edit Pemesanan</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
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
                  <div class="form-group row">
                    <div class="col-4 p-0" style="position: relative;">
                      <h6>Form Cari Konsumen</h6>
                      <input type="text" class="form-control" id="cariKonsumen" placeholder="Cari dgn Nomor / Nama.." />
                      <div id="boxSearchResult" class="list-search-cst-container">
                        <ul id="listSearchResult" class="m-0 p-0 ul-search-cst">
                          <!-- <li class="list-content">
                            <a href="javascript:void(0)">
                              <span><b>Vian</b> : 09723874823</span>
                              <p class="m-0">
                                Jalan Wahid Hasyim, Wahid Hasyim
                              </p>
                            </a>
                          </li> -->
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-lg-4">
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
                    <div class="col-lg-4">
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
                  <form action="<?= base_url("pemesanan/update") ?>" method="post">
                    <input type="hidden" id="idKonsumen" name="id_konsumen" value="<?= $pesanan["id_konsumen"] ?>" />
                    <input type="hidden" name="id_pemesanan" value="<?= $pesanan["id_pemesanan"] ?>" />
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputSP">No. SP : </label>
                          </div>
                          <div class="col-6">
                            <input type="text" class="form-control" name="sp" id="inputSP" value="<?= $pesanan["no_sp"] ?>" placeholder="Input No SP.." required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputFrame">Frame : </label>
                          </div>
                          <div class="col-6">
                            <input type="text" class="form-control" name="frame" id="inputFrame" value="<?= $pesanan["frame"] ?>" placeholder="Input Frame.." required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputFrame">Jenis Lensa : </label>
                          </div>
                          <div class="col-6">
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
                          <div class="col-4">
                            <label for="inputBahanFlattop">Bahan Flattop :
                            </label>
                          </div>
                          <div class="col-6">
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
                          <div class="col-4">
                            <label for="inputCoating">Coating : </label>
                          </div>
                          <div class="col-6">
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
                          <div class="col-4">
                            <label for="inputWarna">Warna : </label>
                          </div>
                          <div class="col-6">
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
                          <div class="col-4">
                            <label for="inputHarga">Harga : </label>
                          </div>
                          <div class="col-6">
                            <input type="text" id="inputHarga" name="harga" class="form-control" value="<?= $pesanan["harga"] ?>" placeholder="0" required disabled />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputTanggal">Tanggal Pemesanan:
                            </label>
                          </div>
                          <div class="col-6">
                            <input type="date" id="inputTanggalPemesanan" name="tgl_pemesanan" class="form-control" value="<?= $pesanan["tgl_pemesanan"] ?>" required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputTanggal">Tanggal Pengiriman:
                            </label>
                          </div>
                          <div class="col-6">
                            <input type="date" id="inputTanggal" name="tgl_pengiriman" class="form-control" value="<?= $pesanan["tgl_pengiriman"] ?>" required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputTanggalJatuhTempo">Tanggal Jatuh Tempo:
                            </label>
                          </div>
                          <div class="col-6">
                            <input type="date" id="inputTanggalJatuhTempo" name="tgl_jatuh_tempo" class="form-control" value="<?= $pesanan["tgl_jatuh_tempo"] ?>" required />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputSales">Sales: </label>
                          </div>
                          <div class="col-6">
                            <!-- <input type="text" id="inputSales" name="sales" class="form-control" placeholder="Input Nama Sales.." /> -->
                            <select name="sales" id="inputSales" class="form-control" required>
                              <?php
                              foreach ($sales as $sale) {
                                $selected = "";
                                if ($sale["username"] === $pesanan["sales"]) $selected = "selected";
                              ?>
                                <option value="<?= $sale["username"] ?>" <?= $selected ?>><?= $sale["username"] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="offset-lg-1 col-lg-5">
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
                              <td>R</td>
                              <td><input type="text" name="r_sph" value="<?= $pesanan["R_sph"] ?>" class="form-control" placeholder="0.00" /></td>
                              <td><input type="text" name="r_cyl" value="<?= $pesanan["R_cyt"] ?>" class="form-control" placeholder="0.00" /></td>
                              <td><input type="text" name="r_axis" value="<?= $pesanan["R_axis"] ?>" class="form-control" placeholder="0.00" /></td>
                              <td><input type="text" name="r_add" value="<?= $pesanan["R_add"] ?>" class="form-control" placeholder="0.00" /></td>
                              <td><input type="text" name="r_mpd" value="<?= $pesanan["R_mpd"] ?>" class="form-control" placeholder="0.00" /></td>
                              <td><input type="text" name="r_prism" value="<?= $pesanan["R_prism"] ?>" class="form-control" placeholder="0.00" /></td>
                            </tr>
                            <tr>
                              <td>L</td>
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
                    <button type="submit" style="
                          background-color: #02a09e;
                          border-color: #02a09e;
                        " class="btn btn-primary">
                      Ubah Data Pemesanan
                    </button>
                    <!-- <button type="reset" class="btn btn-secondary">
                      Ulangi
                    </button> -->
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

      // First initiate
      $("#cariKonsumen").val("");

      // $.ajax({
      //   url: "/masters/lensa/kategori/" + encodeURIComponent($("#lensSelection :selected").attr("value")),
      //   method: "GET",
      //   success: function(response) {
      //     result = JSON.parse(response);
      //     console.log(result);

      //     var optionsLensVariant = [];
      //     var i = 0;
      //     result.forEach(el => {
      //       var opt = jQuery("<option />", {
      //         value: el.nama_varian,
      //         text: el.nama_varian
      //       });

      //       optionsLensVariant[i] = opt;
      //       i++;
      //     });

      //     $("#lensVariant").append(optionsLensVariant);
      //   }
      // });

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

      // $("#lensSelection").change(function(evt) {

      //   var nama_kategori = $("#lensSelection :selected").attr("value");
      //   $.ajax({
      //     url: "/masters/lensa/kategori/" + encodeURIComponent(nama_kategori),
      //     method: "GET",
      //     success: function(response) {
      //       result = JSON.parse(response);
      //       console.log(result);

      //       var optionsLensVariant = [];
      //       var i = 0;
      //       result.forEach(el => {
      //         var opt = jQuery("<option />", {
      //           value: el.nama_varian,
      //           text: el.nama_varian
      //         });

      //         optionsLensVariant[i] = opt;
      //         i++;
      //       });

      //       $("#lensVariant").empty();
      //       $("#lensVariant").append(optionsLensVariant);
      //     }
      //   });
      // });

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

              // $(list).append(span);
              // $(list).append(p);
              // $(list).click(function(evt) {
              //   var idxData = $(evt.target).attr("id");
              //   idxData = idxData.split("-")[1];
              //   $("#listSearchResult").empty();
              //   $("#boxSearchResult").css({
              //     "display": "none"
              //   });
              //   updateInfoSelection(parseInt(idxData));
              // });

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
    });
  </script>
</body>

</html>