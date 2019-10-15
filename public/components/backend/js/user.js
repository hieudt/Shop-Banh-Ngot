$.widget("app.user", {
    options: {
        fetchUrl: ''
    },
    _create: function () {
        var opt = this.options;
        console.log("INIT PROJECT");
        this._fetch(opt.fetchUrl, '#order-listing')
    },
    _fetch: function (fetchUrl, idElement) {
        const data = [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
        ]
        db(fetchUrl, idElement, data);
    }
});