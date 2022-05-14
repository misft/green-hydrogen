var summernote_custom = {
    init: function() {
        $('.summernote').summernote({
            height: 300,
            tabsize: 2,
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
            lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
        });
        $('.inline-editor').summernote({
            airMode: true
        });
        $(".hint2basic").summernote({
            height: 100,
            toolbar: false,
            placeholder: 'type with apple, orange, watermelon, lemon',
            hint: {
                words: ['apple', 'orange', 'watermelon', 'lemon'],
                match: /\b(\w{1,})$/,
                search: function (keyword, callback) {
                    callback($.grep(this.words, function (item) {
                        return item.indexOf(keyword) === 0;
                    }));
                }
            }
        });
    }
};
(function($) {
    "use strict";
    summernote_custom.init();
})(jQuery);

var edit = function() {
    $('.click2edit').summernote({focus: true});
};

var save = function() {
    var markup = $('.click2edit').summernote('code');
    $('.click2edit').summernote('destroy');
};
