<div class="pt-3 px-4">
    <h3 class="p-3">Thống kê đơn hàng theo : <span id="text-date"></span></h3>
    <p class="p-3">
        <select class="select-date">
            <option value="7ngay">7 ngày qua</option>
            <option value="28ngay">28 ngày qua</option>
            <option value="90ngay">90 ngày qua</option>
            <option value="365ngay">365 ngày qua</option>
        </select>
    </p>
    <div id="chart" style="height: 250px;"></div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            thongke();
            var char = new Morris.Area({

                element: 'chart',

                xkey: 'date',

                ykeys: ['date', 'order', 'sales', 'quantity'],

                labels: ['Ngày đặt', 'Đơn hàng', 'Doanh thu', 'Số lượng bán ra']
            });

            $('.select-date').change(function () {
                var thoigian = $(this).val();
                if (thoigian == '7ngay') {
                    var text = '7 ngày qua';
                } else if (thoigian == '28ngay') {
                    var text = '28 ngày qua';
                } else if (thoigian == '90ngay') {
                    var text = '90 ngày qua';
                } else {
                    var text = '365 ngày qua';
                }

                $.ajax({
                    url: "modules/thongke.php",
                    method: "POST",
                    dataType: "JSON",
                    data: { thoigian: thoigian },
                    success: function (data) {
                        char.setData(data);
                        $('#text-date').text(text);
                    }
                });
            })
            function thongke() {
                var text = '7 ngày qua';
                $('#text-date').text(text);
                $.ajax({
                    url: "modules/thongke.php",
                    method: "POST",
                    dataType: "JSON",
                    success: function (data) {
                        char.setData(data);
                        $('#text-date').text(text);
                    }
                });
            }
        });
    </script>
</div>