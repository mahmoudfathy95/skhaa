 
<textarea name="{name}" id="{editor_id}">{html}</textarea>


<script>
    $(function(){
      $('#{editor_id}').froalaEditor({
        imageUploadURL: '{upload_url}',
        toolbarSticky: false,
        imageManagerLoadURL:'./ajax/browse',

        imageUploadParams: {
          id: 'my_editor'
        }
      })
        .on('froalaEditor.image.removed', function (e, editor, $img) {
            $.ajax({
              // Request method.
              method: "POST",

              // Request URL.
              url: "{remove_url}",

              // Request params.
              data: {
                src: $img.attr('src')
              }
            })
            .done (function (data) {
              console.log ('image was deleted');
            })
            .fail (function () {
              console.log ('image delete problem');
            })
      });
      
        $('#{editor_id}').on('froalaEditor.contentChanged', function (e, editor, clickEvent) {
            // Do something here.
            $(window).trigger('resize');
            //$(window).scrollTop( $(window).height()+10);
        });
      
      
    });
  </script>
  

