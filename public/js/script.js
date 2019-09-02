$(function() {
	
 
    $('tbody').on('keyup','.quantity,.budget',function(){
        var tr=$(this).parent().parent();
        var quantity=tr.find('.quantity').val();
        var budget=tr.find('.budget').val();
        var amountht =tr.find('.amountht').val();
        var amountht=(quantity*budget);
        tr.find('.amountht').val(amountht.toFixed(2));
        montantht();
    });

    $('tbody').on('keyup','.tva',function(){
        var tr=$(this).parent().parent();
        var tva =tr.find('.tva').val();
        var amountht =tr.find('.amountht').val();
        var amountva= ((tva/100) * amountht) ;
        tr.find('.amountva').val(amountva.toFixed(2));
        montantva();
    });

    $('tbody').on('keyup','.tva',function(){
        var tr=$(this).parent().parent();
        var amountht =tr.find('.amountht').val();
        var amountva =tr.find('.amountva').val();
        var amounttc= (amountht - amountva) ;
        tr.find('.amounttc').val(amounttc.toFixed(2));
        montanttc();
    });

    function montantht(){
        var total=0;
      $('.amountht').each(function(i,e){
            var amountht=$(this).val()-0;
            total +=amountht;
      });
      $('.amountotalht').html(total.toFixed(2)+" HT");   
    }

    function montantva(){
        var total=0;
      $('.amountva').each(function(i,e){
            var amountht=$(this).val()-0;
            total +=amountht;
      });

        $('.amountotaltva').html(total.toFixed(2)+" TVA");   
    }

    function montanttc(){
        var total=0;
      $('.amounttc').each(function(i,e){
            var amountht=$(this).val()-0;
            total +=amountht;
      });

        $('.amountotal').html(total.toFixed(2)+" TTC");   
    }


  // Script TO add Row with inputs inside it
    
        $(".add-row").click(function(){

            var markup = "<tr>"+
            "<td><input type='checkbox' name='record'></td>"+
            "<td><input type='text'class='form-control' name='product_name[]' required></td>"+
            "<td><input type='text'class='form-control quantity' name='quantity[]' required></td>"+
            "<td><input type='text'class='form-control budget' name='budget[]' required></td>"+
            "<td><input type='text'class='form-control amountht' name='amountht[]' readonly></td>"+
            "<td><input type='text'class='form-control tva' name='tva[]' required></td>"+
            "<td><input type='text'class='form-control amountva' name='amountva[]' readonly></td>"+
            "<td><input type='text'class='form-control amounttc' name='amounttc[]' readonly></td>"+
            "</tr>";
            $("table tbody").append(markup);
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
              if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
// add datepicker
$('.datepicker').datepicker();

// validate forms

$("#myform").validate();


});    

    
