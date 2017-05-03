<script>
    tinymce.init({
        init_instance_callback: "insert_contents",
        selector: '#tinymce'

    })
    function insert_contents(inst){
       //alert("berkeley");
        inst.setContent(textbody3);
    }



</script>

<script type="text/javascript">
//    selector: '#mytextarea'
    //tinyMCE.init({
//             entity_encoding : "raw",
//        mode : "specific_textareas",
//             selector: '#mytextarea',  // change this value according to your HTML
//        editor_selector : "#mytextarea"
//        encoding: "xml"
             /*menubar: false,
             width: "840",
             toolbar: 'undo redo | superscript subscript | link image',
             height: "225",
             resize: 'both',
             plugins: "wordcount paste",
             valid_styles: { '*': 'font-style' },
*/
           /*  encoding: "xml",
             setup: function (editor) {
    editor.on('SaveContent', function (e) {
        console.log('SaveContent event', e);
        e.content = e.content.replace(/&#39/g, "&apos");
                 });
}*/
    //     });
</script>
