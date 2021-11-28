<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLORENSIA HOTEL</title>
    <style>
        h2{
            text-align: center;
            color: #45a049;
        }
        input[type=text], input[type=number], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type=button], button[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        div.wrapper {
            width: 50%;
            left: 50%;
            margin-left: -25%;
            position: absolute;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        </style>
    <style>
        * {
            box-sizing: border-box;
        }

        .column {
            float: left;
            width: 50%;
            padding: 10px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        div.action{
            display: flex;
        }
        div.action button{
            margin: 2px;
        }

        .data{
            width: 180px;
        }
    </style>
</head>
<body>
    <h2>FORM BOOKING FLORENSIA HOTEL</h2>
    <div class="wrapper">
        <form id="formbook">
            <div class="row">
                <div class="column">
                    <label>Nama</label>
                    <input type="text" id="nama" name="nama" required>
                    <label>Kode Booking</label>
                    <select id="kodeBook" name="kodebook" required>
                        <option value="" selected="true">Pilih Kode Booking</option>
                        <option value="AL02102">AL02102</option>
                        <option value="BG03025">BG03025</option>
                        <option value="CR02111">CR02111</option>
                        <option value="KM03075">KM03075</option>
                    </select>
                    <label>Jumlah Orang</label>
                    <input type="number" id="jml" name="jml" required>
                    <div class="action">
                        <button type="button" onClick="process()">Process</button>
                        <button type="submit" onClick="clear()">Hapus</button>
                    </div>
                </div>
                <div class="column">
                    <label>Lama Hari</label>
                    <input type="number" id="lama" name="lama" required>
                    <label>Jenis Pembayaran</label>
                    <select id="payment" name="payment" required>
                        <option value="" selected="true">Pilih Jenis Pembayaran</option>
                        <option value="Kredit">Kartu Kredit</option>
                        <option value="Debit">Debit</option>
                        <option value="Cash">Cash</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="table">
            <h2>FLORENSIA HOTEL</h2>
            <table>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td class="data"><span id="res_nama"></span></td>
                            </tr>
                            <tr>
                                <td>Nama Kamar</td>
                                <td>:</td>
                                <td class="data"><span id="res_kamar"></span></td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td class="data"><span id="res_nomor"></span></td>
                            </tr>
                            <tr>
                                <td>Lama</td>
                                <td>:</td>
                                <td class="data"><span id="res_lama"></span></td>
                            </tr>
                            <tr>
                                <td>Potongan / Tambahan</td>
                                <td>:</td>
                                <td class="data"><span id="res_potonganTambahan"></span></td>
                            </tr>
                            <tr>
                                <td>Total Biaya seluruhnya</td>
                                <td>:</td>
                                <td class="data"><span id="res_total"></span></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>Kode Booking</td>
                                <td>:</td>
                                <td class="data"><span id="res_kodeBook"></span></td>
                            </tr>
                            <tr>
                                <td>Lantai</td>
                                <td>:</td>
                                <td class="data"><span id="res_lantai"></span></td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td class="data"><span id="res_jml"></span></td>
                            </tr>
                            <tr>
                                <td>Jenis Pembayaran</td>
                                <td>:</td>
                                <td class="data"><span id="res_payment"></span></td>
                            </tr>
                            <tr>
                                <td>Biaya Spring Bad Tambahan</td>
                                <td>:</td>
                                <td class="data"><span id="res_other"></span></td>
                            </tr>
                    </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <script>
        function clear(){
            document.getElementById("formbook").reset();
        }
        function process(){
            var nama = $("#nama").val();
            var lama = $("#lama").val();
            var kodeBook = $("#kodeBook").val();
            var resKodeBook = kodeBook.substring(0, 2)
            var kamar;
            var hargaKamar;
            var nomorKamar = kodeBook.substring(4, 7);
            var lantai = kodeBook.substring(2, 4);
            var jml = $("#jml").val();
            var payment = $("#payment").val();
            var total;
            var totalSeluruhnya;
            if(resKodeBook == "AL"){
                kamar = "Alamanda";
                hargaKamar = 450000;
            }else if(resKodeBook == "BG"){
                kamar = "Bougenvile";
                hargaKamar = 350000;
            }else if(resKodeBook == "CR"){
                kamar = "Crysan";
                hargaKamar = 375000;
            }else if(resKodeBook == "KM"){
                kamar = "Kemuning";
                hargaKamar = 425000;
            }

            if(jml > 2){
                var other = (jml-2) * 75000;
            }else{
                var other = 0;
            }

            total = (hargaKamar * lama) + other

            if(payment == "Kredit"){
                var potonganTambahan = total * 2 / 100;
                totalSeluruhnya = total + potonganTambahan;
            }else if(payment == "Debit"){
                var potonganTambahan = total * 1.5 / 100;
                totalSeluruhnya = total - potonganTambahan;
            }else{
                var potonganTambahan = 0;
                totalSeluruhnya = total;
            }

            $("#res_nama").text(nama);
            $("#res_kamar").text(kamar);
            $("#res_nomor").text(nomorKamar);
            $("#res_lama").text(lama);
            $("#res_potonganTambahan").text(potonganTambahan);
            $("#res_total").text("Rp. " + totalSeluruhnya);
            $("#res_kodeBook").text(kodeBook);
            $("#res_lantai").text(lantai);
            $("#res_jml").text(jml + " Orang");
            $("#res_payment").text(payment);
            $("#res_other").text(other);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>
</html>