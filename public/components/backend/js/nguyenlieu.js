$.widget("app.nguyenlieu", {
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

        $('#nlForm').on('submit', function (event) {
            if ($(this).valid()) {
                self._formPost(this, event, opt.postUrl)
            }
        })
    },
    _fetch: function (fetchUrl, idElement) {
        const data = [
            { data: 'ten', name: 'ten' },
            { data: 'image', name: 'image' },
            { data: 'donvi', name: 'donvi' },
            { data: 'soluong', name: 'soluong' },
            { data: 'dongia', name: 'dongia' },
        ]
        db(fetchUrl, idElement, data);
    },
    _formValidate: function () {
        if ($('#nlForm').length > 0) {
            $('#nlForm').validate({
                rules: {
                    ten: {
                        required: true,
                        maxlength: 100
                    },
                    donvi: {
                        required: true,
                    },
                    soluong: {
                        required: true,
                        number: true,
                        min: 0,
                    },
                    dongia: {
                        required: true,
                        number: true,
                        min: 0,
                    },
                    image: {
                        required: true,
                        accept: "image/*"
                    }
                },
                messages: {
                    ten: {
                        required: "Thiếu tên nguyên liệu",
                        maxlength: "Tên nguyên liệu không được quá dài 100 ký tự"
                    },
                    donvi: {
                        required: "Thiếu đơn vị nguyên liệu",
                    },
                    soluong: {
                        required: "Thiếu số lượng nguyên liệu",
                        number: "Số lượng nguyên liệu phải là số",
                        min: "Số lượng phải lớn hơn 0"
                    },
                    dongia: {
                        required: "Thiếu đơn giá",
                        number: "Đơn giá phải là số",
                        min: "Đơn giá phải lớn hơn 0",
                    },
                    image: {
                        required: "Thiếu hình ảnh nguyên liệu",
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