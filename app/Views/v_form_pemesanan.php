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
              <h1 class="m-0">Buat Pemesanan</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
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
                  <div class="form-group row">
                    <div class="col-4 p-0" style="position: relative;">
                      <h6>Form Cari Konsumen</h6>
                      <input type="text" class="form-control" id="cariKonsumen" placeholder="Cari dgn Nomor / Nama.." />
                      <div id="boxSearchResult" style="
                            display: none;
                            position: absolute;
                            left: 0;
                            right: 0;
                            background-color: white;
                            z-index: 4;
                            box-shadow: 0 0 4px gray;
                          ">
                        <ul id="listSearchResult" style="
                              list-style-type: none;
                              height: 180px;
                              overflow-y: scroll;
                            " class="m-0 p-0">
                          <!-- <li style="
                                border-bottom: 1px solid grey;
                                padding: 13px 10px;
                                cursor: pointer;
                              ">
                            <span><b>Vian</b> : 09723874823</span>
                            <p class="m-0">
                              Jalan Wahid Hasyim, Wahid Hasyim
                            </p>
                          </li> -->
                        </ul>
                      </div>
                    </div>
                    <!-- <div class="col-auto">
                      <button type="button" style="
                            background-color: #02a09e;
                            border-color: #02a09e;
                          " class="btn btn-primary">
                        Cari
                      </button>
                    </div> -->
                  </div>
                  <div class="row mb-3">
                    <div class="col-lg-4">
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
                    <div class="col-lg-4">
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
                  <form action="<?= base_url("buat-pemesanan/create") ?>" method="post">
                    <input type="hidden" id="idKonsumen" name="id_konsumen" />
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputSP">No. SP : </label>
                          </div>
                          <div class="col-6">
                            <input type="text" class="form-control" name="sp" id="inputSP" placeholder="Input No SP.." />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputFrame">Frame : </label>
                          </div>
                          <div class="col-6">
                            <input type="text" class="form-control" name="frame" id="inputFrame" placeholder="Input Frame.." />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputFrame">Jenis Lensa : </label>
                          </div>
                          <div class="col-6">
                            <select id="lensSelection" class="form-control" name="jenis_lensa" id="inputFrame">
                              <?php
                              foreach ($lensa as $lens) {
                              ?>
                                <option value="<?= $lens["jenis_lensa"] ?>"><?= $lens["jenis_lensa"] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <!-- <div class="col-4">
                            <select id="lensVariant" name="varian_lensa" class="form-control">
                            </select>
                          </div> -->
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputBahanFlattop">Bahan Flattop :
                            </label>
                          </div>
                          <div class="col-6">
                            <select id="inputBahanFlattop" name="flattop" class="form-control">
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
                          <div class="col-4">
                            <label for="inputCoating">Coating : </label>
                          </div>
                          <div class="col-6">
                            <select id="inputCoating" name="coating" class="form-control">
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
                          <div class="col-4">
                            <label for="inputWarna">Warna : </label>
                          </div>
                          <div class="col-6">
                            <select id="inputWarna" name="warna" class="form-control">
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
                          <div class="col-4">
                            <label for="inputHarga">Harga : </label>
                          </div>
                          <div class="col-6">
                            <input type="text" id="inputHarga" name="harga" class="form-control" placeholder="0" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputDP">DP : </label>
                          </div>
                          <div class="col-6">
                            <input type="text" id="inputDP" name="dp" class="form-control" placeholder="0" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputTanggal">Tanggal Pengiriman:
                            </label>
                          </div>
                          <div class="col-6">
                            <input type="date" id="inputTanggal" name="tgl_pengiriman" class="form-control" placeholder="0" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputTanggalJatuhTempo">Tanggal Jatuh Tempo:
                            </label>
                          </div>
                          <div class="col-6">
                            <input type="date" id="inputTanggalJatuhTempo" name="tgl_jatuh_tempo" class="form-control" placeholder="0" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-4">
                            <label for="inputSales">Sales: </label>
                          </div>
                          <div class="col-6">
                            <!-- <input type="text" id="inputSales" name="sales" class="form-control" placeholder="Input Nama Sales.." /> -->
                            <select name="sales" id="inputSales" class="form-control">
                              <?php
                              foreach ($sales as $sale) {
                              ?>
                                <option value="<?= $sale["username"] ?>"><?= $sale["username"] ?></option>
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
                              <td><input type="text" name="r_sph" class="form-control" placeholder="0.00" /></td>
                              <td><input type="text" name="r_cyl" class="form-control" placeholder="0.00" /></td>
                              <td><input type="text" name="r_axis" class="form-control" placeholder="0.00" /></td>
                              <td><input type="text" name="r_add" class="form-control" placeholder="0.00" /></td>
                              <td><input type="text" name="r_mpd" class="form-control" placeholder="0.00" /></td>
                              <td><input type="text" name="r_prism" class="form-control" placeholder="0.00" /></td>
                            </tr>
                            <tr>
                              <td>L</td>
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
                    <button type="submit" style="
                          background-color: #02a09e;
                          border-color: #02a09e;
                        " class="btn btn-primary">
                      Buat Pemesanan
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
                id: "result-" + i,
                class: "select-konsumen",
                style: "border-bottom: 1px solid grey;padding: 13px 10px;cursor: pointer;"
              });

              var span = jQuery("<span />")
                .append(jQuery("<b />").text(data.nama))
                .append(" : " + data.no_telepon);
              var p = jQuery("<p />", {
                  class: "m-0"
                })
                .append(data.alamat);

              $(list).append(span);
              $(list).append(p);
              $(list).click(function(evt) {
                var idxData = $(evt.target).attr("id");
                idxData = idxData.split("-")[1];
                $("#listSearchResult").empty();
                $("#boxSearchResult").css({
                  "display": "none"
                });
                updateInfoSelection(parseInt(idxData));
              });

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