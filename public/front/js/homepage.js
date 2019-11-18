$.widget("app.homepage", {
    options: {
        cartAddUrl: '',
        cartUpdateUrl: '',
        cartCheckoutUrl: '',
    },
    _create: function () {
        var opt = this.options;
        var self = this;
        console.log("INIT PROJECT");
        if (!opt.fetchUrl == '') {
            this._fetch(opt.fetchUrl, '#order-listing')
            console.log('fetch');
        }
        this._formValidate()

        $('.btn-minus').click(function () {
            if ($('#soluong').val() > 1) {
                var num = $('#soluong').val();
                num--;
                $('#soluong').val(num);
            }
        })

        $('#soluong').blur(function () {
            if ($(this).val() < 1) {
                $(this).val(1);
            }
        });

        $('.btn-add').click(function () {
            var num = $('#soluong').val();
            num++;
            $('#soluong').val(num);
        })

        $('#addCart').on('click', function (event) {
            var idproduct = $('#idProduct').val();
            const data = {
                id: idproduct,
                soluong: $('#soluong').val(),
            }
            self._formPost(data, opt.cartAddUrl)
        })

        $('#updateCart').on('click', function() {
            location.reload()
        })

        $('.quantity').on('blur', function (){
            const data = {
                number: $(this).val(),
                rowId: $(this).parent().find('.row-id').val(),
            }
            self._updateCart(data, opt.cartUpdateUrl)
        })

        $('#checkoutButton').on('click', function() {
            const data = {
                sdt_kh: $('#sdt').val(),
                ho_tenkh: $('#hoten').val(),
                diachi_ship: $('#address').val(),
                chuthich: $('#chuthich').val(),
            }

            self._checkout(data, opt.cartCheckoutUrl)
        })
    },
    _formValidate: function () {
        if ($('#ctForm').length > 0) {
            $('#ctForm').validate({
                rules: {
                    soluong: {
                        required: true,
                        number: true,
                        min: 0,
                    },
                },
                messages: {
                    soluong: {
                        required: "Thiếu số lượng nguyên liệu",
                        number: "Số lượng nguyên liệu phải là số",
                        min: "Số lượng phải lớn hơn 0"
                    },
                },
            })
        }
    },
    _formPost: function (data, url) {
        var dataString = "id=" + data.id + "&soluong=" + data.soluong;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: url,
            data: dataString,
            success: function (data) {
                console.log(data);
                rogAlert("success", data.success);
            },
            error: function (request, status) {
                $.each(request.responseJSON.errors, function (key, val) {
                    console.log(val);
                    rogAlert("danger", val);
                });
            }
        });
    },
    _updateCart: function (data, url) {
        var dataString = "number=" + data.number + "&rowId=" + data.rowId;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: url,
            data: dataString,
            success: function (data) {
                console.log(data);
                rogAlert("success", data.success);
            },
            error: function (request, status) {
                $.each(request.responseJSON.errors, function (key, val) {
                    console.log(val);
                    rogAlert("danger", val);
                });
            }
        });
    },

    _checkout: function (data, url) {
        var dataString = "sdt_kh=" + data.sdt_kh + "&ho_tenkh=" + data.ho_tenkh + "&diachi_ship=" + data.diachi_ship + "&chuthich=" + data.chuthich 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: url,
            data: dataString,
            success: function (data) {
                console.log(data);
                rogAlert("success", data.success);
                window.location = data.data
            },
            error: function (request, status) {
                $.each(request.responseJSON.errors, function (key, val) {
                    console.log(val);
                    rogAlert("danger", val);
                });
            }
        });
    }
});