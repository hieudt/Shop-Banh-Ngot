$.widget("app.congthuc", {
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
            { data: 'id_sanpham', name: 'id_sanpham' },
            { data: 'id_nguyenlieu', name: 'id_nguyenlieu' },
            { data: 'soluong', name: 'soluong' },
            { data: 'action', name: 'action' },

        ]
        db(fetchUrl, idElement, data);
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