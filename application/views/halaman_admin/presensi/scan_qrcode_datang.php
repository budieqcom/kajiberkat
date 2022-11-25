
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-12 mb-4">
                    <div class="col-lg">
                        <video id="preview" class="p-1 border" style="width:100%;"></video>
                    </div>
                    <script type="text/javascript">
                    $(document).ready(function() {

                        var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
                        scanner.addListener('scan',function(content)
                        {
                            var qr_code = content;
                            $.ajax({
                                url: "<?= base_url() ?>index.php/presensi/data_pegawai_id",
                                data: "kode="+ qr_code,
                                success: function(data) {
                                    var jsondata = data;
                                    dataObj = JSON.parse(jsondata);
                                    nama_lengkap = dataObj.gelar_depan + " " + dataObj.nama_lengkap + " " + dataObj.gelar_belakang;
                                    simpanData(dataObj.id, dataObj.nip, nama_lengkap, qr_code);
                                }
                            });
                        });

                        function simpanData(id, nip, nama, qrcode)
                        {
                            var id_pegawai = id;
                            var nip_pegawai = nip;
                            var nama_pegawai = nama;
                            var qrcode_pegawai = qrcode;

                            date = new Date();
                            jam = date.getHours();
                            menit = date.getMinutes();
                            tanggal = date.getDate();
                            bulan = date.getMonth();
                            tahun = date.getFullYear();
                            tanggal_datang = tahun + '-' + bulan + '-' + tanggal;
                            jam_datang = jam + ':' + menit;

                            $.ajax({
                                method: "POST",
                                data: {id_pegawai:id_pegawai, qrcode:qrcode_pegawai, tanggal_datang:tanggal_datang, jam_datang:jam_datang},
                                url: "<?= base_url() ?>index.php/presensi/tambah_presensi_masuk",
                                success: function(hasil) {
                                    alert(hasil);
                                }
                            });
                        }

                        Instascan.Camera.getCameras().then(function (cameras)
                        {
                            if(cameras.length>0)
                            {
                                scanner.start(cameras[0]);
                                $('[name="options"]').on('change',function()
                                {
                                    if($(this).val()==1)
                                    {
                                        if(cameras[0]!="")
                                        {
                                            scanner.start(cameras[0]);
                                        }
                                        else
                                        {
                                            alert('No Front camera found!');
                                        }
                                    }
                                    else if($(this).val()==2)
                                    {
                                        if(cameras[1]!="")
                                        {
                                            scanner.start(cameras[1]);
                                        }
                                        else
                                        {
                                            alert('No Back camera found!');
                                        }
                                    }
                                });
                            }
                            else
                            {
                                console.error('No cameras found.');
                                alert('No cameras found.');
                            }
                        }).catch(function(e)
                        {
                            console.error(e);
                            alert(e);
                        });
                    });
                    </script>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->