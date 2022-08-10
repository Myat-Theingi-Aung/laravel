$(document).ready(function($){
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#addNewSinger').click(function () {
       $('#addEditSingerForm').trigger("reset");
       $('#ajaxSingerModel').html("Add Singer");
       $('#singer-model').modal('show');
    });

    $('body').on('click', '.btn-store', function (event) {
        event.preventDefault();
        var id = $("#id").val();
        var name = $("#singer_name").val();
        var age = $("#age").val();
        var type = $("#type").val();
        var gender = $("input[name='gender']:checked").val();
        $("#btn-save").html('Please Wait...');
        $("#btn-save").attr("disabled", true);

        // ajax
        $.ajax({
            type:'POST',
            url: `/api/store-singer`,
            data: {
                id:id,
                name:name,
                age:age,
                type: type,
                gender:gender,
            },
            dataType: 'json',
            success: function(){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });
    });

    $('body').on('click', '.btn-update', function (event) {
        event.preventDefault();
        var id = $("#id").val();
        var name = $("#singer_name").val();
        var age = $("#age").val();
        var type = $("#type").val();
        var gender = $("input[name='gender']:checked").val();
        $("#btn-save").html('Please Wait...');
        $("#btn-save").attr("disabled", true);

        // ajax
        $.ajax({
            type:'POST',
            url: `/api/update-singer`,
            data: {
                id:id,
                name:name,
                age:age,
                type: type,
                gender:gender,
            },
            dataType: 'json',
            success: function(){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $("#btn-save").removeClass("btn-store"); 
        $("#btn-save").addClass("btn-update");
        $("#btn-save").html("Update");
        // ajax
        $.ajax({ 
            url: `/api/edit-singer`,
            type:"POST",
            data: { id: id },
            dataType: 'json',
            success: function (res) {
                if (res.singer) {
                    console.table(res.singer);
                    var singer = res.singer;
                    $('#ajaxSingerModel').html("Edit Singer");
                    $('#singer-model').modal('show'); 
                    $('#id').val(singer.singer_id);
                    $('#singer_name').val(singer.singer_name);
                    $('#age').val(singer.age);
                    $('#type').val(singer.type);
                    $("input[name='gender']").val(singer.gender).prop('checked',true);
                }
           }
        });
    });

    $('body').on('click', '.delete', function () {
       if (confirm("Delete Record?") == true) {
           var singer_id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: `/api/delete-singer`,
            data: { singer_id: singer_id },
            dataType: 'json',
            success: function(){
              window.location.reload();
           }
        });
       }
    });

   
});