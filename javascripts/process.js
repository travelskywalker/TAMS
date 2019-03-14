var newItems = [];

$(document).ready(function(){
    $('.add-hardware').click(function(){

        // check if all input in form is not empty
        // console.log("is form valid", isFormValid($('#frmAddasset')));
        if(isFormValid($('#frmAddasset'))){
            // serialize form
            var formData = $('#frmAddasset').serialize();
            var objectFormData = $('#frmAddasset').serializeArray().reduce(function(a, x) { a[x.name] = x.value; return a; }, {});

            // process temporary upload of image
            tempUpload($('#frmAddasset'),'process/assetadd.php?action=tempImgUpload').done(function(file){
                formData = formData+"&image="+file;
                setNewItem(objectFormData);
                newItems.push(formData);
                clearForm($('#frmAddasset'));
                $('#add_item_modal').modal('hide')
                toggleAddItemSubmitBtn();
            });
        }

    });

    $('#btnAddasset').click(function(){
        addItems();
    });

    $('.modal-link').click(function(){
        $('#error_alert_link').modal('hide');
    });

    $(document).on('click', '.ctrl-delete', function(){
        $(this).closest('tr').remove();
        
        // remove item in items array
        newItems.splice($(this).attr('index'), 1);
        toggleAddItemSubmitBtn();
        
    });

    // close modal
    $('.modal').click(function(e){

        // modal background click
        if($(e.target).hasClass('modal show')) clearForm($('.modal.show').find('form'));

        // close button
        if($(e.target).attr('data-dismiss') == 'modal') {
            clearForm($('#frmAddasset'));
            $('.error').removeClass('error');
        }
    });

    // keyup event
    $('#invnum').keyup(function(){
        toggleAddItemSubmitBtn();
    });

    // hover event
    $(document).on('mouseover', '.ctrl-tbl', function() {
        $(this).find('.ctrl-delete').show();
    });
    $(document).on('mouseout', '.ctrl-tbl', function() {
        $(this).find('.ctrl-delete').hide();
    });

});

function toggleAddItemSubmitBtn(){
    if($('#invnum').val().length > 0 && $('#rpt tr').length > 1) $('#btnAddasset').attr('disabled', false);
    else $('#btnAddasset').attr('disabled', true);
}

function clearForm(form){
    $('#'+form.attr('id')+' input, #'+form.attr('id')+' select').each(function(k){
        $(this).val('').removeClass('error');
    });
}

function isFormValid(form){
    let val = true;

    // input
    // $('#'+form.attr('id')+' input, #'+form.attr('id')+' select').each(function(k){
    //     if($(this).attr('required') != undefined){
    //         if($(this).val().length == 0){
    //             $(this).addClass('error');
    //             val = false;
    //         }else{
    //             $(this).removeClass('error');
    //         }
    //     }
    // });

    return val;
}

function setNewItem(data){
    $('#rpt').append(formatNewItem(data));
}

function formatNewItem(data){
    var index = newItems.length;
    var ctrl = " <span class='ctrl-delete' index='"+index+"'>delete</span>";

    var row = "<tr class='ctrl-tbl'><td>"+data.cat+"</td>";
    row += "<td>"+data.assetdesc+"</td>";
    row += "<td>"+data.specs+"</td>";
    row += "<td>"+data.qty+"</td>";
    row += "<td>"+data.acqcost+"</td>";
    row += "<td>"+ctrl+"</td>";
    row += "</tr>";

    return row;
}

function tempUpload(form, url){

    var formData = new FormData($('#frmAddasset')[0]);
    return (
        $.ajax({
        type: "POST",
        url: url,
        data: formData,
        mimeType: "multipart/form-data",
        contentType : false,
        cache: false,
        processData: false,
    }).then(function(ret){
        return ret;
    })
    );
}

function addItems(){
    /* steps
     * 1. check if has new items
     * 2. check if has invoice number
     * 3. submit per array
     */

     if(newItems.length > 0 && $('#invnum').val() !== ''){
        var url = "process/assetadd.php?action=add";

         //  control number and invoice number
        var cnum = $('#ctrlnum').val();
        var inum = $('#invnum').val();
        var adate = $('#acqdate').val();
        var a = 0;
         // no invoice number on appending in FormData

        for(var x=0; x<= newItems.length-1 ; x++){
            var fdata= newItems[x];//.append("ctrlnum", cnum);
            
            fdata = fdata+"&ctrlnum="+cnum+"&invnum="+inum+"&acqdate="+adate;
            console.log(fdata);
            $.ajax({
                type: "POST",
                url: url,
                data: fdata,
                // contentType : 'multipart/formdata',
                // processData : false,
            }).then(function(data){
                a++;
                if(a == newItems.length){
                    window.location.href = "http://localhost/tams/index.php?chez=reports/invoice.php&invoice";
                }
            }).catch(function(error){
                alert(error);
            });
        }
        
     }
     else{
        //  errorAlert('No Items to add!','add_item_modal');
         errorAlertLink('No Items to add!','add_item_modal');
     }

}

function errorAlert(message){
    $('#error_alert').modal('show');
    $('#error_alert .modal-body p').html(message);
}

function errorAlertLink(message,link){
    $('#error_alert_link').modal('show');
    $('#error_alert_link .modal-body .modal-message').html(message);
    $('#error_alert_link .modal-body .modal-link').html("add item <a class='modal-link' data-toggle='modal' data-target='#"+link+"'>here</a>");
}