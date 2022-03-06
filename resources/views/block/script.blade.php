<script>
    var descFt = document.getElementById("cmsBlockFtDescription");
    var editorFt = CKEDITOR.replace(descFt,{
     language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;

    function addBlock(page){
    	$('#addBlockModal').modal('show')
    	$('#page_cms').val(page)
    }

    function createBlock(type){
    	$.ajax({
            method: "POST",
            url: "{{route('createCmsBlock')}}",
            data: {
            	"_token" : "{{csrf_token()}}",
            	"block_type" : type,
            	"page" : $('#page_cms').val()
            }
        }).done(function( msg ) {
            window.location.reload();
        });
    }

    // MC
    function editCmsBlock(id){
        $.get("{{url('cms/block')}}/"+id, function(data, status){
            if(data){
                if(data.block_type == 'MC' || data.block_type == 'MMC'){
                    $('#deleteBlockMc').attr('href', "{{url('cms/block/delete/')}}/"+ data.id)
                    $('.previewImageBlockMc').empty()
                    $('.previewCmsBlockMcBg').empty()
                    $('#cmsBlockMcModal').modal('show')
                    $('#cmsBlockMcId').val(id)
                    $('#cmsBlockMcTitle').val(data.title)
                    $('#cmsBlockMcDescription').val(data.description)
                    $('#cmsBlockMcOrder').val(data.order)

                    if(data.path){
                        $('.previewImageBlockMc').append('<img src="{{url('get-block-image')}}/'+ data.path +'" style="margin-top: 2rem;" width="50%"/>')
                        $('#cmsBlockMcPath').val(data.path)
                    }

                    if(data.background_path){
                        $('.previewCmsBlockMcBg').append('<img src="{{url('get-block-image')}}/'+ data.background_path +'" style="margin-top: 2rem;" width="50%"/>')
                        $('#cmsBlockMcPathBg').val(data.background_path)
                    }
                }

                if(data.block_type == 'LFC'){
                    $('#cmsBlockFtModal').modal('show')

                    CKEDITOR.instances['cmsBlockFtDescription'].setData(data.description)

                    $('#deleteBlockFt').attr('href', "{{url('cms/block/delete/')}}/"+ data.id)
                    $('.previewImageBlockFt').empty()
                    $('#cmsBlockFtModal').modal('show')
                    $('#cmsBlockFtId').val(id)
                    $('#cmsBlockFtTitle').val(data.title)
                    $('#cmsBlockFtTitle2').val(data.title2)
                    // $('#cmsBlockFtDescription').val(data.description)
                    $('#cmsBlockFtOrder').val(data.order)

                    if(data.path){
                        $('.previewImageBlockFt').append('<img src="{{url('get-block-image')}}/'+ data.path +'" style="margin-top: 2rem;" width="50%"/>')
                        $('#cmsBlockFtPath').val(data.path)
                    }
                }
            }
        });
    }

    function updateCmsBlockMc(){
        $.ajax({
            method: "POST",
            url: "{{route('updateCmsBlock')}}",
            data: {
                "id" : $('#cmsBlockMcId').val(),
                "title" : $('#cmsBlockMcTitle').val(),
                "description" : $('#cmsBlockMcDescription').val(),
                "path" : $('#cmsBlockMcPath').val(),
                "background_path" : $('#cmsBlockMcPathBg').val(),
                "order": $('#cmsBlockMcOrder').val()
            }
        }).done(function( msg ) {
            window.location.reload();
        });
    }

    function updateCmsBlockFt(){
        $.ajax({
            method: "POST",
            url: "{{route('updateCmsBlock')}}",
            data: {
                "id" : $('#cmsBlockFtId').val(),
                "title" : $('#cmsBlockFtTitle').val(),
                "title2" : $('#cmsBlockFtTitle2').val(),
                "description" : CKEDITOR.instances['cmsBlockFtDescription'].getData(),
                "path" : $('#cmsBlockFtPath').val(),
                "order": $('#cmsBlockFtOrder').val()
            }
        }).done(function( msg ) {
            window.location.reload();
        });
    }

    function updateCmsBlockCc(addIndex = 0){
        var title2 = ""
        var description = ""

        for(let i = 0; i < $('#cmsBlockCcIndexValue').val(); i++){
            title2 += '||'+$('#cmsBlockCcTitle2_'+i).val()
            description += '||'+$('#cmsBlockCcDescription_'+i).val()
        }


        $.ajax({
            method: "POST",
            url: "{{route('updateCmsBlock')}}",
            data: {
                "id" : $('#cmsBlockCcId').val(),
                "title" : $('#cmsBlockCcTitle').val(),
                "title2" : title2.substring(2),
                "description" : description.substring(2),
                "path" : "",
                "background_path" : $('#cmsBlockCcPathBg').val(),
                "indexValue" : parseInt($('#cmsBlockCcIndexValue').val()) + addIndex,
                "order": $('#cmsBlockCcOrder').val()
            }
        }).done(function( msg ) {
            window.location.reload();
        });
    }

    function updateCmsBlockLc(addIndex = 0){
        var title2 = ""
        var description = ""
        var path = ""
        for(let i = 0; i < $('#cmsBlockLcIndexValue').val(); i++){
            title2 += '||'+$('#cmsBlockLcTitle2_'+i).val()
            description += '||'+$('#cmsBlockLcDescription_'+i).val()
            path += '||'+$('#cmsBlockLcPath_'+i).val()
        }

        $.ajax({
            method: "POST",
            url: "{{route('updateCmsBlock')}}",
            data: {
                "id" : $('#cmsBlockLcId').val(),
                "title" : $('#cmsBlockLcTitle').val(),
                "title2" : title2.substring(2),
                "description" : description.substring(2),
                "path" : path.substring(2),
                "background_path" : $('#cmsBlockLcPathBg').val(),
                "indexValue" : parseInt($('#cmsBlockLcIndexValue').val()) + addIndex,
                "order": $('#cmsBlockLcOrder').val()
            }
        }).done(function( msg ) {
            window.location.reload();
        });
    }

    function addValueCms(id){
        $.ajax({
            method: "POST",
            url: "{{route('addValueCmsBlock')}}",
            data: {
                "id" : id,
            }
        }).done(function( msg ) {
            window.location.reload();
        });
    }

    function uploadFile(filename, preview, input){
        var formData = new FormData();
        formData.append('file', filename.files[0])
        formData.append('filename', 'asd')
        $.ajax({
            method: "POST",
            url: "{{url('cms/block/upload-file')}}",
            data : formData,
            cache : false,
            processData: false,
            contentType: false
        }).done(function( result ) {
            $('.'+preview).empty();
            $('.'+preview).append('<img src="{{url('get-block-image')}}/'+ result +'" style="margin-top: 2rem;" width="50%"/>')
            $('#'+input).val(result)
        });
    }
</script>