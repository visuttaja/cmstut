 <script>
       window.onload = function () {
           CKEDITOR.replace( 'ckeditor', {
               //removePlugins: 'htmlwriter' //poistaisi /r/n rivinvaihdot lähetyspäästä
           } );

       };

       CKEDITOR.on( 'instanceCreated', function ( event, data ) {

           // Output paragraphs as <p>Text</p>.
           var editor = event.editor;

           //editor.config.replace( 'wysiwyg', config );
           var ck1 = document.getElementById("wysiwyg");
           //var writer = ck1.dataProcessor.writer;
           editor.setData( textbody );
           element = editor.element;

           //editor.name = $(element).attr('name');

           var stop = 0;

       } );

   </script>
