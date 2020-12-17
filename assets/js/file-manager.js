$().ready(function() {
    var elf = $('#elfinder').elfinder({
        // set your elFinder options here
        lang: 'it', // locale
        url: '/elfinder....connector.php', // connector URL
        soundPath: '/elfinder/sounds',
        dialog: {
            width: 900,
            modal: true,
            title: 'Select a file'
        },
        resizable: false,
        commandsOptions: {
            getfile: {
                oncomplete: 'destroy'
            }
        },
        getFileCallback: function(file, elf) {
            // the magic is here, use function from "main.html" for update input value
            window.parent.opener.processSelectedFile(file.path, '{{ $input_id  }}');
            window.close();
        },
        // toolbar configuration
        uiOptions: {
            // toolbar configuration
            toolbar: [
                ['home', 'back', 'forward', 'up', 'reload'],
                ['mkdir', 'mkfile', 'upload'],
                ['open', 'download', 'getfile'],
                ['undo', 'redo'],
                ['copy', 'cut', 'paste', 'rm', 'empty'],
                ['duplicate', 'rename', 'edit', 'resize', 'chmod'],
                ['selectall', 'selectnone', 'selectinvert'],
                ['quicklook', 'info'],
                ['extract', 'archive'],
                // ['search'],
                ['view', 'sort'],
                ['help'], //'preference',
                ['fullscreen']
            ],
            // toolbar extra options
            toolbarExtra: {
                // also displays the text label on the button (true / false)
                displayTextLabel: false,
                // Exclude `displayTextLabel` setting UA type
                labelExcludeUA: ['Mobile'],
                // auto hide on initial open
                autoHideUA: ['Mobile'],
                // Initial setting value of hide button in toolbar setting
                defaultHides: [],
                // show Preference button ('none', 'auto', 'always')
                // If you do not include 'preference' in the context menu you should specify 'auto' or 'always'
                showPreferenceButton: 'none'
            },
        },
        height: '100%',
    }).elfinder('instance');
});