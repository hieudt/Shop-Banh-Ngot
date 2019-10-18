$.widget("app.sanpham", {
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

        $('#spForm').on('submit', function (event) {
            if ($(this).valid()) {
                self._formPost(this, event, opt.postUrl)
            }
        })
    },
    _fetch: function (fetchUrl, idElement) {
        const data = [
            { data: 'ten', name: 'ten' },
            { data: 'image', name: 'image' },
            { data: 'giaban', name: 'giaban' },
            { data: 'action', name: 'action' },

        ]
        db(fetchUrl, idElement, data);
    },
    _formValidate: function () {
        if ($('#spForm').length > 0) {
            $('#spForm').validate({
                rules: {
                    ten: {
                        required: true,
                    },
                    giaban: {
                        required: true,
                        number: true,
                        min: 0,
                    },
                    description: {
                        required: true,
                    },
                    image: {
                        required: true,
                        accept: "image/*"
                    }
                },
                messages: {
                    ten: {
                        required: "Thiếu tên sản phẩm"
                    },
                    giaban: {
                        required: "Giá sản phẩm không được để trống",
                        number: "Giá sản phẩm phải là số",
                        min: "Giá sản phẩm từ 0 trở lên",
                    },
                    description: {
                        required: "Mô tả không được để trống",
                    },
                    image: {
                        required: "Thiếu hình ảnh minh họa",
                        accept: "Định dạng hình ảnh không hợp lệ",
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