$( document ).ready(function(){
    changeInputSmall();
    initAutoNumeric();
    initDatePicker();
	$('input').on('focus',function(){
        $(this).attr('autocomplete', 'off');
    });
    $('table').removeClass('table-condensed');
    $('table').addClass('table');
    $('.form-control-chosen').chosen();
});

function initAutoNumeric(){
    $('.percent').each(function(){
        if(!AutoNumeric.isManagedByAutoNumeric(this)){
            new AutoNumeric(this,{
                currencySymbol: "%",
                currencySymbolPlacement: "s",
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                unformatOnSubmit: true,
                watchExternalChanges: true
            });
        }
    });
    $('.percentReadOnly').each(function(){
        if(!AutoNumeric.isManagedByAutoNumeric(this)){
            new AutoNumeric(this,{
                currencySymbol: "%",
                currencySymbolPlacement: "s",
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                noEventListeners: true,
                readOnly: true,
                unformatOnSubmit: true,
                watchExternalChanges: true
            });
        }
    });
    $('.percentNoComma').each(function(){
        if(!AutoNumeric.isManagedByAutoNumeric(this)){
            new AutoNumeric(this,{
                currencySymbol: "%",
                currencySymbolPlacement: "s",
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 0,
                unformatOnSubmit: true,
                watchExternalChanges: true
            });
        }
    });
    $('.percentComma').each(function(){
        if(!AutoNumeric.isManagedByAutoNumeric(this)){
            new AutoNumeric(this,{
                currencySymbol: "%",
                currencySymbolPlacement: "s",
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 5,
                unformatOnSubmit: true,
                watchExternalChanges: true
            });
        }
    });
    $('.percentNoCommaReadOnly').each(function(){
        if(!AutoNumeric.isManagedByAutoNumeric(this)){
            new AutoNumeric(this,{
                currencySymbol: "%",
                currencySymbolPlacement: "s",
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 0,
                noEventListeners: true,
                readOnly: true,
                unformatOnSubmit: true,
                watchExternalChanges: true
            });
        }
    });
    $('.currency').each(function(){
        if(!AutoNumeric.isManagedByAutoNumeric(this)){
            new AutoNumeric(this,{
                currencySymbol: "",
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 2,
                maximumValue:1000000000000000000,
                unformatOnSubmit: true,
                watchExternalChanges: true
            });
        }
    });
    $('.currencyNoComma').each(function(){
        if(!AutoNumeric.isManagedByAutoNumeric(this)){
            if($(this).is('input:not([readonly])')){
                new AutoNumeric(this,{
                    currencySymbol: "",
                    digitGroupSeparator: '.',
                    decimalCharacter: ',',
                    decimalPlaces: 0,
                    unformatOnSubmit: true,
                    watchExternalChanges: true,
                    maximumValue:1000000000000000000,
                    // minimumValue:0,
                    autoNumeric:'formatted'
                });
            }else{
                new AutoNumeric(this,{
                    currencySymbol: "",
                    digitGroupSeparator: '.',
                    decimalCharacter: ',',
                    decimalPlaces: 0,
                    maximumValue:1000000000000000000,
                    unformatOnSubmit: true,
                    watchExternalChanges: true,
                    autoNumeric:'formatted'
                });
            }
        }
    });
    $('.currencyNoCommaReadOnly').each(function(){
        if(!AutoNumeric.isManagedByAutoNumeric(this)){
            new AutoNumeric(this,{
                currencySymbol: "",
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalPlaces: 0,
                noEventListeners: true,
                readOnly: true,
                maximumValue:1000000000000000000,
                unformatOnSubmit: true,
                watchExternalChanges: true
            });
        }
    });
}

function initDatePicker(){
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        daysOfWeekDisabled: '0,6',
    });

    $(".datepicker").each(function(){
        dateStr = $(this).val();
        if(dateStr.length == 0){
            $(this).datepicker("setDate", new Date());
        }
    });
    //$(".datepicker").datepicker("setDate", new Date());
}

function changeInputSmall(){
    $('select.form-control').each(function(){
        $(this).addClass('form-control-sm');
    });
    $('input.form-control').each(function(){
        $(this).addClass('form-control-sm');
    });

    $('.input-group').each(function(){
        $(this).addClass('input-group-sm');
    })
}

$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
   $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
});
