$.widget("app.daily", {
    options: {
        fetchUrl: '',
        postUrl: '',
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

        $('#ctForm').on('submit', function (event) {
            if ($(this).valid()) {
                self._formPost(this, event, opt.postUrl)
            }
        })
    },
    _fetch: function (fetchUrl, idElement) {
        const data = [
            { data: 'id', name: 'id' },
            { data: 'ten_dai_ly', name: 'ten_dai_ly' },
            { data: 'so_dien_thoai', name: 'so_dien_thoai' },
            { data: 'dia_chi', name: 'dia_chi' },

        ]
        db(fetchUrl, idElement, data);
    },
    _formValidate: function () {
        if ($('#ctForm').length > 0) {
            $('#ctForm').validate({
                rules: {
                    ten_dai_ly: {
                        required: true,
                    },
                    so_dien_thoai: {
                        required: true,
                        number: true,
                    },
                    dia_chi: {
                        required: true,
                    }
                },
                messages: {
                    ten_dai_ly: {
                        required: "Vui lòng nhập tên đại lý",
                    },
                    so_dien_thoai: {
                        required: "Vui lòng nhập số điện thoại của đại lý",
                        number: "Số điện thoại phải là số"
                    },
                    dia_chi: {
                        required: "Vui lòng nhập địa chỉ đại lý",
                    }
                },
            })
        }
    },
    _formPost: function (form, event, posturl) {
        event.preventDefault();
        $.ajax({
            url: posturl,
            method: "POST",
            data: new FormData(form),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data)
                $('.alert').show();
            },
        })
    }
});